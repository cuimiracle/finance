<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property integer $id
 * @property string $title
 * @property string $photo
 * @property string $photo_description
 * @property string $updated_at
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_description'], 'string'],
            [['updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'photo' => 'Photo',
            'photo_description' => 'Photo Description',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM site');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM site WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $title, $photo, $photo_description){
        $command = \Yii::$app->db->createCommand("UPDATE site SET title=:title, photo=:photo, photo_description=:photo_description WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":title"=>$title, ':photo'=>$photo,  ':photo_description'=>$photo_description));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($title, $photo, $photo_description){
        $command = \Yii::$app->db->createCommand("INSERT INTO site SET title=:title, photo=:photo, photo_description=:photo_description, updated_at=:updated_at");
        $command->bindValues(array(":title"=>$title, ':photo'=>$photo,  ':photo_description'=>$photo_description, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM site WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
