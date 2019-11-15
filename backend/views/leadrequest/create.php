<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */

$this->title = 'Create Leadrequest';
$this->params['breadcrumbs'][] = ['label' => 'Leadrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="leadrequest-create">
 <div class="breadcrumbs">
<h1> Add New Lead</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Home</a>
                            </li>
							 <li>CRM</li>
                            <li>SALES</li>
							 <li class="active">Add New Lead</li>
                        </ol>
                    </div>
    <?php echo $this->render('_formcreate', [
        'model' => $model,
		'model2'=>$model2,
		'model3'=>$model3,
    ]) ?>

</div>
