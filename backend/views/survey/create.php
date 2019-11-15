<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Survey */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Survey',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
