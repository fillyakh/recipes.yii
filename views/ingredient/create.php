<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ingredient $model */

$this->title = 'Create Ingredient';
$this->params['breadcrumbs'][] = ['label' => 'Ingredients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
