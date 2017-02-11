<?php

use yii\db\Migration;

/**
 * Handles the creation of table `phone`.
 */
class m170211_120856_create_phone_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('phone', [
            'id'         => $this->primaryKey(),
            'customerId' => $this->integer(),
            'number'     => $this->string()
        ],
        'ENGINE=InnoDB');
        $this->addForeignKey('customerPhoneNumbers', 'phone', 'customerId', 'customer', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('customerPhoneNumbers', 'phone');
        $this->dropTable('phone');
    }
}
