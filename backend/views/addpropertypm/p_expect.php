
<?php 
 $userproperty = \common\models\Addproperty::find()->where(['id'=>$_GET['id']])->one();
	  
?>

 <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-speech"></i>
                                        <span class="caption-subject bold uppercase"> Review User Expection</span>
                                        <span class="caption-helper">daily stats...</span>
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn btn-circle btn-default">
                                            <i class="fa fa-envelope"></i> E-mail </a>
                                        <a href="javascript:;" class="btn btn-circle btn-default">
                                            <i class="fa fa-tty"></i> SMS </a>
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
								<div class = "note note-info">
								User as Lesse OR Lessor
								</div>
								<?php $searchModel = new \common\models\LessorExpectationsbinSearch();
                                         $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$userproperty->user_id);
                                      ?>
								<?= Yii::$app->controller->renderPartial('/lessor-expectationsbin/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,	
        ]);
		?>
          
								<div class = "note note-info">
								User as Seller OR Buyer
								</div>
								<?php $searchModel = new \common\models\SellorExpectationsbinSearch();
                                         $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$userproperty->user_id);
                                      ?>
								<?= Yii::$app->controller->renderPartial('/sellor-expectationsbin/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,	
        ]);
		?>
								</div>
                                </div>