<?php

use app\models\Instruction;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\InstructionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Instructions for Recipe "' . $recipe->name . '"';
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => '/admin'];
$this->params['breadcrumbs'][] = ['label' => 'Recipe', 'url' => '/recipe/view?id=' . $recipe->id];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instruction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Instruction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'recipe_id',
            'step',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Instruction $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
