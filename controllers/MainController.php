<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Recipe;
use app\models\Tag;
use yii\data\Pagination;

use Yii;
class MainController extends Controller
{
    public $layout = 'public';

    public function actionIndex()
    {
        $recipes = Recipe::find()->all(); 
        $tags = Tag::find()->all();
        // dd($tags);
        return $this->render('index', ['recipes' => $recipes, 'tags' => $tags]);
    }
    
    public function actionTag($tag_id)
    {
        $tag = Tag::findOne($tag_id);
        // dd($tag);
        return $this->render('tag', ['tag' => $tag]);
    }

    public function actionTags()
    {
        $tags = Tag::find()->all();
        return $this->render('tags', ['tags' => $tags]);
    }

    public function actionRecipes()
    {
        $query = Recipe::find();
        $options = [
            'totalCount' => $query->count(),
            'pageSize' => 2,
            'pageSizeParam' => false,
            "forcePageParam" => false,
        ];
        $pages = new Pagination($options);
        $recipes = $query->offset($pages->offset)->limit($pages->limit)->all();
        $tags = Tag::find()->all();
        return $this->render('recipes', compact('recipes', 'tags', 'pages'));
    }

    public function actionRecipe($recipe_id)
    {
        $recipe = Recipe::findOne($recipe_id);
        // dd($tag);
        return $this->render('recipe', ['recipe' => $recipe]);
    }
}