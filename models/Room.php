<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%room}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $period
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%room}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['period', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'period' => 'Period',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
