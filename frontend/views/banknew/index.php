<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BanknewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banknews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-9 content_dashboard no_pad">
<div class="row">

<div class="col-md-12 detail_update">
					<div class="row bank_edit">
						<p class="add_bank">Please add your Bank Details</p>
						<p class="text-center process_continue">
                        <!-- <a class="property_process" href="#">Update Details</a> -->
                        <?= Html::a('Update Details', ['/banknew/create'], ['class'=>'property_process']) ?>
                        </p>
					</div>			
				</div>
                </div>
                </div>
   
