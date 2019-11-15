<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Schoolcalendar $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="schoolcalendar-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Schoolcalendar',
    'layout' => 'inline',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute entry_type -->
			<?= $form->field($model, 'entry_type')->textInput() ?>

<!-- attribute fromdatetime -->
			<?= $form->field($model, 'fromdatetime')->textInput() ?>

<!-- attribute todatetime -->
			<?= $form->field($model, 'todatetime')->textInput() ?>

<!-- attribute schoolsub_catID -->
			<?= $form->field($model, 'schoolsub_catID')->textInput() ?>

<!-- attribute isactive -->
			<?= $form->field($model, 'isactive')->textInput() ?>

<!-- attribute color -->
			<?= $form->field($model, 'color')->textarea(['rows' => 6]) ?>

<!-- attribute link -->
			<?= $form->field($model, 'link')->textarea(['rows' => 6]) ?>

<!-- attribute publish -->
			<?=                         $form->field($model, 'publish')->dropDownList(
                            common\models\Schoolcalendar::optspublish()
                        ); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'Schoolcalendar'),
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

