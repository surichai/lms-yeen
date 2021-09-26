<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "map_room".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $room_id
 * @property int|null $code_lock
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class MapRoom extends \yii\db\ActiveRecord
{
   public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'map_room';
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
            [['file'], 'safe'],
            [['file'], 'file', 'extensions' => 'xls,xlsx', 'skipOnEmpty' => true],
            [['user_id', 'room_id', 'code_lock', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'room_id' => 'Room ID',
            'code_lock' => 'Code Lock',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
