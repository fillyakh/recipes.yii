<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Instruction $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => '/admin'];
$this->params['breadcrumbs'][] = ['label' => 'Recipe', 'url' => '/recipe/view?id=' . $model->recipe_id];
$this->params['breadcrumbs'][] = ['label' => 'Instructions', 'url' => ['index?recipe_id=' . $model->recipe_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="instruction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'recipe_id',
            'step',
        ],
    ]) ?>

</div>
