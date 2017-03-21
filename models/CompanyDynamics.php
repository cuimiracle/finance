<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_dynamics".
 *
 * @property integer $id
 * @property string $description
 * @property string $updated_at
 */
class CompanyDynamics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_dynamics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM company_dynamics');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM company_dynamics WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $description){
        $command = \Yii::$app->db->createCommand("UPDATE company_dynamics SET description=:description WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':description'=>$description));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($description){
        $command = \Yii::$app->db->createCommand("INSERT INTO company_dynamics SET description=:description, updated_at=:updated_at");
        $command->bindValues(array(':description'=>$description, ':updated_at'=>date('Y-m-d H:i:s')));
        $res = $command->execute();
        return $res;
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM company_dynamics WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
