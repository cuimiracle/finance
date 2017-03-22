<?php

namespace app\controllers;
use app\models;

class UploadController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;


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

    public function actionPhoto(){
        $save_path = $error_message =  '';
        /*
        Array
        (
            [file] => Array
            (
                [name] => WechatIMG1.jpeg
                [type] => image/jpeg
                [tmp_name] => /private/var/tmp/phpx5XUBu
                [error] => 0
                [size] => 84935
            )
        )
        */
        if (\Yii::$app->request->isPost) {
            // echo '<pre>';print_r($_FILES);echo '</pre>';
            if (
                (      ($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                )
                && ($_FILES["file"]["size"] < 1024*1024*10) // limit file size = 10M
            ) {
                if ($_FILES["file"]["error"] > 0){
                    $error_message .= "Return Code: ".$_FILES["file"]["error"].'. ';
                }else{
                    $error_message .=  "Upload: ".$_FILES["file"]["name"].'. ';
                    $error_message .=  "Type: ".$_FILES["file"]["type"].'. ';
                    $error_message .=  "Size: ".($_FILES["file"]["size"]/1024)."Kb. ";
                    $error_message .=  "Temp file: ".$_FILES["file"]["tmp_name"].'. ';

                    $save_path = "upload/".$_FILES["file"]["name"];
                    if (file_exists($save_path)){
                        $error_message .= $_FILES["file"]["name"]." already exists. ";
                    }else{
                        move_uploaded_file($_FILES["file"]["tmp_name"], $save_path);
                    }
                }
            }else{
                $error_message .=  "Invalid file. ";
            }

            if($error_message) return fail(array('message'=>$error_message));
            return succeed(array('save_path'=>$save_path));
        }

    }

    public function actionFile(){
        $save_path = $error_message =  '';
        if (\Yii::$app->request->isPost) {
            // echo '<pre>';print_r($_FILES);echo '</pre>';
            if ( $_FILES["file"]["size"] < 1024*1024*10 ) { // limit file size = 10M
                if ($_FILES["file"]["error"] > 0){
                    $error_message .= "Return Code: ".$_FILES["file"]["error"].'. ';
                }else{
                    $error_message .=  "Upload: ".$_FILES["file"]["name"].'. ';
                    $error_message .=  "Type: ".$_FILES["file"]["type"].'. ';
                    $error_message .=  "Size: ".($_FILES["file"]["size"]/1024)."Kb. ";
                    $error_message .=  "Temp file: ".$_FILES["file"]["tmp_name"].'. ';

                    $save_path = "upload/".$_FILES["file"]["name"];
                    if (file_exists($save_path)){
                        $error_message .= $_FILES["file"]["name"]." already exists. ";
                    }else{
                        move_uploaded_file($_FILES["file"]["tmp_name"], $save_path);
                    }
                }
            }else{
                $error_message .=  "Invalid file. ";
            }

            if($error_message) return fail(array('message'=>$error_message));
            return succeed(array('save_path'=>$save_path));
        }

    }
}
