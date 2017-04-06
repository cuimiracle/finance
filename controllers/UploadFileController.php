<?php

namespace app\controllers;
use app\models;

class UploadFileController extends \yii\web\Controller
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
            $this->model = new models\UploadFile;
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

    public function actionPhotos(){
        $file_path = '';
        if(!empty($_FILES)){
            $files = $_FILES;
            $uploadForm = new models\UploadForm;
            $res = $uploadForm->photos($files);
            if(!empty($res['result'])){
                $file_path = !empty($res['success']) ? array_shift($res['success']) : '';
            }
        }
        if(!$file_path) return $this->fail();
        return $this->succeed(array('file_path' => $file_path));
    }

    public function actionFiles(){
        $file_path = '';
        if(!empty($_FILES)){
            $files = $_FILES;
            $uploadForm = new models\UploadForm;
            $res = $uploadForm->files($files);
            if(!empty($res['result'])){
                $file_path = !empty($res['success']) ? array_shift($res['success']) : '';
            }
        }
        if(!$file_path) return $this->fail();
        return $this->succeed(array('file_path' => $file_path));
    }

    public function actionUpdate()
    {
        $res = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();

            $id = isset($post['id']) ? $post['id'] : '';
            $name = isset($post['name']) ? $post['name'] : '';
            $file_path = isset($post['file_path']) ? $post['file_path'] : '';

            $res = $this->getModel()->updateOne($id, $name, $file_path);
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
            $file_path = isset($post['file_path']) ? $post['file_path'] : '';

            $res = $this->getModel()->insertOne($name, $file_path);
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
