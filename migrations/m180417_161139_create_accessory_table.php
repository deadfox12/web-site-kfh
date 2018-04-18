<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accessory`.
 */
class m180417_161139_create_accessory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('accessory', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('accessory');
    }
}
