<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = 'Documents';
?>
<style>

</style>
							
							<div class="portlet-body">
<div class="employee-create">

    <?php echo $this->render('_form', [
    
        'model' => $model,
		'totnumberofdocument' => HtmlPurifier::process($totnumberofdocument),
        'totnumberofdocument' => HtmlPurifier::process($totnumberofdocument),
        'busdocument'=>$busdocument,
    ]) ?>

</div></div>
