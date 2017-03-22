<?php

namespace app\controllers;
use app\models;

class AboutController extends \yii\web\Controller
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
            $this->model = new models\About;
        }
        return $this->model;
    }
    // http://finance.com/index.php?r=about/get_all
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
        $title = isset($post['title']) ? $post['title'] : '';
        $content = isset($post['content']) ? $post['content'] : '';
        $thumbnail = isset($post['thumbnail']) ? $post['thumbnail'] : '';
        $res = $this->getModel()->updateOne($id, $title, $content, $thumbnail);

        if(!$res) return $this->fail();
        return $this->succeed();
    }

    public function actionInsert()
    {
        $post = \Yii::$app->request->post();
        $title = isset($post['title']) ? $post['title'] : '';
        $content = isset($post['content']) ? $post['content'] : '';
        $thumbnail = isset($post['thumbnail']) ? $post['thumbnail'] : '';

        $res = $this->getModel()->insertOne($title, $content, $thumbnail);

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
