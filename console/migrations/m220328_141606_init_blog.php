<?php

use yii\db\Migration;

/**
 * Class m220328_141606_init_blog
 */
class m220328_141606_init_blog extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'viewed_time' => $this->timestamp()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%blog}}');
    }
}
