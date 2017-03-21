<?php
namespace app\controllers;
use app\models;

class DataController extends \yii\web\Controller
{
    public function actionIndex($message = '')
    {
        echo $message;
        echo '<br/>';

		$customers = new models\Customers;
        $id=1;
		$res = $customers->fetchOne($id);
        echo '<pre>';print_r($res);echo '</pre>';

        $username = 'testname';
        $password = md5('123456');
        $email = 'test@test.com';
        //$res = $customers->insertOne($username, $password, $email);
		//echo '<pre>';print_r($res);echo '</pre>';
		exit;
        //return $this->render('index');
    }

}
