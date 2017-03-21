<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "help".
 *
 * @property integer $id
 * @property string $type
 * @property string $title
 * @property string $content
 * @property string $updated_at
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'help';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['updated_at'], 'safe'],
            [['type'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'content' => 'Content',
            'updated_at' => 'Updated At',
        ];
    }
}
