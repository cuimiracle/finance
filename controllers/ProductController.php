<?php

namespace app\controllers;
use app\models;

class ProductController extends \yii\web\Controller
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
            $this->model = new models\Product;
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
        $name = isset($post['name']) ? $post['name'] : '';
        $description = isset($post['description']) ? $post['description'] : '';
        $thumbnail = isset($post['thumbnail']) ? $post['thumbnail'] : '';
        $link_name = isset($post['link_name']) ? $post['link_name'] : '';
        $link_url = isset($post['link_url']) ? $post['link_url'] : '';
        $photo = isset($post['photo']) ? $post['photo'] : '';
        $photo_description = isset($post['photo_description']) ? $post['photo_description'] : '';

        $res = $this->getModel()->updateOne($id, $name, $description, $thumbnail, $link_name, $link_url, $photo, $photo_description);
        if(!$res) return $this->fail();
        return $this->succeed();
    }

    public function actionInsert()
    {
        $post = \Yii::$app->request->post();
        $name = isset($post['name']) ? $post['name'] : '';
        $description = isset($post['description']) ? $post['description'] : '';
        $thumbnail = isset($post['thumbnail']) ? $post['thumbnail'] : '';
        $link_name = isset($post['link_name']) ? $post['link_name'] : '';
        $link_url = isset($post['link_url']) ? $post['link_url'] : '';
        $photo = isset($post['photo']) ? $post['photo'] : '';
        $photo_description = isset($post['photo_description']) ? $post['photo_description'] : '';

        $res = $this->getModel()->insertOne($name, $description, $thumbnail, $link_name, $link_url, $photo, $photo_description);
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
