<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $photo
 * @property string $photo_description
 * @property string $updated_at
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['updated_at'], 'safe'],
            [['photo'], 'string', 'max' => 250],
            [['photo_description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'photo_description' => 'Photo Description',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM partner');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM partner WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $photo, $photo_description){
        $command = \Yii::$app->db->createCommand("UPDATE partner SET photo=:photo, photo_description=:photo_description WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":photo"=>$photo, ':photo_description'=>$photo_description));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($photo, $photo_description){
        $command = \Yii::$app->db->createCommand("INSERT INTO partner SET photo=:photo, photo_description=:photo_description, updated_at=:updated_at");
        $command->bindValues(array(":photo"=>$photo, ':photo_description'=>$photo_description, ':updated_at'=>date('Y-m-d H:i:s')));
        $res = $command->execute();
        return $res;
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM partner WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
