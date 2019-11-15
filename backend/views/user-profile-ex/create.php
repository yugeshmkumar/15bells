<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserProfileEx */

$this->title = 'Create User Profile Ex';
$this->params['breadcrumbs'][] = ['label' => 'User Profile Exes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-ex-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
