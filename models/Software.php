<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $photo
 * @property string $link_name
 * @property string $link_url
 * @property string $updated_at
 */
class Software extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'software';
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
            [['photo', 'link_url'], 'string', 'max' => 250],
            [['link_name'], 'string', 'max' => 50],
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
            'photo' => 'Photo',
            'link_name' => 'Link Name',
            'link_url' => 'Link Url',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM software');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM software WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $title, $content, $photo, $link_name, $link_url){
        $command = \Yii::$app->db->createCommand("UPDATE software SET title=:title, content=:content, photo=:photo, link_name=:link_name, link_url=:link_url WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':title'=>$title, ':content'=>$content, ":photo"=>$photo, ':link_name'=>$link_name, ':link_url'=>$link_url));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($title, $content, $photo, $link_name, $link_url){
        $command = \Yii::$app->db->createCommand("INSERT INTO software SET title=:title, content=:content, photo=:photo, link_name=:link_name, link_url=:link_url, updated_at=:updated_at");
        $command->bindValues(array(':title'=>$title, ':content'=>$content, ":photo"=>$photo, ':link_name'=>$link_name, ':link_url'=>$link_url, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM software WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
