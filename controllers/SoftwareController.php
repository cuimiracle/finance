<?php

namespace app\controllers;
use app\models;

class SoftwareController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\Software;
        }
        return $this->model;
    }

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

    public function actionUpdate($id, $name, $description, $thumbnail, $link_name, $link_url)
    {
        $res = $this->getModel()->updateOne($id, $name, $description, $thumbnail, $link_name, $link_url);
        return $res;
    }

    public function actionInsert($name, $description, $thumbnail, $link_name, $link_url)
    {
        $res = $this->getModel()->insertOne($name, $description, $thumbnail, $link_name, $link_url);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
