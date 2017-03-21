<?php

namespace app\controllers;
use app\models;

class SiteController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel()
    {
        if (empty($this->model)) {
            $this->model = new models\Site;
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

    public function actionUpdate($id, $title, $photo, $photo_description)
    {
        $res = $this->getModel()->updateOne($id, $title, $photo, $photo_description);
        return $res;
    }

    public function actionInsert($title, $photo, $photo_description)
    {
        $res = $this->getModel()->insertOne($title, $photo, $photo_description);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
