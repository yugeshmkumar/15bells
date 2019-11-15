<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */

$this->title = $model->leadRequestID;
$this->params['breadcrumbs'][] = ['label' => 'Leadrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadrequest-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->leadRequestID], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->leadRequestID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'leadRequestID',
            'UserID',
            'tagsData:ntext',
            'requestName',
            'requestEmail:email',
            'requestAmount',
            'requestBank',
            'teleNo',
            'dob',
            'Type:ntext',
            'OtherFields:ntext',
            'sourceName',
            'sourceID',
            'currentStatus',
            'currentCsrID',
            'lastTouch',
            'currentLeadScore',
            'leadQuality',
            'loanleadSourceDetailsID',
            'appliedProductid',
            'speciallead',
            'currentloandatastatusid',
            'rquestMessage',
            'applyDate',
            'CreateDate',
            'sex',
            'is_duplicate',
        ],
    ]) ?>

</div>
