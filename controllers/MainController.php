<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Recipe;
use app\models\Tag;
use app\models\RecipeTools;
use app\models\Tool;
use app\models\Instruction;
use yii\data\Pagination;

use Yii;
class MainController extends Controller
{
    public $layout = 'public';

    public function actionIndex()
    {
        $recipes = Recipe::find()->all(); 
        // dd($tags[0]->countRecipes);
        return $this->render('index', ['recipes' => $recipes]);
    }
    
    public function actionTag($tag_id)
    {
        // $tag = Tag::findOne($tag_id);
        $tag = Tag::find()->with(['recipes'])->where(['id' => $tag_id])->one();
        // dd($tag->recipes);
        return $this->render('tag', ['tag' => $tag]);
    }

    public function actionTags()
    {
        $tags = Tag::find()->with('recipes')->all();
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
        // $recipe = Recipe::findOne($recipe_id);

        $recipe = Recipe::find()->with(['ingredients', 'tools', 'instructions', 'tags'])->where(['id' => $recipe_id])->one();
        // dd($recipe);

        // dd($recipe->ingredients);
        // dd($ingredients);
        // dd($tag);
        return $this->render('recipe', ['recipe' => $recipe]);
    }

    public function actionAbout()
    {
        // dd($recipes);
        return $this->render('about');
    }

    public function actionContact()
    {
        // dd('contact');
        $recipes = Recipe::find()->where(['popular' => Recipe::IS_POPULAR])->all();
        $errors = Yii::$app->session->getFlash('formErrors', []);
        $oldData = Yii::$app->session->getFlash('oldData', []);
        // var_dump();
        // dd($recipes);
        return $this->render('contact', ['recipes' => $recipes, 'errors' => $errors, 'oldData' => $oldData]);
    }
}