<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 07.11.2017
 * Time: 14:03
 */

namespace app\controllers;

use app\models\Comment;
use app\models\NewComment;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Article;
use app\models\Category;
use app\models\Advertising;

class PostController extends Controller
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');

        $advertising = Advertising::find()->all();
        $category = Category::find()->where(['id'=>$id])->one();
        $pages = new Pagination(
            ['totalCount' => 6,
                'pageSize' => 5
            ]);
        $news = Article::find()->where(['idCategory'=>$id])->select(['title','id'])->orderBy(['date'=>SORT_DESC])->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view',
            [
                'advertising'=>$advertising,
                'category'=>$category,
                'news'=>$news,
                'pages'=>$pages
            ]);
    }

    public function actionArticle($id)
    {
        $id = Yii::$app->request->get('id');

        $advertising = Advertising::find()->all();
        $article = Article::find()->where(['id'=>$id])->one();
        $comments = Comment::find()->where(['idArticle'=>$id])->all();
        $authors = $this->getAuthors($comments);

        $model = new NewComment();
        if ($model->load(Yii::$app->request->post())&& $model->validate()) {
            $model1 = new Comment;
            $model1->idUser = $_POST['NewComment']['idUser'];
            $model1->idArticle = $_POST['NewComment']['idArticle'];
            $model1->content =$_POST['NewComment']['content'];
            //var_dump($article->idCategory);exit();
            if($article->idCategory==1) {
                $model1->public=0;
            }else{
                $model1->public=1;
            }
            $model1->insert();
            $this->refresh();
        }
        return $this->render('article',
            [
                'advertising'=>$advertising,
                'article'=>$article,
                'model'=>$model,
                'comments'=>$comments,
                'authors'=>$authors,

            ]);
    }

    public function getAuthors($comments)
    {
        $list=[];
        $i=0;
        foreach ($comments as $comment){
            $list[$i] = User::find()->
            select(['username'])->
            where(['id'=>$comment->idUser])->
            all();
            $i++;
        }
        return $list;
    }

}