<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Myprofile */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Myprofile',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Myprofiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="myprofile-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
