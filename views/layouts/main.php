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
<div class="container-fluid">
    <div class="row nav main-nav">
        <ul class="col-md-6 col-md-offset-1 list-inline">
            <li><a href="index.html"><img src="http://placehold.it/120x35"></a></li>
            <li><a href="product.html">产品</a></li>
            <li><a href="academe.html">投资学院</a></li>
            <li><a href="download.html">软件下载</a></li>
            <li><a href="analysis.html">技术分析</a></li>
            <li><a href="news.html">要闻动态</a></li>
        </ul>
        <ul class="col-md-2 col-md-offset-2 list-inline text-right">
            <li><a href="help.html">帮助</a></li>
            <li><a href="about.html">关于</a></li>
        </ul>
    </div>
</div>

<?= $content ?>

<!-- 页脚 -->
<div class="footer container-fluid">
    <div class="row nav">
        <a href="product.html">产品</a> ｜
        <a href="help.html">帮助</a> ｜
        <a href="about.html">关于我们</a>
    </div>
    <p>&copy;公司名公司名公司名公司名 &nbsp;&nbsp; 备案号：XXXXXXXXX</p>
</div>

<!-- 公共js -->
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>vendor/jquery.min.js"></script>
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>vendor/unslider/js/unslider-min.js"></script>
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>vendor/jquery.appear.js"></script>
<script src="<?=\Yii::$app->request->getHostInfo().'/static/'?>js/common.js"></script>

<!-- 当前页js -->
<script type="text/javascript" src="<?=\Yii::$app->request->getHostInfo().'/assets/'?>js/index.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
