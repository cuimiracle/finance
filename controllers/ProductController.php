<?php

namespace app\controllers;
use app\models;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $product_main_obj = new models\ProductMain;
        $product_main = $product_main_obj->fetchAll();

        $product_detail_obj = new models\ProductDetail;
        $product_detail = $product_detail_obj->fetchAll();

        return $this->render('index', [
            'product_main' => $product_main,
            'product_detail' => $product_detail,
        ]);
    }

}
