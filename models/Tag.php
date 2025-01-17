<?php

namespace app\models;
use app\models\RecipeTags;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $name
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getRecipes()
    {
        // return $this->hasMany(RecipeTags::class, ['tag_id' => 'id']);
        return $this->hasMany(Recipe::class, ['id' => 'recipe_id'])->viaTable('recipe_tags', ['tag_id' => 'id']);
    }

    public function getCountRecipes()
    {
        // return $this->getRecipes()->count();
        return count($this->recipes);
    }

}
