<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_single_pic".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $photo
 * @property string $updated_at
 */
class SiteSinglePic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_single_pic';
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
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM site_single_pic');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM site_single_pic WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $title, $content, $photo){
        $command = \Yii::$app->db->createCommand("UPDATE site_single_pic SET title=:title, content=:content, photo=:photo WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':title'=>$title, ':content'=>$content, ":photo"=>$photo));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($title, $content, $photo){
        $command = \Yii::$app->db->createCommand("INSERT INTO site_single_pic SET title=:title, content=:content, photo=:photo, updated_at=:updated_at");
        $command->bindValues(array(':title'=>$title, ':content'=>$content, ":photo"=>$photo, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM site_single_pic WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
