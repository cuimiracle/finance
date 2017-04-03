<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "online_account".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $updated_at
 */
class OnlineAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'online_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 20],
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
            'mobile' => 'Mobile',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM online_account');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM online_account WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $name, $mobile){
        $command = \Yii::$app->db->createCommand("UPDATE online_account SET name=:name, mobile=:mobile WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':name'=>$name, ':mobile'=>$mobile));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($name, $mobile){
        $command = \Yii::$app->db->createCommand("INSERT INTO online_account SET name=:name, mobile=:mobile, updated_at=:updated_at");
        $command->bindValues(array(':name'=>$name, ':mobile'=>$mobile, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM online_account WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
