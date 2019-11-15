<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\comm\models\MessageGroups */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Message Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-groups-view">

    <h1>Successful !</h1>

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'listname:ntext',
           // 'userID',
           // 'created_at',
           // 'updated_at',
           // 'isactive',
        ],
    ]) ?>

</div>
