<?php

use app\models\RecipeTools;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RecipeToolsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Recipe Tools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-tools-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipe Tools', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name', // Поле из модели
                'label' => 'Имя инструмента',
                'value' => function ($model) {
                    return $model->tool->name ?? 'Не указано'; 
                },
                'filter' => false,
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{delete}', // Оставить только нужные действия (например, редактирование и удаление)
                'urlCreator' => function ($action, RecipeTools $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
            ],
            
        ],
    ]); ?>


</div>
