<?php

use yii\db\Migration;

/**
 * Class m210925_085523_create_room
 */
class m210925_085523_create_room extends Migration
{
       

    

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%room}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'period'=>$this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%room}}');

    }
    
}
