<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

                    <!-- END PAGE BAR -->
					<br/>
					<div class="note note-info">
					Successfully Saved.
					</div>
<div class="bank-view">

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'bank_name:ntext',
          //  'user_id',
            'account_no',
            'isfc_code',
            'zip_code',
            'account_type',
            'branch_name:ntext',
            'bank_accnt_name:ntext',
          
        ],
    ]) ?>

</div>
