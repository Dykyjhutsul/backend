<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $article->title;

?>


<link href="/web/css/index.css" rel="stylesheet">

<div >
    <div class="col-md-2 left-col">
        <?php
        for($i=0;$i<4;$i++){?>
            <div class="advertising-block">
                <p class="center-item" ><?= $advertising[$i]->title?></p>
                <div class="advertising-img">
                    <img src='<?= $advertising[$i]->photo?>'></img>
                </div>
                <div class="advertising-site center-item"><a href=' <?= $advertising[$i]->site?>'>Сайт</a></div>
                <div class="center-item"><?= $advertising[$i]->price?></div>
            </div>
        <?php   }

        ?>
    </div>
    <div class="col-md-8 center-col">
        <div>
            <h2><?= $article->title?></h2>
            <hr>
            <div class="article-img">
                <img  src='<?= $article->photo?>'></img>
            </div>
            <div>
                <?= $article->content?>
            </div>
            <hr>
            <span><?=$article->date?></span>
        </div>
        <hr>
        <div>
            <div>
                <?php if(!Yii::$app->user->isGuest){?>
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'idUser')->hiddenInput(['value'=>Yii::$app->user->id]) ?>
                    <?= $form->field($model, 'idArticle')->hiddenInput(['value'=>$article->id]) ?>
                    <?= $form->field($model, 'content')?>

                    <div class="form-group">
                        <?= Html::submitButton('Відправити', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                <?php }?>
            </div>
            <hr>
            <div>
                <?php  $i=0;
                foreach ($comments as $comment){ ?>
                    <?php if($comment->public){ ?>
                        <div class="comment">

                            <h4>
                                <?=$authors[$i][0]->username?>
                            </h4>

                                <p>
                                    <?=$comment->content?>
                                </p>

                        </div>
                    <?php } ?>
                    <?php
                    $i++;
                } ?>
            </div>
        </div>
    </div>

    <div class="col-md-2 rigth-col">
        <?php
        for($i=4;$i<8;$i++){?>
            <div class="advertising-block">
                <p class="center-item"><?= $advertising[$i]->title?></p>
                <div class="advertising-img">
                    <img src='<?= $advertising[$i]->photo?>'></img>
                </div>
                <div class="advertising-site center-item"><a href=' <?= $advertising[$i]->site?>'>Сайт</a></div>
                <div class="center-item"><?= $advertising[$i]->price?></div>
            </div>
        <?php   }

        ?>
    </div>
</div>