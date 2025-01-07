<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recipe_tags".
 *
 * @property int $id
 * @property int $recipe_id
 * @property int $tag_id
 */
class RecipeTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipe_id', 'tag_id'], 'required'],
            [['recipe_id', 'tag_id'], 'integer'],
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
            'tag_id' => 'Tag ID',
        ];
    }

    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']); // tag_id — это поле, связывающее таблицы
    }
}
