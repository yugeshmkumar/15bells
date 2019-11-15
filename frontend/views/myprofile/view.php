<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Myprofile */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Myprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myprofile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'first_name',
            'last_name',
            'emailid:email',
            'mobileid',
            'dob',
            'gender',
            'martial_status',
            'minor',
            'relatnshp_with_minor:ntext',
            'guardian_name:ntext',
            'pan_card_no',
            'adhar_card_no',
            'current_country:ntext',
            'current_state:ntext',
            'current_city:ntext',
            'current_pincode',
            'permanent_country:ntext',
            'permanent_state:ntext',
            'permanent_city:ntext',
            'permanent_pincode',
            'isactive',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
