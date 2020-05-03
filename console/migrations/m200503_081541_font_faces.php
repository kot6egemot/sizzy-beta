<?php

use yii\db\Migration;

/**
 * Class m200503_081541_font_faces
 */
class m200503_081541_font_faces extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'font',
            'faces',
            $this->text()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_081541_font_faces cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_081541_font_faces cannot be reverted.\n";

        return false;
    }
    */
}
