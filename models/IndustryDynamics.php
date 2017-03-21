<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industry_dynamics".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $thumbnail
 * @property string $updated_at
 */
class IndustryDynamics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industry_dynamics';
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
            [['thumbnail'], 'string', 'max' => 250],
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
            'thumbnail' => 'Thumbnail',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM industry_dynamics');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM industry_dynamics WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $name, $description, $thumbnail){
        $command = \Yii::$app->db->createCommand("UPDATE industry_dynamics SET `name`=:name, description=:description, thumbnail=:thumbnail WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":name"=>$name, ':description'=>$description, ':thumbnail'=>$thumbnail));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($name, $description, $thumbnail){
        $command = \Yii::$app->db->createCommand("INSERT INTO industry_dynamics SET `name`=:name, description=:description, thumbnail=:thumbnail, updated_at=:updated_at");
        $command->bindValues(array(":name"=>$name, ':description'=>$description, ':thumbnail'=>$thumbnail, ':updated_at'=>date('Y-m-d H:i:s')));
        $res = $command->execute();
        return $res;
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM industry_dynamics WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
