<?php

namespace app\controllers;
use app\models;

class TechDataController extends \yii\web\Controller
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
        $contents = $this->getModel()->fetchAll();

        return $this->render('index', [
            'contents' => $contents,
        ]);
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
            $type = isset($post['type']) ? $post['type'] : '';
            $content = isset($post['content']) ? $post['content'] : '';
            $author_work = isset($post['author_work']) ? $post['author_work'] : '';
            $author_name = isset($post['author_name']) ? $post['author_name'] : '';
            $photo = isset($post['photo']) ? $post['photo'] : '';

            $res = $this->getModel()->updateOne($id, $type, $content, $author_work, $author_name, $photo);
        }

        if(!$res) return $this->fail();
        return $this->succeed();
    }

    public function actionInsert()
    {
        $res = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $type = isset($post['type']) ? $post['type'] : '';
            $content = isset($post['content']) ? $post['content'] : '';
            $author_work = isset($post['author_work']) ? $post['author_work'] : '';
            $author_name = isset($post['author_name']) ? $post['author_name'] : '';
            $photo = isset($post['photo']) ? $post['photo'] : '';

            $res = $this->getModel()->insertOne($type, $content, $author_work, $author_name, $photo);
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
