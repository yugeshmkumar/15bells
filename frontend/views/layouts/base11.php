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

<script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "Organization",
"name": "15bells",
"alternateName": "Fifteen Bells",
"url": "https://www.15bells.com/",
"logo": "https://www.15bells.com/",
"contactPoint": {
"@type": "ContactPoint",
"telephone": "+91 6209151515",
"contactType": "sales",
"areaServed": "IN",
"availableLanguage": ["en","Hindi"]
},
"sameAs": [
"https://www.facebook.com/15bell/",
"https://www.youtube.com/channel/UCKcj4tE9LnA_Wx855ymfV8A",
"https://in.linkedin.com/company/15bells",
"https://www.instagram.com/15bells/"
]
}
</script>
</head>
<body>





    <?php $this->beginBody() ?>
        <?php echo $content ?>
    <?php $this->endBody() ?>

</html>
<?php $this->endPage() ?>
