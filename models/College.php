<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "college".
 *
 * @property integer $id
 * @property string $title
 * @property string $photo
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $updated_at
 */
class College extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'college';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'photo'], 'required'],
            [['description'], 'string'],
            [['updated_at'], 'safe'],
            [['title', 'name'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 250],
            [['price'], 'string', 'max' => 20],
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
            'photo' => 'Photo',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM college');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM college WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $title, $photo, $name, $description, $price){
        $command = \Yii::$app->db->createCommand("UPDATE college SET title=:title, photo=:photo, `name`=:name, description=:description, price=:price WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ':title'=>$title, ':photo'=>$photo, ':name'=>$name, ':description'=>$description, ':price'=>$price));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($title, $photo, $name, $description, $price){
        $command = \Yii::$app->db->createCommand("INSERT INTO college SET title=:title, photo=:photo, `name`=:name, description=:description, price=:price, updated_at=:updated_at");
        $command->bindValues(array(':title'=>$title, ':photo'=>$photo, ':name'=>$name, ':description'=>$description, ':price'=>$price, ':updated_at'=>date('Y-m-d H:i:s')));
        $res = $command->execute();
        return $res;
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM college WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
