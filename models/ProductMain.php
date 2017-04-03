<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_main".
 *
 * @property integer $id
 * @property string $content
 * @property string $photo
 * @property string $link_name
 * @property string $link_url
 * @property string $updated_at
 */
class ProductMain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_main';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['updated_at'], 'safe'],
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
            'content' => 'Content',
            'photo' => 'Photo',
            'link_name' => 'Link Name',
            'link_url' => 'Link Url',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM product_main');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM product_main WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $content, $photo, $link_name, $link_url){
        $command = \Yii::$app->db->createCommand("UPDATE product_main SET content=:content, photo=:photo, link_name=:link_name, link_url=:link_url WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':content'=>$content, ":photo"=>$photo, ':link_name'=>$link_name, ':link_url'=>$link_url));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($content, $photo, $link_name, $link_url){
        $command = \Yii::$app->db->createCommand("INSERT INTO product_main SET content=:content, photo=:photo, link_name=:link_name, link_url=:link_url, updated_at=:updated_at");
        $command->bindValues(array(':content'=>$content, ":photo"=>$photo, ':link_name'=>$link_name, ':link_url'=>$link_url, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM product_main WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
