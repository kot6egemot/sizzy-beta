<?php

use yii\db\Migration;

/**
 * Class m200428_125653_font_cyrrilic_flag
 */
class m200428_125653_font_cyrrilic_flag extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'font',
            'cyrrilic',
            $this->tinyInteger(1)->defaultValue(0)->notNull()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200428_125653_font_cyrrilic_flag cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200428_125653_font_cyrrilic_flag cannot be reverted.\n";

        return false;
    }
    */
}
