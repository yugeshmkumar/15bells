<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SubUser */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-user-view">

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
            'username',
            'auth_key',
            'access_token',
            'password_hash',
            'password_reset_token',
            'oauth_client',
            'oauth_client_user_id',
            'email:email',
            'mobile',
            'status',
            'created_at',
            'updated_at',
            'logged_at',
        ],
    ]) ?>

</div>
