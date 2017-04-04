<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="<?=\Yii::$app->request->getHostInfo().'/static/'?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=\Yii::$app->request->getHostInfo().'/static/'?>/vendor/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?=\Yii::$app->request->getHostInfo().'/static/'?>/css/base.css">
    <link rel="stylesheet" type="text/css" href="<?=\Yii::$app->request->getHostInfo().'/static/'?>/vendor/unslider/css/unslider.css">
    <link rel="stylesheet" type="text/css" href="<?=\Yii::$app->request->getHostInfo().'/static/'?>/vendor/unslider/css/unslider-dots.css">

</head>
<body>
<?php $this->beginBody() ?>
<!-- 导航 -->
<div class="container-fluid" style="background: #fff;">
    <div class="row nav main-nav">
        <ul class="col-md-6 col-md-offset-1 col-xs-9 list-inline">
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php'?>"><img src="http://placehold.it/120x35"></a></li>
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=product/index'?>">产品</a></li>
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=college/index'?>">投资学院</a></li>
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=software/index'?>">软件下载</a></li>
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=tech-data/index'?>">技术分析</a></li>
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=company/index'?>">要闻动态</a></li>
        </ul>
        <ul class="col-md-2 col-md-offset-2 col-xs-3 list-inline text-right">
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=help/index'?>">帮助</a></li>
            <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=about/index'?>">关于</a></li>
        </ul>
    </div>
    <div class="navbar mobile-nav" role="navigation">
        <div class="clearfix">
            <div class="navbar-header pull-left">
                <a href="<?=\Yii::$app->request->getHostInfo().'/index.php'?>"><img src="http://placehold.it/120x35"></a>
            </div>
            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle mobile-nav-btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th-list"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=product/index'?>">产品</a></li>
                        <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=college/index'?>">投资学院</a></li>
                        <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=software/index'?>">软件下载</a></li>
                        <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=tech-data/index'?>">技术分析</a></li>
                        <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=company/index'?>">要闻动态</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=help/index'?>">帮助</a></li>
                        <li><a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=about/index'?>">关于</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<?= $content ?>

<!-- 页脚 -->
<div class="footer container-fluid">
    <div class="row nav">
        <a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=product/index'?>">产品</a> ｜
        <a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=help/index'?>">帮助</a> ｜
        <a href="<?=\Yii::$app->request->getHostInfo().'/index.php?r=about/index'?>">关于我们</a>
    </div>
    <p>&copy;公司名公司名公司名公司名 &nbsp;&nbsp; 备案号：XXXXXXXXX</p>
</div>

<!-- 公共js -->
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>vendor/jquery.min.js"></script>
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>vendor/unslider/js/unslider-min.js"></script>
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>vendor/jquery.appear.js"></script>
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>js/common.js"></script>

<!-- 主页js -->
<script type="text/javascript" src="<?=\Yii::$app->request->getHostInfo().'/static/'?>js/index.js"></script>
<!-- help页js -->
<script type="text/javascript" src="<?=\Yii::$app->request->getHostInfo().'/static/'?>js/help.js"></script>
<!-- product页js -->
<script type="text/javascript" src="<?=\Yii::$app->request->getHostInfo().'/static/'?>js/product.js"></script>
<!-- company页js -->
<script type="text/javascript" src="<?=\Yii::$app->request->getHostInfo().'/static/'?>/vendor/jq_scroll.js"></script>
<!-- analysis页js -->
<script type="text/javascript">
    $('.analysis-tabs a').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
        var target = $(this).data('target');
        $('.content').hide();
        $('[title="'+target+'"]').fadeIn();
    }).first().trigger('click');
    $(".news-wrapper").Scroll({line:1,speed:500,timer:3000,up:"but_up",down:"but_down"});
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

