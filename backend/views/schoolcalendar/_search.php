<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\SchoolcalendarSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="schoolcalendar-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'entry_type') ?>

		<?= $form->field($model, 'schoolsub_catID') ?>

		<?= $form->field($model, 'color') ?>

		<?= $form->field($model, 'link') ?>

		<?php // echo $form->field($model, 'fromdatetime') ?>

		<?php // echo $form->field($model, 'todatetime') ?>

		<?php // echo $form->field($model, 'publish') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'isactive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
