<?php

use yii\db\Migration;

/**
 * Class m230825_102245_create_table_crudjob
 */
class m230825_102245_create_table_crudjob extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('job', [
            'id' => $this->primaryKey(),
            'important' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('job');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230825_102245_create_table_crudjob cannot be reverted.\n";

        return false;
    }
    */
}
