<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Myprofile */

if(isset($model->first_name)) { $this->title = $model->first_name . $model->emailid ; 
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Myprofiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myprofile-view">

   

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'guardianprofileid',
            //'userID',
           // 'title',
            'first_name',
            'middlename:ntext',
            'last_name',
			'dob',
            'gender',
            'martial_status',
            'nationality:ntext',
			'pan_card_no',
            'adhar_card_no',
            'countryverificatn:ntext',
            'passportno:ntext',
            'pionumber:ntext',
            'ocinumber:ntext',
			'emailaddresses.emailtype',
            'emailaddresses.emailaddress',
			 'phonenumbers.phonetype',
			  'phonenumbers.country_code',
            'phonenumbers.phone_no',
            
            //'isMinor:ntext',
            //'relatnshp_with_minor:ntext',
            //'guardian_name:ntext',
            
            'current_country:ntext',
            'current_state:ntext',
            'current_city:ntext',
            'current_pincode',
            'current_address:ntext',
            'permanent_country:ntext',
            'permanent_state:ntext',
            'permanent_city:ntext',
            'permanent_pincode',
            'permanent_address:ntext',
            
        ],
    ]) ?>

</div>
<?php } else { ?>
<div class="note note-danger">
Empty User Profile . 
</div>
<?php } ?>
