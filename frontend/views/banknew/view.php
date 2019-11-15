<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Banknew */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banknews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .bnk_frm{
        padding:20px;
        background:rgba(255,255,255,0.25);
        border-top:3px solid #e9b739 !important;
    }
    .table-striped > tbody > tr{
        background:transparent !important;
        color:#ffffff !important;
    }
</style>
<div class="col-md-9 bnk_frm">
    <div class="banknew-view">



        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'bank_name:ntext',
                'user_id',
                'account_no',
                'isfc_code',
                'zip_code',
                'account_type',
                'branch_name:ntext',
                'bank_accnt_name:ntext',
                'created_at',
                'updated_at',
                'isactive',
                'user_auth:ntext',
            ],
        ])
        ?>

    </div>
</div>