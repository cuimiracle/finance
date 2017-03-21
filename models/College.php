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
}
