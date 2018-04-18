<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vehicle`.
 */
class m180417_122956_create_vehicle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vehicle', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'type_id' => $this->integer(),
            'reg_number' => $this->string(),
            'fuel' => $this->integer(),
        ]);
        $this->addForeignKey('fk-vehicle-vehicle_type','vehicle','type_id','vehicle_type','id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vehicle');
    }
}
