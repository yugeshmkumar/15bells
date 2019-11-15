<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>User</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Bank Details</span>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> View Bank Details</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">


            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#">
                        <i class="icon-bell"></i> Action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-shield"></i> Another action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-user"></i> Something else here</a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="#">
                        <i class="icon-bag"></i> Separated link</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END PAGE BAR -->
<br/>
<div class="note note-info">
    Successfully Saved.
</div>
<div class="bank-view">



    <?=
    DetailView::widget([
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
    ])
    ?>

</div>
