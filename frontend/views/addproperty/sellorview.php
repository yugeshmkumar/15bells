<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\db\Query ;

use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\CompanyEmp;
use common\models\User;
use common\models\RequestSiteVisit;
use yii\data\ActiveDataProvider;





$this->title = 'Request Site Visits';
$this->params['breadcrumbs'][] = $this->title;

// $dataProvider = new ActiveDataProvider([
//     'query' => RequestSiteVisit::find()->joinWith(['request_site_visit(property_id)'])
// ]);

$datas =  $dataProvider->query->all();


?>


<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Seller Site Visit</h2>
					</div>
					
				</div>

                <?php foreach ($datas as $data){ 

                $RequestSiteVisit = \common\models\RequestSiteVisit::find()->where(['property_id' => $data->id])->one();
if($RequestSiteVisit){


                $viewid  =  $data->id;                
                $haritid = 273*179-$viewid;
                $propsid = 'PR'. $haritid;

                $addproperty = \common\models\Addproperty::find()->where(['id' => $viewid])->one();
                $project_type_id = $addproperty->project_type_id;
                $property_type = \common\models\PropertyType::find()->where(['id' => $project_type_id])->one();
                $querys = CompanyEmp::find()->where(['id'=>$RequestSiteVisit->sales_id])->one();
                 $assigned_id = $querys->userid;

                $users = User::find()->where(['id'=>$assigned_id])->one();
                                    
                    ?>
				<div class="col-md-12 property_detail">
					<p class="property_id">Property ID : <?php echo $propsid; ?></p>
					
							<div class="col-md-12 visit_buyer">
								<div class="row">
									<div class="col-md-3">
										<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/team/t2.jpg';  ?>" width="140">
									</div>
                                   
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8">
												<h3 class="user_name"><?php echo $users->fullname; ?></h3>
												<p class="user_id">UID<?php echo $assigned_id * 23 * 391; ?></p>
											</div>
											<div class="col-md-4 date_det">
												<p class="site_txt"><?php echo  date("F d,Y", strtotime($RequestSiteVisit->scheduled_time)); ?></p>
												<p class="site_txt"><?php echo  date("g:i A", strtotime($RequestSiteVisit->scheduled_time)); ?></p>
											</div>
										</div>
										<p class="user_detail"><i class="fa fa-phone"></i> +91-<?php echo $users->username; ?></p>
										<p class="user_detail"><i class="fa fa-envelope"></i> <?php echo $users->email; ?></p>
										<div class="row">
											<div class="col-md-6 company_overview property_manage">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/building.svg';  ?>" width="16">Type of property</p>
											<p class="label_name"><?php echo $property_type->typename ?></p>
										</div>
										<div class="col-md-6 company_overview property_manage">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/site-visit.svg';  ?>" width="16">Location</p>
											<p class="label_name"><?php echo $data->locality ?></p>
										</div>
										<div class="col-md-6">
                                        <?php 
                                        $query = (new Query())->select('COUNT(*) as newcount')->from('request_site_visit')->where(['property_id' => $data->id]);
                                $command = $query->createCommand();
                                $datacount = $command->queryOne();
                                ?>
                              <p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/watch.svg';  ?>" width="20"><?php echo $datacount['newcount']; ?></p>

										</div>
										<div class="col-md-6">
											<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/watch.svg';  ?>" width="20"><a class="toglebid" id="<?php echo $data->id ?>" href="javascript:void(0)" >View</a></p>
											
										</div>
										</div>
									</div>
								</div>
								
							</div>

						
				</div>
                <?php }  } ?>
			</div>
  		</div>




<div id="shortlist" class="modal fade" role="dialog">
    <div class="modal-dialog prop_shortlst modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="headpropuser"></h4>
            </div>
            <div class="modal-body">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                 
						<div class="card-header">
							
							<div id="appenddata" class="row">

							</div>
						</div>
				


                </div><!-- panel-group -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<?php 
$script = <<< JS




$('.toglebid').click(function(){
 var propertyids =  $(this).attr('id');

$("#shortlist").modal('show');
$('#appenddata').html('');
$('#headpropuser').html('Users made bid to your Property');

//alert(id);
$.ajax({
    url: 'getsiteuserids',
    data: {id: propertyids},
    success: function (data) {
        //alert(data); 
        var obj = $.parseJSON(data);
        var countprop = Object.keys(obj).length;
        if (countprop == 0) {
            $('#appenddata').html('No User has Placed a Bid for this Property');
        }


        $.each(obj, function () {


          var usercustomid = 'UID'+this.user_id * 23 * 391;
            $('#appenddata').append('<div class="more-less glyphicon glyphicon-plus"></i> User Id #' + usercustomid +
                    
                    '</div>');
        });

    },
});

});
							




 function togleBid(id) {

$("#shortlist").modal('show');
$('#appenddata').html('');
$('#headpropuser').html('Users made bid to your Property');

//alert(id);
$.ajax({
    url: 'getsiteuserids',
    data: {id: id},
    success: function (data) {
        //alert(data); 
        var obj = $.parseJSON(data);
        var countprop = Object.keys(obj).length;
        if (countprop == 0) {
            $('#appenddata').html('No User has Placed a Bid for this Property');
        }


        $.each(obj, function () {


          var usercustomid = 'UID'+this.user_id * 23 * 391;
            $('#appenddata').append('<div class="more-less glyphicon glyphicon-plus"></i> User Id #' + usercustomid +
                    
                    '</div>');
        });

    },
});

}






JS;
$this->registerJs($script);
?>