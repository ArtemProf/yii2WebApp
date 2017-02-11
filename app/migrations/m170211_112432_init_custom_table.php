<?php

use yii\db\Migration;

class m170211_112432_init_custom_table extends Migration
{
    public function up()
    {
        $this->createTable('customer', [
                'id'        => $this->primaryKey(),
                'name'      => $this->string(255),
                'birthDate' => $this->date(),
                'notes'     => $this->text()
            ],
            'ENGINE=InnoDB'
        );
    }

    public function down()
    {
        $this->dropTable('customer');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
