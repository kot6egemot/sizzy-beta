<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%img}}`.
 */
class m200324_124141_add_title_column_to_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('img', 'title', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
