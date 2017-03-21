<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "help".
 *
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property string $content
 * @property string $updated_at
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'help';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['updated_at'], 'safe'],
            [['type'], 'string', 'max' => 50],
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
            'type' => 'Type',
            'title' => 'Title',
            'content' => 'Content',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM help');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM help WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $type, $title, $content){
        $command = \Yii::$app->db->createCommand("UPDATE help SET `type`=:type, title=:title, content=:content WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":type"=>$type, ':title'=>$title, ':content'=>$content));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($type, $title, $content){
        $command = \Yii::$app->db->createCommand("INSERT INTO help SET `type`=:type, title=:title, content=:content, updated_at=:updated_at");
        $command->bindValues(array(":type"=>$type, ':title'=>$title, ':content'=>$content, ':updated_at'=>date('Y-m-d H:i:s')));
        $res = $command->execute();
        return $res;
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM help WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
