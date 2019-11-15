<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Myprofile */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Myprofile',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Myprofiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myprofile-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
