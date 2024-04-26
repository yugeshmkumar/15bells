<?php
use backend\assets\BackendAsset;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $content string */

$bundle = BackendAsset::register($this);

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

</head>
<?php echo Html::beginTag('body', [
    'class' => implode(' ', [
        ArrayHelper::getValue($this->params, 'body-class'),
        Yii::$app->keyStorage->get('backend.theme-skin', 'skin-blue'),
        Yii::$app->keyStorage->get('backend.layout-fixed') ? 'fixed' : null,
        Yii::$app->keyStorage->get('backend.layout-boxed') ? 'layout-boxed' : null,
        Yii::$app->keyStorage->get('backend.layout-collapsed-sidebar') ? 'sidebar-collapse' : null,
    ])
])?>
    <?php $this->beginBody() ?>
        <?php echo $content ?>
    <?php $this->endBody() ?>

<?php echo Html::endTag('body') ?>
<script>
    (function (doc, tag, src, id) {
    let body = doc.getElementsByTagName("body");
    let el = doc.createElement(tag);
    el.setAttribute("src", src);
    el.setAttribute("id", id);
    el.onload = setConfig;
    body[0].append(el);
    })(document,
    "script", "https://konnect.knowlarity.com/external/embed/widget.js",
    "knw-widget-sdk");
    function setConfig() {
        let config = {
        height: "400px",
        width: "300px",
        src: "https://konnect.knowlarity.com/external/#",
        };
        KNW_WIDGET.setUserConfig(config);
    }
 </script>
</html>

<?php $this->endPage() ?>