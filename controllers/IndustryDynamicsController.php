<?php

namespace app\controllers;
use app\models;

class IndustryDynamicsController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\IndustryDynamics;
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

    public function actionUpdate($id, $name, $description, $thumbnail)
    {
        $res = $this->getModel()->updateOne($id, $name, $description, $thumbnail);
        return $res;
    }

    public function actionInsert($name, $description, $thumbnail)
    {
        $res = $this->getModel()->insertOne($name, $description, $thumbnail);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
