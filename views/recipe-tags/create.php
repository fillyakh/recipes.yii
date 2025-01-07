<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RecipeTags $model */

$this->title = 'Create Recipe Tags';
$this->params['breadcrumbs'][] = ['label' => 'Recipe Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
