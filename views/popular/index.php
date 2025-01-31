<?php

use app\models\Recipe;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Popular';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
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
            //'popular',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {delete}',
                'urlCreator' => function ($action, Recipe $model, $key, $index, $column) {
                    if ($action === 'view') {
                        return Url::toRoute(['recipe/view', 'id' => $model->id]);
                    }
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
