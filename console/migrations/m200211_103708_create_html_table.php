<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%html}}`.
 */
class m200211_103708_create_html_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%html}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%html}}');
    }
}
