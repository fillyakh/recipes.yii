<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipeTools $model */

$this->title = 'Create Recipe Tools';
$this->params['breadcrumbs'][] = ['label' => 'Recipe Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-tools-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
