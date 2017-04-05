<?php

namespace app\controllers;
use app\models;

class BackController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    private $customer_model;

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

    public function getCustomerModel(){
        if(empty($this->customer_model)){
            $this->customer_model = new models\Customers;
        }
        return $this->customer_model;
    }

    public function actionIndex()
    {
        // return $this->render('index');
    }

    public function actionLogin()
    {
        $customer_id = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $username = isset($post['username']) ? $post['username'] : '';
            $password = isset($post['password']) ? $post['password'] : '';

            $password = MD5($password);
            $customer_id = $this->getCustomerModel()->validateCustomer($username, $password);
            // set cookie
            $cookies = \Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'is_login',
                'value' => $username,
                'expire' => time()+60*60*24
            ]));
        }

        if(!$customer_id) return $this->fail();
        return $this->succeed(array('customer_id' => $customer_id));
    }

    public function actionLogout()
    {
        $cookies = \Yii::$app->response->cookies;
        $cookies->remove('is_login');
        if(isset($cookies['is_login'])) unset($cookies['is_login']);
        return $this->succeed();
    }

    public function actionIsLogin(){
        $cookies = \Yii::$app->request->cookies;
        $tmp = $cookies->get('is_login', 'false');
	$username = isset($tmp->value) ? $tmp->value : '';
        $is_login = $tmp ? 1 : 0;
        return $this->succeed(array('is_login' => $is_login, 'username'=>$username));
    }

    public function actionRegister()
    {
        $customer_id = false;
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $username = isset($post['username']) ? $post['username'] : '';
            $password = isset($post['password']) ? $post['password'] : '';
            $email = isset($post['email']) ? $post['email'] : '';

            $res = $this->getCustomerModel()->existCustomer($username);
            if($res) return $this->fail();

            $password = MD5($password);
            $customer_id = $this->getCustomerModel()->insertOne($username, $password, $email);
        }

        if(!$customer_id) return $this->fail();
        return $this->succeed(array('customer_id' => $customer_id));
    }
}
