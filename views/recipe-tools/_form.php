<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tool;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\RecipeTools $model */
/** @var yii\widgets\ActiveForm $form */

$tools = Tool::find()->all();
$items = ArrayHelper::map($tools, 'id', 'name');
?>

<div class="recipe-tools-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipe_id')->textInput()->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tool_id')->textInput()->dropDownList($items, [
        'prompt' => 'Выберите инструмент',
    ]); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
