<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\comm\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption font-green-sharp">
                                        <i class="icon-share font-green-sharp"></i>
                                        <span class="caption-subject bold uppercase"> Portlet</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="actions">
                                       
                                    </div>
                                </div>
                                <div class="portlet-body">
								 <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-circle btn-transparent grey-salsa active">
                                                <input type="radio" name="options" class="toggle" id="option1">E-mail</label>
                                            <label class="btn btn-circle btn-transparent grey-salsa">
                                                <input type="radio" name="options" class="toggle" id="option2">SMS</label>
                                            <label class="btn btn-circle btn-transparent grey-salsa">
                                                <input type="radio" name="options" class="toggle" id="option3">Facebook Message</label>
												 <label class="btn btn-circle btn-transparent grey-salsa">
                                                <input type="radio" name="options" class="toggle" id="option4">Twitter Message</label>
                                        </div>
										 <form role="form">
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <input type="text" class="form-control" id="form_control_1" >
                                                <label for="form_control_1">Subject</label>
                                                <span class="help-block">Some help goes here...</span>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <textarea type="text" class="form-control" id="form_control_1"></textarea>
                                                <label for="form_control_1">Message</label>
                                                <span class="help-block">Some help goes here...</span>
                                            </div>
                                            <div class="form-group form-md-floating-label has-success">
											 <label for="form_control_1">Attachment ,if any</label>
                                                <input type="file" class="form-control" id="form_control_1">
                                               
                                            </div></div>
											
											<div class="note note-info">
											Filters
											</div>
											
											
											 <div class="tabbable-line">
                                        <ul class="nav nav-tabs ">
                                            <li class="active">
                                                <a href="#tab_15_1" data-toggle="tab"> Registered Users </a>
                                            </li>
                                            <li>
                                                <a href="#tab_15_2" data-toggle="tab"> Distribution Group </a>
                                            </li>
                                            <li>
                                                <a href="#tab_15_3" data-toggle="tab"> Non-Registered Users </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_15_1">
                                                <p> I'm in Registered Users Section. </p>
												<p>
												<?php 
												$arrusers = \common\models\User::find()->all();
												$listuser = ArrayHelper::map($arrusers ,'id','email');
												// Tagging support Multiple (maintain the order of selection)
echo '<label class="control-label">Tag Multiple</label>';
echo Select2::widget([
    'name' => 'registeredusers',
	 'id' => 'registeredusers',
     // initial value
    'data' => $listuser,
    'maintainOrder' => true,
    'options' => ['placeholder' => 'Select Users...', 'multiple' => true],
    'pluginOptions' => [
        'tags' => true,
        //'maximumInputLength' => 10
    ],
]);


?>
												</p>
												<p>
												<button type="submit" name="sendtoregisteredusers" class="btn btn-info">Send</button>
												</p>
                                             </div>
											 <div class="tab-pane" id="tab_15_2">
                                                <p> I'm in Distribution Group Section. </p>
												<p>
												<?php 
												$arrusersgroup = \frontend\modules\comm\models\MessageGroups::find()->orderBy('listname')->all();
												$listusertwo = ArrayHelper::map($arrusersgroup ,'id','listname');
												// Tagging support Multiple (maintain the order of selection)
echo '<label class="control-label">Tag Multiple</label>';
echo Select2::widget([
    'name' => 'messagegroups',
	 'id' => 'messagegroups',
     // initial value
    'data' => $listusertwo,
    'maintainOrder' => true,
    'options' => ['placeholder' => 'Select Groups...', 'multiple' => true],
    'pluginOptions' => [
        'tags' => true,
        //'maximumInputLength' => 10
    ],
]);


?></p>
                                             </div>
											 <div class="tab-pane" id="tab_15_3">
                                                <p> I'm in Non-Registered Users Section. </p>
												<p>
												<input type="email" class="form-control" id="enteremail" name="enteremail">
												</p>
												<p>
												<button type="submit" name="sendto_nonregisteredusers" class="btn btn-info">Send</button>
												</p>
                                             </div>

											 </div> </div>
											</form>
								
								</div></div>