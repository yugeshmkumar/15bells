<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Banknew */
/* @var $form yii\widgets\ActiveForm */
$userid = Yii::$app->user->identity->id;
?>

<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Account holder details</h2>
					</div>
					
				</div>
				


                <?php
                $arrgetbank = \common\models\activemode::findmybank($userid);
                $temp = 0;
                foreach ($arrgetbank as $getbank) {
                    $fourfirstdigits = mb_substr($getbank->account_no, 0, 4);
                    $fourlasttdigits = mb_substr($getbank->account_no, -4);
                    ?>
				<div class="col-md-12 detail_update">
					<div class="row user_bank">
						<h2 class="prop_id"><?php echo $getbank->bank_accnt_name ?></h2>
						<div class="col-md-4 account_details">
							<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/bank.svg';  ?>" width="20">Bank name</p>
							<p class="label_name"><?php echo $getbank->bank_name ?></p>
						</div>
						<div class="col-md-4 account_details">
							<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/acc_no.svg';  ?>" width="20">Account number</p>
							<p class="label_name"><?php echo $getbank->account_no ?></p>
						</div>
						<div class="col-md-4 account_details">
							<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/ifsc.svg';  ?>" width="20">IFSC code</p>
							<p class="label_name"><?php echo $getbank->isfc_code ?></p>
						</div>
						<div class="col-md-4 account_details">
							<p class="details_label"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/account_type.svg';  ?>" width="20">Account Type</p>
							<p class="label_name"><?php echo $getbank->account_type ?></p>
						</div>
					</div>



					<div class="col-md-12 save_profile text-right">
							<!-- <a href="#" class="save_button">Update</a> -->
                            <?= Html::a('Update', ['update', 'id' => $getbank->id], ['class' => 'save_button']) ?>
                            <!-- <a href="#" class="edit_profile">Delete</a> -->
                            <?=
            Html::a('Delete', ['delete', 'id' => $getbank->id], [
                'class' => 'edit_profile',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
					</div>	
                   		
				</div>
                <?php } ?>		
			</div>
  		</div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
