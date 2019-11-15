<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use \kartik\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel common\models\LeadrequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leadrequests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-purple-soft"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase">Lead Management</span>
                                    </div>
                                    <div class="actions">
									<?php
	$arrgetleadtype = \common\models\Leadsbuckets::find()->where(['isactive'=>1])->all();
	
	?>
	<div class="row">
	<div class="col-md-5">
	<select onChange="changestatus()"id ="leadstatus" name="leadstatus" class="form-control">
	
	<?php foreach($arrgetleadtype as $getleadtype) { ?>
	
	<option value="<?php echo $getleadtype->id ?>" <?php if(($_GET['status'])== $getleadtype->id) { ?> selected <?php } ?>><?php echo $getleadtype->bucketname ?></option>
	<?php } ?>
	</select>
	</div><div class="col-md-6">
								<?php
	$arrgetproducttype = \common\models\Producttype::find()->where(['isactive'=>1])->all();
	?>
	<select onChange="changeproduct()" id ="prodname" name="prodname" class="form-control">
	<option value="allproducts">All Products</option>
	<?php foreach($arrgetproducttype as $getproducttype) { ?>
	
	<option  value="<?php echo $getproducttype->id ?>" 
	<?php if(isset($_GET['pr'])){ ?><?php if(($_GET['pr'])== $getproducttype->id) { ?> selected <?php } ?><?php } ?>
	><?php echo $getproducttype->name ?></option>
	<?php } ?>
	</select>
	</div>
	
                                    </div></div>
                                </div>
                                <div class="portlet-body">
                                   
                                            <p><div class="leadrequest-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	
    <p align="right">
	</p>
	

	<?php if(isset($_GET['pr'])){ ?>
	
		<?php 
	 $searchModel = new  \common\models\LeadrequestSearch();
        $dataProvider = $searchModel->searchbystatusndproduct(Yii::$app->request->queryParams,$_GET['status'],$_GET['pr']);
?>
<?= Yii::$app->controller->renderPartial('gridviewforindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			//'classid'=>$_GET["cat"],
        ]);?> 
	
	<?php } else if(isset($_GET['status'])){ ?>
		<?php 
	 $searchModel = new  \common\models\LeadrequestSearch();
        $dataProvider = $searchModel->searchbystatus(Yii::$app->request->queryParams,$_GET['status']);
?>
<?= Yii::$app->controller->renderPartial('gridviewforindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			//'classid'=>$_GET["cat"],
        ]);?> 
	
	<?php } ?>


												</p>
                                        </div></div>


       

		 <?php
$actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$arr =  explode("&pr", $actual_link, 2);
$arr2 = explode("?status", $actual_link, 2);
$arr3 = explode("&stud", $actual_link, 2);
$sufurl3 = $arr3[0];
$sufurl2 = $arr2[0];
$sufurl = $arr[0];
 ?>
 
  <script>
function changestatus() {
var acval=$('#leadstatus').val();
var url="http://<?php echo $sufurl2 ?>?status="+acval;
window.location.href = url;
}
</script>
 <script>
function changeproduct() {
var acval=$('#prodname').val();
var url="http://<?php echo $sufurl ?>&pr="+acval;
window.location.href = url;
}
</script>

 
<?php  $form = ActiveForm::begin(array('id'=>'ibformnmssacad')); ?>		
<input type="hidden" name="appsocketidacad" id="appsocketidacad" >
 <input type="submit" name="pdfsssacad" id="pdfsssacad"  value="pdfssacad" style="display:none;"  > 
 <?php $form = ActiveForm::end(); ?>   
   
