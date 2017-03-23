<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property string $photo
 * @property integer $order
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
            [['order'], 'integer'],
            [['updated_at'], 'safe'],
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
            'photo' => 'Photo',
            'order' => 'Order',
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

    public function updateOne($id, $photo, $order){
        $command = \Yii::$app->db->createCommand("UPDATE partner SET photo=:photo, order=:order WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":photo"=>$photo, ':order'=>$order));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($photo, $order){
        $command = \Yii::$app->db->createCommand("INSERT INTO partner SET photo=:photo, order=:order, updated_at=:updated_at");
        $command->bindValues(array(":photo"=>$photo, ':order'=>$order, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM partner WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
