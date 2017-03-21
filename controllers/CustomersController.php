<?php

namespace app\controllers;
use app\models;

class CustomersController extends \yii\web\Controller
{
    private $model;

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\Customers;
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

    public function actionUpdate($id, $username, $password, $email)
    {
        $res = $this->getModel()->updateOne($id, $username, $password, $email);
        return $res;
    }

    public function actionInsert($username, $password, $email)
    {
        $res = $this->getModel()->insertOne($username, $password, $email);
        return $res;
    }

    public function actionDelete($id)
    {
        $res = $this->getModel()->deleteOne($id);
        return $res;
    }
}
