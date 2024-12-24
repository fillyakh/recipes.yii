<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipeTools $model */

$this->title = 'Update Recipe Tools: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipe Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipe-tools-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
