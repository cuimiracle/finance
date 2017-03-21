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
}
