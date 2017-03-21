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
}
