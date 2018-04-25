<?php

use yii\db\Migration;

/**
 * Handles the creation of table `field`.
 */
class m180419_162911_create_field_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('field', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'square' => $this->integer(),
            'status' => $this->integer(100)->defaultValue(10),//Статус 10, незанятое поле
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('field');
    }
}
