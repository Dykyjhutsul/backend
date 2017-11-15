<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 08.11.2017
 * Time: 16:01
 */

namespace app\models;


use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Comment extends ActiveRecord
{

    public static function tableName()
    {
        return 'comment';
    }

    public function attributeLabels()
    {
        return [
            'id' => '',
            'idUser' => '',
            'idArticle' => '',
            'content' => ''
        ];
    }

}
