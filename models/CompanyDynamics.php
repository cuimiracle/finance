<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_dynamics".
 *
 * @property integer $id
 * @property string $content
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
            [['content'], 'string'],
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
            'content' => 'Content',
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

    public function updateOne($id, $content){
        $command = \Yii::$app->db->createCommand("UPDATE company_dynamics SET content=:content WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':content'=>$content));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($content){
        $command = \Yii::$app->db->createCommand("INSERT INTO company_dynamics SET content=:content, updated_at=:updated_at");
        $command->bindValues(array(':content'=>$content, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM company_dynamics WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
