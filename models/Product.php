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
}
