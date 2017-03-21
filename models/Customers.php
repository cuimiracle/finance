<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM customers');  
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM customers WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $username, $password, $email){
        $command = \Yii::$app->db->createCommand("UPDATE customers SET username=:username, password=:password, email=:email WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':username'=>$username, ':password'=>$password, ':email'=>$email));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($username, $password, $email){
        $command = \Yii::$app->db->createCommand("INSERT INTO customers SET username=:username, password=:password, email=:email, created_at=:created_at, updated_at=:updated_at");
        $command->bindValues(array(':username'=>$username, ':password'=>$password, ':email'=>$email, ':created_at'=>date('Y-m-d H:i:s'), ':updated_at'=>date('Y-m-d H:i:s')));
        $res = $command->execute();
        return $res;
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM customers WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
