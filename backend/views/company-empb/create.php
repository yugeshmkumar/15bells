<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CompanyEmpb */

?>
<div class="company-empb-create">
    <?= $this->render('_form', [
        'model' => $model,
		 'roles' => $roles
    ]) ?>
</div>
