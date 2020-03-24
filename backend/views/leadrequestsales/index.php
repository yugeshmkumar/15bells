<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use \kartik\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel common\models\leadrequestsalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'leadrequestsaless';
$this->params['breadcrumbs'][] = $this->title;
$rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();

?>
     <style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccff" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbff" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhtwo"></div> </div>
 <style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffx" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffx" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhthree"></div> </div>

 
 <style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffa" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffa" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhfour"></div> </div>
<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffaaccept" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffaaccept" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhfouraccept"></div> </div>
<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffareject" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffareject" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhfourreject"></div> </div>

<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffd" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffd" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhfive"></div> </div>
<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffs" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffs" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhsix"></div> </div>
<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffp" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffp" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhseven"></div> </div>
<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccfff" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbfff" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobheight"></div> </div>
<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccfffe" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbfffe" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhten"></div> </div>

<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccfffc" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbfffc" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhnine"></div> </div>
<style>.viewpsambqwkstalkbubble { width: 100%; height: 100%;  background:#fefefe;   position: relative; } .sambqwkstalkbubble:before {  }</style> <style>.viewpsambqwksukvveekmuzqtsblevbbffe{display: none;position: fixed; top: 0%;left: 0%;width: 100%;height: 100%;z-index:1001; background-color:#ffffff; opacity:.30;filter: alpha(opacity=80);}.viewpsambqwksukvveekmuzqtswhevbbffe {display: none;position: fixed; -webkit-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); -moz-box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); box-shadow: 2px 5px 80px rgba(0, 0, 0, 0.4); background-color:#fefefe;    right:20%;  left:20%; top:16%; bottom:6%; z-index:1015; overflow:auto; overflow-x:hidden}</style> <div id="viewpsambqwksukvveekmuzqtsimaccffr" class="viewpsambqwksukvveekmuzqtsblevbbffe" onClick="" ></div> <div id="viewpsambqwksukvveekmuzqtsimabbffr" class="viewpsambqwksukvveekmuzqtswhevbbffe"  > <div class="viewpsambqwkstalkbubble" id="vpcobhtop"></div> </div>

<div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-purple-soft"></i>
                                        <span class="caption-subject font-purple-soft bold uppercase">Lead Management -Sales</span>
                                    </div>
                                    <div class="actions">
									<?php
									if(isset($_GET['pr'])){
										$pr = $_GET['pr'];
									} else {
										$pr ='';
									}
	$arrgetleadtype = \common\models\Leadsbuckets::find()->where(['isactive'=>1])->all();
	
	?>
	<!-- <div class="row">
	<div class="col-md-5">
	<select onChange="changestatus()"id ="leadstatus" name="leadstatus" class="form-control">
	
	<?php foreach($arrgetleadtype as $getleadtype) { ?>
	
	<option value="<?php echo $getleadtype->id ?>" <?php if(($_GET['status'])== $getleadtype->id) { ?> selected <?php } ?>><?php echo $getleadtype->bucketname ?></option>
	<?php } ?>
	</select>
	</div><div class="col-md-6">
								<?php
	$arrgetproducttype = \common\models\PropertyType::find()->where(['isactive'=>1])->all();
	?>
	<select onChange="changeproduct()" id ="prodname" name="prodname" class="form-control">
	<option value="">All Products</option>
	<?php foreach($arrgetproducttype as $getproducttype) { ?>
	
	<option  value="<?php echo $getproducttype->id ?>" 
	<?php if(isset($_GET['pr'])){ ?><?php if(($_GET['pr'])== $getproducttype->id) { ?> selected <?php } ?><?php } ?>
	><?php echo $getproducttype->typename ?></option>
	<?php } ?>
	</select>
	</div>
	 -->
                                    </div></div>
                                </div>
                                <div class="portlet-body">
                                   
                                            <p><div class="leadrequestsales-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	
    <p align="right">
	</p>
	

	

	
	<?php if($pr && $_GET['status']){ ?>
	
		<?php 
	 $searchModel = new  \common\models\LeadsSalesSearch();
       if($rbac->item_name == "sales_head"){ 
				 $dataProvider = $searchModel->searchbystatusndproduct_forhead(Yii::$app->request->queryParams,$_GET['status'],$_GET['pr']); } else { 
	  $dataProvider = $searchModel->searchbystatusndproduct(Yii::$app->request->queryParams,$_GET['status'],$_GET['pr']);
				 } 
?>
<?= Yii::$app->controller->renderPartial('gridviewforindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			//'classid'=>$_GET["cat"],
        ]);?> 
	
<?php  }else  if(isset($_GET['status'])){ ?>
		<?php 
	 $searchModel = new  \common\models\LeadsSalesSearch();
	 if($rbac->item_name == "sales_head"){ 
	  $dataProvider = $searchModel->searchbystatus_forhead(Yii::$app->request->queryParams,$_GET['status']); } else { 
	  $dataProvider = $searchModel->searchbystatus(Yii::$app->request->queryParams,$_GET['status']);
	   } 
?>
<?= Yii::$app->controller->renderPartial('gridviewforindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			//'classid'=>$_GET["cat"],
        ]);?> 
<?php } ?>
	
												</p>
                                        </div></div></div>


       

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
 <script>
$(document).ready(function(){
	
	$('.dropdown-toggle').dropdown();
   $( "ul.sidebar-menu li:nth-child(2)").addClass("active");
  
});

</script>
    <script>

function getcompanydetails(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/companydetails"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhtwo').html(msg);
				
                  
                }

            });

}

</script>
 <script>

function getproductdetails(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/productdetails"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhthree').html(msg);
				
                  
                }

            });

}

</script>
 <script>

function assignlead(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/assignlead"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhfour').html(msg);
				
                  
                }

            });

}

</script>
<script>

function assignleadaccept(str,ttr){
              
    
         $.ajax({

                type: "GET",
				
				
				
		 url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/assignleadaccept"]) ?>?leadid="+str+"&status="+ttr,
                
                success: function(msg){
				
                    $('#vpcobhfouraccept').html(msg);
				
                  
                }

            });

}

</script>
<script>

function functionprofilepl(str){
             

		  

    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/reverselead"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobh202').html(msg);
				
                  
                }

            });

}

</script>
<script>

function assignleadreject(str,ttr){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/assignleadreject"]) ?>?leadid="+str+"&status="+ttr,
                
                success: function(msg){
				
                    $('#vpcobhfourreject').html(msg);
				
                  
                }

            });

}

</script>
 <script>

function addleaddetails(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/addleaddetails"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhfive').html(msg);
				
                  
                }

            });

}

</script>
 <script>

function schedule(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/schedule"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhsix').html(msg);
				
                  
                }

            });

}

</script>

<script>

function followuponproposal(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/followuponproposal"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobheight').html(msg);
				
                  
                }

            });

}

</script>
 <script>

function addproposal(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/addproposal"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhseven').html(msg);
				
                  
                }

            });

}

</script>

 <script>

function createanorder(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/createanorder"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhnine').html(msg);
				
                  
                }

            });

}

</script>
 <script>

function sendcompleteemail(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/sendcompleteemail"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhten').html(msg);
				
                  
                }

            });

}

</script>
 <script>

function rejectlead(str){
              
    
         $.ajax({

                type: "GET",
				
				
				
				url: "<?php echo Yii::$app->urlManager->createUrl(["leadrequestsales/rejectlead"]) ?>?leadid="+str,
                
                success: function(msg){
				
                    $('#vpcobhtop').html(msg);
				
                  
                }

            });

}

</script>

   <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      