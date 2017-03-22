<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $thumbnail
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
            [['description'], 'string'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['thumbnail', 'link_url'], 'string', 'max' => 250],
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
            'name' => 'Name',
            'description' => 'Description',
            'thumbnail' => 'Thumbnail',
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

    public function updateOne($id, $name, $description, $thumbnail, $link_name, $link_url){
        $command = \Yii::$app->db->createCommand("UPDATE software SET `name`=:name, description=:description, thumbnail=:thumbnail, link_name=:link_name, link_url=:link_url WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":name"=>$name, ':description'=>$description, ':thumbnail'=>$thumbnail, ':link_name'=>$link_name, ':link_url'=>$link_url));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($name, $description, $thumbnail, $link_name, $link_url){
        $command = \Yii::$app->db->createCommand("INSERT INTO software SET `name`=:name, description=:description, thumbnail=:thumbnail, link_name=:link_name, link_url=:link_url, updated_at=:updated_at");
        $command->bindValues(array(":name"=>$name, ':description'=>$description, ':thumbnail'=>$thumbnail, ':link_name'=>$link_name, ':link_url'=>$link_url, ':updated_at'=>date('Y-m-d H:i:s')));
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
