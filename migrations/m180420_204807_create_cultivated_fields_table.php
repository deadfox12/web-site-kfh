<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cultivated_fields`.
 */
class m180420_204807_create_cultivated_fields_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cultivated_fields', [
            'id' => $this->primaryKey(),
            'crops_id' => $this->integer()->notNull(),
            'pesticide_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
        ]);
        $this->addForeignKey('fk-cultivated_fields-crops','cultivated_fields','crops_id','crops','id', 'NO ACTION', 'RESTRICT');
        $this->addForeignKey('fk-cultivated_fields-pesticide','cultivated_fields','pesticide_id','pesticide','id', 'NO ACTION', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cultivated_fields');
    }
}
