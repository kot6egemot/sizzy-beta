<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%html_list}}`.
 */
class m200316_123851_create_html_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%html_list}}', [
            'id' => $this->primaryKey(),
            'id_root' => $this->integer()->notNull(),
            'node' => $this->integer()->notNull(),
            'node_order' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%html_list}}');
    }
}
