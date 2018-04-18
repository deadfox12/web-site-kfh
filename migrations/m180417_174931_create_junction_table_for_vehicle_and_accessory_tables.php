<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vehicle_accessory`.
 * Has foreign keys to the tables:
 *
 * - `vehicle`
 * - `accessory`
 */
class m180417_174931_create_junction_table_for_vehicle_and_accessory_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vehicle_accessory', [
            'vehicle_id' => $this->integer(),
            'accessory_id' => $this->integer(),
            'PRIMARY KEY(vehicle_id, accessory_id)',
        ]);

        // creates index for column `vehicle_id`
        $this->createIndex(
            'idx-vehicle_accessory-vehicle_id',
            'vehicle_accessory',
            'vehicle_id'
        );

        // add foreign key for table `vehicle`
        $this->addForeignKey(
            'fk-vehicle_accessory-vehicle_id',
            'vehicle_accessory',
            'vehicle_id',
            'vehicle',
            'id',
            'CASCADE'
        );

        // creates index for column `accessory_id`
        $this->createIndex(
            'idx-vehicle_accessory-accessory_id',
            'vehicle_accessory',
            'accessory_id'
        );

        // add foreign key for table `accessory`
        $this->addForeignKey(
            'fk-vehicle_accessory-accessory_id',
            'vehicle_accessory',
            'accessory_id',
            'accessory',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `vehicle`
        $this->dropForeignKey(
            'fk-vehicle_accessory-vehicle_id',
            'vehicle_accessory'
        );

        // drops index for column `vehicle_id`
        $this->dropIndex(
            'idx-vehicle_accessory-vehicle_id',
            'vehicle_accessory'
        );

        // drops foreign key for table `accessory`
        $this->dropForeignKey(
            'fk-vehicle_accessory-accessory_id',
            'vehicle_accessory'
        );

        // drops index for column `accessory_id`
        $this->dropIndex(
            'idx-vehicle_accessory-accessory_id',
            'vehicle_accessory'
        );

        $this->dropTable('vehicle_accessory');
    }
}
