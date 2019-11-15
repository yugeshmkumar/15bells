<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */

$this->title = 'Update Leadrequest: ' . ' ' . $model->leadRequestID;
$this->params['breadcrumbs'][] = ['label' => 'Leadrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->leadRequestID, 'url' => ['view', 'id' => $model->leadRequestID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leadrequest-update">
 <div class="breadcrumbs">
<h1> Add More Details</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
							 <li>CRM</li>
                            <li>SALES</li>
							 <li class="active">Add Details</li>
                        </ol>
                    </div>
    <?php echo $this->render('_formcreate', [
     'model' => $model,
		'model2'=>$model2,
		'model3'=>$model3,
    ]) ?>

</div>
