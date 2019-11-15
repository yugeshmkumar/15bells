<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfileEx */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Profile Exes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-ex-view">

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
            'user_id',
            'title',
            'emailid:email',
            'mobileid',
            'cur_addressid1',
            'per_addressid1',
            'gender',
            'pan_card_number',
            'adhar_number',
            'dob',
            'created_at',
            'updated_at',
            'isActive',
        ],
    ]) ?>

</div>
