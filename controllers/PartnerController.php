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
        $res = false;
        if (\Yii::$app->request->isPost) {
            $photo = '';
            if(!empty($_FILES)){
                $files = $_FILES;
                $uploadForm = new models\UploadForm;
                $res = $uploadForm->photos($files);
                if(!empty($res['result'])){
                    $photo = !empty($res['success']) ? array_shift($res['success']) : '';
                }
            }
            $post = \Yii::$app->request->post();

            $id = isset($post['id']) ? $post['id'] : '';
            $order = isset($post['order']) ? $post['order'] : 0;

            $res = $this->getModel()->updateOne($id, $photo, $order);
        }

        if(!$res) return $this->fail();
        return $this->succeed();
    }

    public function actionInsert()
    {
        $res = false;
        if (\Yii::$app->request->isPost) {
            $photo = '';
            if(!empty($_FILES)){
                $files = $_FILES;
                $uploadForm = new models\UploadForm;
                $res = $uploadForm->photos($files);
                if(!empty($res['result'])){
                    $photo = !empty($res['success']) ? array_shift($res['success']) : '';
                }
            }
            $post = \Yii::$app->request->post();
            $order = isset($post['order']) ? $post['order'] : 0;

            $res = $this->getModel()->insertOne($photo, $order);
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
}
