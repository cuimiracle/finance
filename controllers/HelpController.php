<?php

namespace app\controllers;
use app\models;

class HelpController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\Help;
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

    public function actionUpdate($id, $type, $title, $content)
    {
        $res = $this->getModel()->updateOne($id, $type, $title, $content);
        return $res;
    }

    public function actionInsert($type, $title, $content)
    {
        $res = $this->getModel()->insertOne($type, $title, $content);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
