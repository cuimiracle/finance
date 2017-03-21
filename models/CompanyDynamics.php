<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_dynamics".
 *
 * @property integer $id
 * @property string $description
 * @property string $updated_at
 */
class CompanyDynamics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_dynamics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'updated_at' => 'Updated At',
        ];
    }
}
