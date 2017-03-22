<?php

namespace app\controllers;
use app\models;

class PartnerController extends \yii\web\Controller
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
        $post = \Yii::$app->request->post();
        $id = isset($post['id']) ? $post['id'] : '';
        $photo = isset($post['photo']) ? $post['photo'] : '';
        $photo_description = isset($post['photo_description']) ? $post['photo_description'] : '';

        $res = $this->getModel()->updateOne($id, $photo, $photo_description);
        if(!$res) return $this->fail();
        return $this->succeed();
    }

    public function actionInsert()
    {
        $post = \Yii::$app->request->post();
        $photo = isset($post['photo']) ? $post['photo'] : '';
        $photo_description = isset($post['photo_description']) ? $post['photo_description'] : '';

        $res = $this->getModel()->insertOne($photo, $photo_description);
        if(!$res) return $this->fail();
        return $this->succeed(array('insert_id' => $res));
    }

    public function actionDelete()
    {
        $post = \Yii::$app->request->post();
        $id = isset($post['id']) ? $post['id'] : '';

        $res = $this->getModel()->deleteOne($id);
        if(!$res) return $this->fail();
        return $this->succeed();
    }
}
