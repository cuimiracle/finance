<?php

namespace app\controllers;
use app\models;

class HelpController extends \yii\web\Controller
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
        $types = $this->getModel()->fetchAllTypes();

        return $this->render('index', [
            'contents' => $contents,
            'types' => $types,
        ]);
    }

    public function getModel(){
        if(empty($this->model)){
            $this->model = new models\Help;
        }
        return $this->model;
    }

    public function actionGet_all()
    {
        $res = $this->getModel()->fetchAll();
        if(!$res) $res = '';
        return $this->succeed(array('data' => $res));
    }

    public function actionGet_all_types()
    {
        $res = $this->getModel()->fetchAllTypes();
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
            $title = isset($post['title']) ? $post['title'] : '';
            $content = isset($post['content']) ? $post['content'] : '';

            $res = $this->getModel()->updateOne($id, $type, $title, $content);
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
            $title = isset($post['title']) ? $post['title'] : '';
            $content = isset($post['content']) ? $post['content'] : '';

            $res = $this->getModel()->insertOne($type, $title, $content);
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

    public function actionSearch_for_all($content)
    {
        $res = $this->getModel()->searchForAll($content);
        if(!$res) $res = '';
        return $this->succeed(array('data' => $res));
    }
}
