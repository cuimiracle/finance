<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "industry_dynamics".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $thumbnail
 * @property string $updated_at
 */
class IndustryDynamics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industry_dynamics';
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
            [['thumbnail'], 'string', 'max' => 250],
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
            'updated_at' => 'Updated At',
        ];
    }
}
