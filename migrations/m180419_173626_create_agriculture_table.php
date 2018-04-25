<?php

use yii\db\Migration;

/**
 * Handles the creation of table `agriculture`.
 */
class m180419_173626_create_agriculture_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('agriculture', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('agriculture');
    }
}
