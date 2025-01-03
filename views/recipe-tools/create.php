<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipeTools $model */

$this->title = 'Create Recipe Tools';
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['recipe/index']];
$this->params['breadcrumbs'][] = ['label' => 'Recipe', 'url' => ['recipe/view', 'id' => $model->recipe_id]];
$this->params['breadcrumbs'][] = ['label' => 'Tools', 'url' => ['index', 'recipe_id' => $model->recipe_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-tools-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<!-- /home/recipes/recipe/tools/create -->