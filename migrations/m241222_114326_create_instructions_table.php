<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%instructions}}`.
 */
class m241222_114326_create_instructions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%instructions}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'recipe_id' => $this->integer()->notNull(),
            'step' => $this->integer()->notNull(),
            
        ]);
        $this->batchInsert('{{%instructions}}', ['name', 'recipe_id', 'step'], [
            ['Slice onions', 1, 1],
            ['Heat oil in a pan', 1, 2],
            ['Add onions and sauté until golden', 1, 3],
            ['Boil water', 2, 1],
            ['Add pasta and cook for 10 minutes', 2, 2],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%instructions}}');
    }
}
