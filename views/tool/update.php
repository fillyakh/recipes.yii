<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tool $model */

$this->title = 'Update Tool: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tool-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
