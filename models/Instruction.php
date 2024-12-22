<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instructions".
 *
 * @property int $id
 * @property string $name
 * @property int $recipe_id
 * @property int $step
 */
class Instruction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instructions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'recipe_id', 'step'], 'required'],
            [['recipe_id', 'step'], 'integer'],
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
            'recipe_id' => 'Recipe ID',
            'step' => 'Step',
        ];
    }
}
