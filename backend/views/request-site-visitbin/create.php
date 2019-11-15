<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisitbin */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Request Site Visitbin',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Request Site Visitbins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-site-visitbin-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
