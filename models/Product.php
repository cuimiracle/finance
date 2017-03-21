<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $thumbnail
 * @property string $link_name
 * @property string $link_url
 * @property string $photo
 * @property string $photo_description
 * @property string $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'photo_description'], 'string'],
            [['updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['thumbnail', 'link_url', 'photo'], 'string', 'max' => 250],
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
            'photo' => 'Photo',
            'photo_description' => 'Photo Description',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM product');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM product WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $name, $description, $thumbnail, $link_name, $link_url, $photo, $photo_description){
        $command = \Yii::$app->db->createCommand("UPDATE product SET `name`=:name, description=:description, thumbnail=:thumbnail, link_name=:link_name, link_url=:link_url, photo=:photo, photo_description=:photo_description WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":name"=>$name, ':description'=>$description, ':thumbnail'=>$thumbnail, ':link_name'=>$link_name, ':link_url'=>$link_url, ':photo'=>$photo,  ':photo_description'=>$photo_description));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($name, $description, $thumbnail, $link_name, $link_url, $photo, $photo_description){
        $command = \Yii::$app->db->createCommand("INSERT INTO product SET `name`=:name, description=:description, thumbnail=:thumbnail, link_name=:link_name, link_url=:link_url, photo=:photo, photo_description=:photo_description, updated_at=:updated_at");
        $command->bindValues(array(":name"=>$name, ':description'=>$description, ':thumbnail'=>$thumbnail, ':link_name'=>$link_name, ':link_url'=>$link_url, ':photo'=>$photo,  ':photo_description'=>$photo_description, ':updated_at'=>date('Y-m-d H:i:s')));
        $res = $command->execute();
        return $res;
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM product WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
