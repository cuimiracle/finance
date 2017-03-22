<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tech_data".
 *
 * @property integer $id
 * @property string $type
 * @property string $content
 * @property string $author_work
 * @property string $author_name
 * @property string $photo
 * @property string $updated_at
 */
class TechData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tech_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['updated_at'], 'safe'],
            [['type', 'author_work', 'author_name'], 'string', 'max' => 20],
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
            'type' => 'Type',
            'content' => 'Content',
            'author_work' => 'Author Work',
            'author_name' => 'Author Name',
            'photo' => 'Photo',
            'updated_at' => 'Updated At',
        ];
    }

    public function fetchAll(){
        $command = \Yii::$app->db->createCommand('SELECT * FROM tech_data');
        $res = $command->queryAll();
        return $res;
    }

    public function fetchOne($id){
        $command = \Yii::$app->db->createCommand('SELECT * FROM tech_data WHERE id=:id');
        $command->bindValues(array(":id"=>$id));
        $res = $command->queryOne();
        return $res;
    }

    public function updateOne($id, $type, $content, $author_work, $author_name, $photo){
        $command = \Yii::$app->db->createCommand("UPDATE tech_data SET `type`=:type, content=:content, author_work=:author_work, author_name=:author_name, photo=:photo WHERE id=:id");
        $command->bindValues(array(":id"=>$id, ":type"=>$type, ':content'=>$content, ':author_work'=>$author_work, ':author_name'=>$author_name, ':photo'=>$photo));
        $res = $command->execute();
        return $res;
    }

    public function insertOne($type, $content, $author_work, $author_name, $photo){
        $command = \Yii::$app->db->createCommand("INSERT INTO tech_data SET `type`=:type, content=:content, author_work=:author_work, author_name=:author_name, photo=:photo, updated_at=:updated_at");
        $command->bindValues(array(":type"=>$type, ':content'=>$content, ':author_work'=>$author_work, ':author_name'=>$author_name, ':photo'=>$photo, ':updated_at'=>date('Y-m-d H:i:s')));
        $command->execute();
        return \Yii::$app->db->getLastInsertID();
    }

    public function deleteOne($id){
        $command = \Yii::$app->db->createCommand("DELETE FROM tech_data WHERE id=:id");
        $command->bindValues(array(":id"=>$id));
        $res = $command->execute();
        return $res;
    }
}
