<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\bootstrap\Modal;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
//use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
 use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\db\Query;

 $userid = Yii::$app->user->identity->id;
 
CrudAsset::register($this);


 ?>
 <style>
 a{
	 text-decoration:none !important;
 }
 .expct_name{
	        color: #fff;
    font-size: 19px;
    border: 1px solid #fff;
    width: 85%;
    margin: 30px auto;
    padding: 3px;
    border-radius: 5px !important;
	transition:.4s;
 }
.numbr_expct {
    color: #fff;
    font-size: 50px;
    font-weight: bold;
    width: 135px;
    margin: 0 auto;
    height: 135px;
    border: 1px solid #ffffff;
    border-radius: 50%!important;
    padding-top: 30px;
	transition:.4s;
	background: rgba(255, 255, 255, 0.18);
}

 .all_expctatns{
	 border-bottom:4px solid #e5ac31 !important;
	 color:#ffffff;
	 padding-bottom:4px;
	 margin-bottom:40px;
	  font-weight:600;
	 text-transform:uppercase; 
 }
 .padding_t{
	 padding-top:20px;
 }
 .padding_t:hover .expct_name{
	 background:#e5ac31;
	 color:#ffffff;
	 transition:.4s;
	 border-color:#e5ac31;
 }
 .padding_t:hover .numbr_expct{
	border-color:#e5ac31;
	 transition:.4s;
 }
	 
 </style>
 <!-- start breadcrumb -->

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
 	<div class="col-md-9">
		
		<div class="row">
                    
			<?php
                        
                            $querys = new Query;
                            $querys->select('COUNT(*) as newcount')
                            ->from('sellor_expectations')
                            ->where(['user_id' => $userid])
                            ->andwhere(['user_type' => 'sellor']);
                            $commands = $querys->createCommand();
                            $paymentsm = $commands->queryOne();
                            $seller = $paymentsm['newcount'];
                            
                            
                            $querys1 = new Query;
                            $querys1->select('COUNT(*) as newcount')
                            ->from('sellor_expectations')
                            ->where(['user_id' => $userid])
                            ->andwhere(['user_type' => 'buyer']);
                            $commands1 = $querys1->createCommand();
                            $paymentsm1 = $commands1->queryOne();
                            $buyer = $paymentsm1['newcount'];
                            
                            
                            $querys11 = new Query;
                            $querys11->select('COUNT(*) as newcount')
                            ->from('lessor_expectations')
                            ->where(['user_id' => $userid])
                            ->andwhere(['user_type' => 'lessor']);
                            $commands11 = $querys11->createCommand();
                            $paymentsm11 = $commands11->queryOne();
                            $lessor = $paymentsm11['newcount'];
                            
                            
                            $querys2 = new Query;
                            $querys2->select('COUNT(*) as newcount')
                            ->from('lessor_expectations')
                            ->where(['user_id' => $userid])
                            ->andwhere(['user_type' => 'lessee']);
                            $commands2 = $querys2->createCommand();
                            $paymentsm2 = $commands2->queryOne();
                            $lessee = $paymentsm2['newcount'];
                        ?>
                    
			<h3 class="all_expctatns">Expectations</h3>	
				<div class="col-md-3 text-center padding_t">
					<a href="<?php echo Yii::$app->urlManager->createUrl(['/sellor-expectations/sellor']) ?>"><div class="expectation_detail">
						<p class="numbr_expct"><?php echo $seller; ?></p>
						<p class="expct_name">Seller Expectation</p>
					</div></a>
				</div>
				<div class="col-md-3 text-center padding_t">
					<a href="<?php echo Yii::$app->urlManager->createUrl(['/sellor-expectations/buyer']) ?>"><div class="expectation_detail ">
						<p class="numbr_expct"><?php echo $buyer; ?></p>
						<p class="expct_name">Buyer Expectation</p>
					</div></a>
				</div>
				<div class="col-md-3 text-center padding_t">
					<a href="<?php echo Yii::$app->urlManager->createUrl(['/lessor-expectations/lessor']) ?>"><div class="expectation_detail">
						<p class="numbr_expct"><?php echo $lessor; ?></p>
						<p class="expct_name">Lessor Expectation</p>
					</div></a>
				</div>
				<div class="col-md-3 text-center padding_t"> 
					<a href="<?php echo Yii::$app->urlManager->createUrl(['/lessor-expectations/lessee']) ?>"><div class="expectation_detail">
						<p class="numbr_expct"><?php echo $lessee; ?></p>
						<p class="expct_name">Lessee Expectation</p>
					</div></a>
				</div>
				
		</div>
	
	</div>					   
                                                                                                  
		
