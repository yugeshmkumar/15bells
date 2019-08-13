<?php
use frontend\assets\NewDesignAsset;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */

NewDesignAsset::register($this);

$this->params['body-class'] = array_key_exists('body-class', $this->params) ?
    $this->params['body-class']
    : null;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    
  


    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<link rel="shortcut icon" href="../favicon.ico" />


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120052176-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120052176-1');
</script>




</head>
<?php echo Html::beginTag('body', [
    
])?>





    <?php $this->beginBody() ?>
        <?php echo $content ?>
    <?php $this->endBody() ?>
<?php echo Html::endTag('body') ?>
</html>
<?php $this->endPage() ?>
