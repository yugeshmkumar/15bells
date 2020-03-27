<?php
/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $roles yii\rbac\Role[] */
$this->title = Yii::t('frontend', 'Create {modelClass}', [
    'modelClass' => 'User',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-9 sellor_proprty">
            <div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Add Subuser</h2>
					</div>
					<div class="col-md-6 text-right addprop_button">
                   
					</div>
				</div>
                </div>
<div class="user-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'roles' => $roles
    ]) ?>

</div>
</div>
