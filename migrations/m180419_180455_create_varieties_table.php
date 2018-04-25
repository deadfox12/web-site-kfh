<?php

use yii\db\Migration;

/**
 * Handles the creation of table `varieties`.
 */
class m180419_180455_create_varieties_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('varieties', [
            'id' => $this->primaryKey(),
            'agriculture_id' => $this->integer(),
            'title' => $this->string()->notNull(),
            'productivity' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk-varieties-agriculture','varieties','agriculture_id','agriculture','id', 'SET NULL', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('varieties');
    }
}
