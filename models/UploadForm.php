<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;

class UploadForm extends Model
{
    public static $photo_limit_size;
    public static $file_limit_size;
    public static $save_dir;
    public static $save_url_dir;

    public function __construct(){
        parent::__construct();
        self::$photo_limit_size = 1024*1024*10;  // 10M
        self::$file_limit_size = 1024*1024*10;  // 10M
        self::$save_dir = realpath(\Yii::$app->basePath.'/web/uploads');
        self::$save_url_dir = \Yii::$app->request->getHostInfo().'/uploads';
    }

    private function succeed($arr = array()){
        $res = array('result' => true);
        $res = array_merge($res, $arr);
        return $res;
    }

    public function photos($files, $spec_save_dir = ''){
        if($spec_save_dir) self::$save_dir = $spec_save_dir;

        $save_path_arr = $error_message_arr = [];
        if(!empty($files)){
            foreach($files as $key => $file){
                $error_message =  '';
                try{
                    if (
                        (      ($file["type"] == "image/gif")
                            || ($file["type"] == "image/jpeg")
                            || ($file["type"] == "image/pjpeg")
                            || ($file["type"] == "image/png")
                        )
                        && ($file["size"] < self::$photo_limit_size)
                    ) {
                        if ($file["error"] > 0){
                            $error_message .= "Return Code: ".$file["error"].'. ';
                        }else{
                            $suffix = pathinfo($file['name'], PATHINFO_EXTENSION);
                            $save_filename = base64_encode($file["name"].mt_rand(0, 99999)).'.'.$suffix;
                            $save_path = self::$save_dir.'/'.$save_filename;
                            $save_url = self::$save_url_dir.'/'.$save_filename;
                            if (file_exists($save_path)){
                                $error_message .= $file["name"]." already exists. ";
                            }else{
                                move_uploaded_file($file["tmp_name"], $save_path);
                                $save_path_arr[$key] = $save_url;
                            }
                        }
                    }else{
                        $error_message .=  "Invalid file. ";
                    }
                    if($error_message) $error_message_arr[$key] = $error_message;
                }catch(Exception $e){
                    $error_message_arr[$key] = $e->getMessage();
                }
            }
        }

        return $this->succeed(array('success'=>$save_path_arr, 'failed'=>$error_message_arr));
    }

    public function files($files, $spec_save_dir = ''){
        if($spec_save_dir) self::$save_dir = $spec_save_dir;

        $save_path_arr = $error_message_arr = [];
        if(!empty($files)){
            foreach($files as $key => $file){
                $error_message =  '';
                try{
                    if ($file["size"] < self::$file_limit_size) {
                        if ($file["error"] > 0){
                            $error_message .= "Return Code: ".$file["error"].'. ';
                        }else{
                            $suffix = pathinfo($file['name'], PATHINFO_EXTENSION);
                            $save_filename = base64_encode($file["name"].mt_rand(0, 99999)).'.'.$suffix;
                            $save_path = self::$save_dir.'/'.$save_filename;
                            $save_url = self::$save_url_dir.'/'.$save_filename;
                            if (file_exists($save_path)){
                                $error_message .= $file["name"]." already exists. ";
                            }else{
                                move_uploaded_file($file["tmp_name"], $save_path);
                                $save_path_arr[$key] = $save_url;
                            }
                        }
                    }else{
                        $error_message .=  "Invalid file. ";
                    }
                    if($error_message) $error_message_arr[$key] = $error_message;
                }catch(Exception $e){
                    $error_message_arr[$key] = $e->getMessage();
                }
            }
        }

        return $this->succeed(array('success'=>$save_path_arr, 'failed'=>$error_message_arr));
    }



}
