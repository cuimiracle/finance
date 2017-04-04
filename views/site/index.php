<?php
//echo '<pre>';print_r($site_banners);echo '</pre>';
?>


<!-- <div class="row mb-nav show-for-small">
    <div class="col-xs-2 col-xs-offset-10">
        <a href=""><span class="glyphicon glyphicon-align-justify"></span></a>
    </div>
</div> -->

<!-- banner 放置公司宣传图片／宣传语／在线开户入口 -->
<section class="top-banner-container">
    <div class="top-banner">
        <ul>
            <?php
            if(!empty($site_banners)){
                foreach($site_banners as $v){
            ?>
            <li>
                <a href="<?=$v['link_url']?>"><img src="<?=$v['photo']?>"></a>
            </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</section>

<!-- feature 放置公司特色 -->
<section class="feature clearfix">
    <?php
    if(!empty($site_details)){
        foreach($site_details as $k => $v){
            if($k < 3) break;
    ?>
    <div>
        <div class="animated" data-animation="zoomIn" data-animation-delay="700">
            <img src="<?=$v['photo']?>" style="width:100%;">
        </div>
        <p class="title"><?=$v['title']?></p>
        <p class="desc animated" data-animation="slideInUp" data-animation-delay="700"><?=$v['content']?></p>
    </div>
    <?php
        }
    }
    ?>
</section>

<section class="feature clearfix">
    <?php
    if(!empty($site_details)){
        foreach($site_details as $k => $v){
            if($k >= 3) break;
    ?>
    <div>
        <div class="animated" data-animation="zoomIn" data-animation-delay="700">
            <img src="<?=$v['photo']?>" style="width:100%;">
        </div>
        <p class="title"><?=$v['title']?></p>
        <p class="desc animated" data-animation="slideInUp" data-animation-delay="700"><?=$v['content']?></p>
    </div>
    <?php
        }
    }
    ?>
</section>

<section class="container-fluid mrt30">
    <h2 class="mrb30 text-center animated" data-animation="slideInDown" data-animation-delay="700">在IDEAL TRADING<br>我们能做到的从来不仅仅是“交易”</h2>
    <?php
    if(!empty($site_ideal)){
        foreach($site_ideal as $v){
    ?>
    <div class="row mrt30">
        <div class="col-md-4 col-md-offset-1 animated" data-animation="slideInDown" data-animation-delay="600">
            <img src="<?=$v['photo']?>" style="width:100%;">
        </div>
        <div class="col-md-6 pd30 animated" data-animation="slideInDown" data-animation-delay="700">
            <h4><?=$v['title']?></h4>
            <p><?=$v['content']?></p>
        </div>
    </div>
    <?php
        }
    }
    ?>
</section>

<section class="container-fluid mrt30">
    <div class="row mrt30">
        <?php
        if(!empty($site_main)){
            foreach($site_main as $v){
        ?>
        <div class="col-md-4 col-md-offset-1 mrt30 mrb30 text-center animated" data-animation="fadeInLeft" data-animation-delay="700">
            <h2 class="word-slider"><?=$v['title']?></h2>
            <h3>投资外盘 明智之选</h3>
            <p>资金 + 线路直达交易所   界面简洁华丽</p>
            <p>在线1分钟模拟账户，3天实盘账户</p>
            <a class="btn btn-primary mrt30" href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=online-account/index'?>">一键开模拟账户</a>
            <a class="btn btn-success mrt30" href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=online-account/index'?>">一键开实盘账户</a>
        </div>
        <div class="col-md-6 banner-wrapper animated" data-animation="fadeInRight" data-animation-delay="700">
            <a href="<?=$v['link_url']?>">
                <img src="<?=$v['photo']?>" style="width:100%">
                <!-- <p>1.文字描述文字描述文字描述文字描述</p> -->
            </a>
        </div>
        <?php
            }
        }
        ?>
    </div>
</section>

<section class="img-intro mrt30">
    <?php
    if(!empty($site_single_pic)){
        foreach($site_single_pic as $v){
    ?>
    <img src="<?=$v['photo']?>">
    <?php
        }
    }
    ?>
</section>

<!-- 图文宣传区域 -->
<section class="pic-desc mrt30">
    <?php
    if(!empty($site_single_bottom_detail)){
        foreach($site_single_bottom_detail as $k=>$v){
            if($k % 2 == 0){
    ?>
    <div class="row animated" data-animation="fadeInLeft" data-animation-delay="400">
        <div class="col-md-6 col-md-offset-1 desc">
            <p class="main-title">
            <?=$v['title']?>
            </p>
            <p class="main-word">
            <?=$v['content']?>
            </p>
        </div>
        <div class="col-md-4 pic text-center">
            <img src="<?=$v['photo']?>">
        </div>
    </div>
    <?php
            }else{
    ?>
    <div class="row mrt30 animated" data-animation="fadeInRight" data-animation-delay="400">
        <div class="col-md-5 col-md-offset-1 pic text-center">
            <img src="<?=$v['photo']?>">
        </div>
        <div class="col-md-5 desc">
            <p class="main-title">
            <?=$v['title']?>
            </p>
            <p class="main-word">
            <?=$v['content']?>
            </p>
        </div>
    </div>
    <?php
            }
        }
    }
    ?>
</section>

<section class="container-fluid mrt30 word-intro rela animated" data-animation="fadeInLeft" data-animation-delay="400">
    <?php
    if(!empty($site_single_bottom)){
        foreach($site_single_bottom as $k=>$v){
    ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center"><?=$v['title']?></h2>
            <p class="pd30"><?=$v['content']?></p>
        </div>
    </div>
    <div class="absol bg">
        <img src="<?=$v['photo']?>">
    </div>
    <?php
        }
    }
    ?>
</section>



