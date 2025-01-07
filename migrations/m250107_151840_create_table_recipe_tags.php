<?php

use yii\db\Migration;

/**
 * Class m250107_151840_create_table_recipe_tags
 */
class m250107_151840_create_table_recipe_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe_tags}}', [
            'id' => $this->primaryKey(),
            'recipe_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
            
        ]);
        $this->batchInsert('{{%recipe_tags}}', ['tag_id', 'recipe_id'], [
            [1, 1],
            [2, 2],
            [3, 3],
            [1, 1],
            [2, 2],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250107_151840_create_table_recipe_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250107_151840_create_table_recipe_tags cannot be reverted.\n";

        return false;
    }
    */
}
