<?php

namespace app\controllers;
use app\models;

class CollegeController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\College;
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

    public function actionUpdate($id, $title, $photo, $name, $description, $price)
    {
        $res = $this->getModel()->updateOne($id, $title, $photo, $name, $description, $price);
        return $res;
    }

    public function actionInsert($title, $photo, $name, $description, $price)
    {
        $res = $this->getModel()->insertOne($title, $photo, $name, $description, $price);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
