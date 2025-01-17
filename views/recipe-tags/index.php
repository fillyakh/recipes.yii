<?php

use app\models\RecipeTags;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RecipeTagsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recipe Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-tags-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipe Tags', ['create', 'recipe_id' => $recipe->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name', // Поле из модели
                'label' => 'Имя тега',
                'value' => function ($model) {
                    return $model->tag->name ?? 'Не указано'; 
                },
                'filter' => false,
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{delete}', // Оставить только нужные действия (например, редактирование и удаление)
                'urlCreator' => function ($action, RecipeTags $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
