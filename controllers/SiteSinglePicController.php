<?php

namespace app\controllers;
use app\models;

class SiteSinglePicController extends \yii\web\Controller
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

    public function getModel()
    {
        if (empty($this->model)) {
            $this->model = new models\SiteSinglePic;
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
            $title = isset($post['title']) ? $post['title'] : '';
            $content = isset($post['content']) ? $post['content'] : '';

            $res = $this->getModel()->updateOne($id, $title, $content, $photo);
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
            $title = isset($post['title']) ? $post['title'] : '';
            $content = isset($post['content']) ? $post['content'] : '';

            $res = $this->getModel()->insertOne($title, $content, $photo);
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
