<?php

use app\models\Recipe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RecipeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'img', // Поле из модели
                'label' => 'Изображение',
                'format' => 'html', // Указывает, что вывод будет в формате HTML
                'value' => function ($model) {
                    return $model->img 
                        ? Html::img(Yii::getAlias('@web/img/recipes/' . $model->img), ['style' => 'height:50px;']) 
                        : '<span class="text-muted">Нет изображения</span>';
                },
                'filter' => false,
            ],
            'time',
            'cooking',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recipe $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
        'pager' => [
            'class' => \yii\bootstrap5\LinkPager::class,
            'pagination' => $dataProvider->getPagination(),
            'options' => ['class' => 'pagination justify-content-center'],
        ],
    ]); ?>


</div>
