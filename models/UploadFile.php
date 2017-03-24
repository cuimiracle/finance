<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "upload_file".
 *
 * @property integer $id
 * @property string $name
 * @property string $file_path
 * @property string $updated_at
 */
class UploadFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upload_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['file_path'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'file_path' => 'File Path',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM upload_file');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM upload_file WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $name, $file_path){
        $command = \Yii::$app->db->createCommand("UPDATE upload_file SET `name`=:name, file_path=:file_path WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':name'=>$name, ':file_path'=>$file_path));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($name, $file_path){
        $command = \Yii::$app->db->createCommand("INSERT INTO upload_file SET `name`=:name, file_path=:file_path, updated_at=:updated_at");
        $command->bindValues(array(':name'=>$name, ':file_path'=>$file_path, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM upload_file WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
