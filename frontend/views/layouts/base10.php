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
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153152050-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153152050-1');
</script>


<script type='text/javascript'>
  window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '9dcb652eb6c987dddf65195047c6f189e1de77ce');
</script>
</head>
<body>





    <?php $this->beginBody() ?>
        <?php echo $content ?>
    <?php $this->endBody() ?>

</html>
<?php $this->endPage() ?>
