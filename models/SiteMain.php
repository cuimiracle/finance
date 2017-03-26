<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_main".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $photo
 * @property string $updated_at
 */
class SiteMain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_main';
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
            'title' => 'Title',
            'content' => 'Content',
            'photo' => 'Photo',
            'link_url' => 'Link Url',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM site_main');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM site_main WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $title, $content, $photo, $link_url){
        $command = \Yii::$app->db->createCommand("UPDATE site_main SET title=:title, content=:content, photo=:photo, link_url=:link_url WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':title'=>$title, ':content'=>$content, ":photo"=>$photo, ":link_url"=>$link_url));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($title, $content, $photo, $link_url){
        $command = \Yii::$app->db->createCommand("INSERT INTO site_main SET title=:title, content=:content, photo=:photo, link_url=:link_url, updated_at=:updated_at");
        $command->bindValues(array(':title'=>$title, ':content'=>$content, ":photo"=>$photo, ":link_url"=>$link_url, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM site_main WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
