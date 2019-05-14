<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserProfilenew */

$this->title = 'Create User Profilenew';
$this->params['breadcrumbs'][] = ['label' => 'User Profilenews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profilenew-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
