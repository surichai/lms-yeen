<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 * @property int|null $status
 * @property int|null $period
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }


    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at'
            ],
            
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [
             [
                'status', 'period',
                'created_at', 'updated_at',
                'created_by', 'updated_by'
             ], 'integer'],
            [['name', 'link'], 'string', 'max' => 255],
            ['status', 'default', 'value' => 1],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อห้อง',
            'status' => 'สถานะ',
            'period' => 'Period',
            'link' => 'ลิงค์ google form',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
