<?php
namespace app\components;

use yii\base\Widget;
use app\models\Recipe;

class PopularRecipes extends Widget
{
    private $recipes;
    public $limit;

    public function init()
    {
        parent::init();
        if ($this->limit === null) {
            $this->limit = 3;
        }
        $this->recipes = Recipe::find()->where(['popular' => '1'])->limit($this->limit)->all();
    }

    public function run()
    {
        return $this->render('popularRecipes', ['recipes' => $this->recipes]);
    }
}