<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tag;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\RecipeTags $model */
/** @var yii\widgets\ActiveForm $form */

$tags = Tag::find()->all();
$items = ArrayHelper::map($tags, 'id', 'name');
?>

<div class="recipe-tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipe_id')->textInput()->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'tag_id')->textInput()->dropDownList($items, [
        'prompt' => 'Выберите инструмент',
    ]);  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
