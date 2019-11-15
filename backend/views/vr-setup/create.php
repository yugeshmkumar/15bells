<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VrSetup */

?>
<div class="vr-setup-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	//alert();
   $(".treeview").addClass('active');
			$( "ul.treeview-menu li:nth-child(4)").addClass("active");
 $('body').removeClass('sidebar-collapse');
});
</script>