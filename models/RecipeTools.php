<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipe_tools".
 *
 * @property int $id
 * @property int $recipe_id
 * @property int $tool_id
 */
class RecipeTools extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe_tools';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_id', 'tool_id'], 'required'],
            [['recipe_id', 'tool_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipe_id' => 'Recipe ID',
            'tool_id' => 'Tool ID',
        ];
    }
}
