<?php

use yii\db\Migration;

/**
 * Class m230825_125211_create_table_weather
 */
class m230825_125211_create_table_weather extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('weather', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime()->notNull(),
            'data' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('weather');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230825_125211_create_table_weather cannot be reverted.\n";

        return false;
    }
    */
}
