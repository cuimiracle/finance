<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property integer $id
 * @property string $title
 * @property string $photo
 * @property string $photo_description
 * @property string $updated_at
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_description'], 'string'],
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
            'photo' => 'Photo',
            'photo_description' => 'Photo Description',
            'updated_at' => 'Updated At',
        ];
    }
}
