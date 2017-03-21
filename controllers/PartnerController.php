<?php

namespace app\controllers;
use app\models;

class PartnerController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\Partner;
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

    public function actionUpdate($id, $photo, $photo_description)
    {
        $res = $this->getModel()->updateOne($id, $photo, $photo_description);
        return $res;
    }

    public function actionInsert($photo, $photo_description)
    {
        $res = $this->getModel()->insertOne($photo, $photo_description);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
