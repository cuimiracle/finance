<?php

namespace app\controllers;
use app\models;

class AboutController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\About;
        }
        return $this->model;
    }
    // http://finance.com/index.php?r=about/get_all
    public function actionGet_all()
    {
        $res = $this->getModel()->fetchAll();
        return $res;
    }

    public function actionGet($id)
    {
        $res = $this->getModel()->fetchOne($id);
        return $res;
    }

    public function actionUpdate($id, $title, $content, $thumbnail)
    {
        $res = $this->getModel()->updateOne($id, $title, $content, $thumbnail);
        return $res;
    }

    public function actionInsert($title, $content, $thumbnail)
    {
        $res = $this->getModel()->insertOne($title, $content, $thumbnail);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
