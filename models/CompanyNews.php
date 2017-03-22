<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_news".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $updated_at
 */
class CompanyNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
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
            'description' => 'Description',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM company_news');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM company_news WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $name, $description){
        $command = \Yii::$app->db->createCommand("UPDATE company_news SET `name`=:name, description=:description WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":name"=>$name, ':description'=>$description));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($name, $description){
        $command = \Yii::$app->db->createCommand("INSERT INTO company_news SET `name`=:name, description=:description, updated_at=:updated_at");
        $command->bindValues(array(":name"=>$name, ':description'=>$description, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM company_news WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
