<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $updated_at
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
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
            'content' => 'Content',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM about');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM about WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $title, $content){
        $command = \Yii::$app->db->createCommand("UPDATE about SET title=:title, content=:content WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':title'=>$title, ':content'=>$content));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($title, $content){
        $command = \Yii::$app->db->createCommand("INSERT INTO about SET title=:title, content=:content, updated_at=:updated_at");
        $command->bindValues(array(':title'=>$title, ':content'=>$content, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM about WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
