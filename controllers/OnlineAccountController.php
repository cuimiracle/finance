<?php

namespace app\controllers;
use app\models;

class OnlineAccountController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    private $model;

    private function succeed($arr = array()){
        $res = array('result' => true);
        $res = array_merge($res, $arr);
        echo json_encode($res);
    }

    private function fail($arr = array()){
        $res = array('result' => false, 'message' => '');
        $res = array_merge($res, $arr);
        echo json_encode($res);
    }

    public function actionIndex()
    {
        $get = \Yii::$app->request->get();
        $insert_id = isset($get['insert_id']) ? $get['insert_id'] : '';
        return $this->render('index', [
            'insert_id' => $insert_id,
        ]);
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\OnlineAccount;
        }
        return $this->model;
    }

    public function actionGet_all()
    {
        $res = $this->getModel()->fetchAll();
        if(!$res) $res = '';
        return $this->succeed(array('data' => $res));
    }

    public function actionGet($id)
    {
        $res = $this->getModel()->fetchOne($id);
        if(!$res) $res = '';
        return $this->succeed(array('data' => $res));
    }

    public function actionUpdate()
    {
        $res = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $id = isset($post['id']) ? $post['id'] : '';
            $name = isset($post['name']) ? $post['name'] : '';
            $mobile = isset($post['mobile']) ? $post['mobile'] : '';

            $res = $this->getModel()->updateOne($id, $name, $mobile);
        }

        if(!$res) return $this->fail();
        return $this->succeed();
    }

    public function actionInsert()
    {
        $res = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $name = isset($post['name']) ? $post['name'] : '';
            $mobile = isset($post['mobile']) ? $post['mobile'] : '';

            $res = $this->getModel()->insertOne($name, $mobile);
        }

        if(!$res) return $this->fail();
        return $this->succeed(array('insert_id' => $res));
    }

    public function actionDelete()
    {
        $res = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $id = isset($post['id']) ? $post['id'] : '';

            $res = $this->getModel()->deleteOne($id);
        }

        if(!$res) return $this->fail();
        return $this->succeed();
    }

    public function actionOpen_new()
    {
        $res = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $name = isset($post['name']) ? $post['name'] : '';
            $mobile = isset($post['mobile']) ? $post['mobile'] : '';

            $res = $this->getModel()->insertOne($name, $mobile);
        }

        $this->redirect(array('/online-account/index','insert_id'=>$res));
    }
}
