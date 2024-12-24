<?php

use yii\db\Migration;

/**
 * Class m241224_150559_create_table_recipe_tools
 */
class m241224_150559_create_table_recipe_tools extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe_tools}}', [
            'id' => $this->primaryKey(),
            'recipe_id' => $this->integer()->notNull(),
            'tool_id' => $this->integer()->notNull(),
            
        ]);
        $this->batchInsert('{{%recipe_tools}}', ['tool_id', 'recipe_id'], [
            [1, 1],
            [1, 2],
            [1, 3],
            [2, 1],
            [2, 2],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recipe_tools}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241224_150559_create_table_recipe_tools cannot be reverted.\n";

        return false;
    }
    */
}
