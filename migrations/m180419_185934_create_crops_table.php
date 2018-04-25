<?php

use yii\db\Migration;

/**
 * Handles the creation of table `crops`.
 */
class m180419_185934_create_crops_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('crops', [
            'id' => $this->primaryKey(),
            'field_id' => $this->integer()->notNull(),
            'varieties_id' => $this->integer()->notNull(),
            'date' => $this->date(),
        ]);
        $this->addForeignKey('fk-crops-varieties','crops','varieties_id','varieties','id', 'NO ACTION', 'RESTRICT');
        $this->addForeignKey('fk-crops-field','crops','field_id','field','id', 'NO ACTION', 'RESTRICT');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('crops');
    }
}
