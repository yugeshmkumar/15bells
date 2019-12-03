<?php
use frontend\assets\TransactionAsset;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */

TransactionAsset::register($this);

$this->params['body-class'] = array_key_exists('body-class', $this->params) ?
    $this->params['body-class']
    : null;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>


<link rel="shortcut icon" href="/favicon.ico" />
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	
</head>
<?php echo Html::beginTag('body', [
    
])?>


    <?php $this->beginBody() ?>
        <?php echo $content ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {
			
			clock = $('.clock').FlipClock({
		        clockFace: 'MinuteCounter'
		    });
		});
        $(".message_hed").click(function(){
	$(".message").slideToggle();
	$(".message").addClass('message_height');
});
	</script>

    <?php $this->endBody() ?>
<?php echo Html::endTag('body') ?>

</html>
<?php $this->endPage() ?>
