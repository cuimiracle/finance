<?php

namespace app\controllers;
use app\models;

class TechDataController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\TechData;
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

    public function actionUpdate($id, $type, $content, $author_work, $author_name, $photo)
    {
        $res = $this->getModel()->updateOne($id, $type, $content, $author_work, $author_name, $photo);
        return $res;
    }

    public function actionInsert($type, $content, $author_work, $author_name, $photo)
    {
        $res = $this->getModel()->insertOne($type, $content, $author_work, $author_name, $photo);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
