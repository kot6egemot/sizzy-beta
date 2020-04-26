<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%font}}`.
 */
class m200215_051725_create_font_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%font}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'src' => $this->string()->notNull(),
            'views' => $this->integer()->defaultValue(0)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%font}}');
    }
}
