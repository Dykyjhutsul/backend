<?php

/* @var $this yii\web\View */

$this->title = 'Вулик';
//print_r($list[0][0]->title);
?>
<link href="/web/css/index.css" rel="stylesheet">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active ">
            <p><?=$slide1->title?></p>
            <div class="article-photo ">
                <img src='<?=$slide1->photo?>' alt="Picture1">
            </div>
        </div>

        <div class="item">
            <p><?=$slide2->title?></p>
            <div class="article-photo">
                <img src='<?=$slide2->photo?>' alt="Picture1">
            </div>
        </div>

        <div class="item">
            <p><?=$slide3->title?></p>
            <div class="article-photo">
                <img src='<?=$slide3->photo?>' alt="Picture1">
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
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
        <?php for($i=0;$i<count($category);$i++){?>
            <div class="col-md-4">
                <a href='/web/post/<?=$category[$i]->id?>'><h2><?=$category[$i]->name?></h2></a>
                    <?php for($k=0;$k<5;$k++){?>
                           <a href='/web/post/article/<?=$list[$i][$k]->id?>'><div class="article"><p><?=$list[$i][$k]->title?></p></div></a>
                    <?php }?>

            </div>
        <?php   } ?>
    </div>

    <div class="col-md-2 rigth-col">
        <?php
        for($i=4;$i<8;$i++){?>
            <div class="advertising-block">
                <p class="center-item"><?= $advertising[$i]->title?></p>
                <div class="advertising-img center-item">
                    <img src='<?= $advertising[$i]->photo?>'></img>
                </div>
                <div class="advertising-site center-item"><a href=' <?= $advertising[$i]->site?>'>Сайт</a></div>
                <div class="center-item"><?= $advertising[$i]->price?></div>
            </div>
        <?php   }

        ?>
    </div>
</div>