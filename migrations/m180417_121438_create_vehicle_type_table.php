<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vehicle_type`.
 */
class m180417_121438_create_vehicle_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vehicle_type', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vehicle_type');
    }
}
