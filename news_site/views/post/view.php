<?php


$this->title = $category->name;
?>
<link href="/web/css/index.css" rel="stylesheet">

<h1 style="text-align: center;"><?=$category->name?></h1>
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
        <div class="col-md-8 col-md-offset-2">
            <?php foreach ($news as $new){?>
                <a href='/web/post/article/<?=$new->id?>'><div class="article"><?=$new->title?></p></div></a>
            <?php }?>

        </div>
        <div style=" text-align: center;"><?= yii\widgets\LinkPager::widget(['pagination'=>$pages])?></div>
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