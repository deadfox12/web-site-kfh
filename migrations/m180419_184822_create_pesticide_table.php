<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pesticide`.
 */
class m180419_184822_create_pesticide_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pesticide', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'active_substance' => $this->string(),
            'norm' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pesticide');
    }
}
