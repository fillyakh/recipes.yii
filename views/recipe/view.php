<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Recipe;

/** @var yii\web\View $this */
/** @var app\models\Recipe $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

if($model->popular == Recipe::IS_POPULAR){
    $textPopularBtn = 'Remove from Popular';
} else {
    $textPopularBtn = 'Add to Popular';
}
?>
<div class="recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Ingredients', ['ingredient/index', 'recipe_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Instructions', ['instruction/index', 'recipe_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Tools', ['recipe-tools/index', 'recipe_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a($textPopularBtn, ['popular/change', 'recipe_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Tags', ['recipe-tags/index', 'recipe_id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'description:ntext',
            [
                'attribute' => 'img',
                'format' => 'raw', // Позволяет выводить HTML
                'value' => function($model) {
                    return Html::img(Yii::getAlias('@web/img/recipes/') . $model->img, [
                        'alt' => $model->name,
                        'style' => 'width:100px; height:auto;', 
                    ]);
                },
            ],
            'time',
            'cooking',
            [
                'attribute' => 'popular',
                'value' => function($model) {
                    return $model->popular ? 'Yes' : 'No';
                },
            ],
        ],
    ]) ?>

</div>
