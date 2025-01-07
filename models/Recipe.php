<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\Ingredient;

/**
 * This is the model class for table "recipes".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'time', 'cooking'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 100],
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
            'img' => 'Img',
        ];
    }

    public function beforeSave($insert)
    {
        // dd($this->img);
        if (empty($this->img) && !$this->isNewRecord) {
            // Если поле img пустое и это обновление, оставляем старое значение
            $this->img = $this->getOldAttribute('img');
            
        }
        return parent::beforeSave($insert);
    }

    public function getIngredients()
    {
        // return Ingredient::find()->where(['recipe_id' => $this->id])->all();
        return $this->hasMany(Ingredient::class, ['recipe_id' => 'id']);
    }

    public function getTools()
    {
        // $tools = RecipeTools::find()->where(['recipe_id' => $recipe_id])->all();
        // foreach($tools as $tool) {
        //     $data[] = Tool::find()->where(['id' => $tool->tool_id])->one();
        // }
        return $this->hasMany(Tool::class, ['id' => 'tool_id'])->viaTable('recipe_tools', ['recipe_id' => 'id']);
    }
    
    public function getInstructions()
    {
        return $this->hasMany(Instruction::class, ['recipe_id' => 'id'])->orderBy(['step' => SORT_ASC]);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->viaTable('recipe_tags', ['recipe_id' => 'id']);
    }
}