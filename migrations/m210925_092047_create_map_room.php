<?php

use yii\db\Migration;

/**
 * Class m210925_092047_create_map_room
 */
class m210925_092047_create_map_room extends Migration
{
    

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%map_room}}', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer(),
            'room_id'=> $this->integer(),
            'code_lock' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%map_room}}');
    
    }
}
