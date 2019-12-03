<?php

/**
 * @var $this yii\web\View
 */
use frontend\assets\TransactionAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

TransactionAsset::register($this);
?>
<?php $this->beginContent('@frontend/views/layouts/base13transaction.php'); ?>



<body>
   
<div class="container-fluid no_pad div_header">
		
		
			
			</div>
			
			
<!-- end of navbar-->
		</div>
    
	
	<!--======QUERY FORM==========-->
		
<?php echo $content ?>


     <!--Footer Section------>






       
       <?php $this->endContent(); ?>
<script>
function openNav() {
document.getElementById("mySidenav").style.width = "400px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}

	</script>
	
</body>

</html>



  