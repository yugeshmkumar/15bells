<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfilenew */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'User Profilenews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profilenew-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->user_id], [
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
            'user_id',
            'firstname',
            'middlename',
            'lastname',
            'avatar_path',
            'avatar_base_url:url',
            'locale',
            'gender',
            'phone',
            'address:ntext',
            'facebook_id',
            'linkedin_id',
            'minor:ntext',
            'relationship_with_minor:ntext',
            'guardian_name:ntext',
        ],
    ]) ?>

</div>
