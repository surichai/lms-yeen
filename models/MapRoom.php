<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%map_room}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $room_id
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class MapRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%map_room}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'room_id', 'created_at', 'updated_at'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
