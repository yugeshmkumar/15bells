<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
?>
<?php
$userid = $_GET['uid'];
$vrroomid = $_GET['id'];
$user = \common\models\User::find()->where(['id' => $userid])->one();
?>

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">Hello ,<?php echo $user->email ?></div>
        <div class="tools">

            <div style="padding-right:11px;">

                <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkkl').style.display = 'none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjkl').style.display = 'none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;"> X</a>
            </div></div>

    </div><div class="portlet-body">

        <?php
        $form = ActiveForm::begin([
                    'id' => 'ibform',
                    'options' => ['enctype' => 'multipart/form-data']
        ]);
        ?>
        <div class="note note-info" style="font-size: 10px; height:50px">
            An OTP has been sent to you on your E-mail Address <b><i> <?php echo $user->email ?></i></b>. Please enter OTP to Continue.
        </div>
        <div class="form-group form-md-line-input form-md-floating-label" style="font-size: 12px;">
            <input type="numnber" class="form-control" name="Enterotpvalue" id="Enterotpvalue">
            <label for="form_control_1">Please Enter OTP..</label>
            <!--<span class="help-block">otp goes here...</span>-->
        </div>
<?php $form = ActiveForm::end([
        ]);
?>

        <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkkl').style.display = 'none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjkl').style.display = 'none';checkotpaction('<?php echo $user->id ?>', '<?php echo $vrroomid ?>')"><div class="btn btn-info">  <i class="fa fa-check"> Submit </i></div>
        </a> <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkkl').style.display = 'none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjkl').style.display = 'none';resentotpaction('<?php echo $user->id ?>')"><div class="btn btn-info">  <i class="fa fa-spinner"> Resend OTP </i></div>
        </a><a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffmjkkl').style.display = 'none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffmjkl').style.display = 'none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">
            <div class="btn btn-danger"><i class="glyphicon glyphicon-remove">Cancel</i></div></a>

    </div></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div></div>
<div id="csolo1uu"></div>

<script>


    function checkotpaction(str, vtr) {
        var mestamj1 = $('#mestamj1');

        mestamj1.html('<div id="rhamshapvveekmuzqtsimaccff" class="rhamshapvveekmuzqtsblevbbff" ><div align="center" style="position:relative; top:300px;"> <img src="<?php echo Yii::$app->request->baseUrl ?>/img/Preloader_1.gif" /></div></div>');

        var enterotpvalue = $('#Enterotpvalue').val();




        $.ajax({

            type: "GET",

            url: "<?php echo Yii::$app->urlManager->createUrl(["common/checkotpaction"]) ?>?enterotpvalue=" + enterotpvalue + "&id=" + str + "&vtr=" + vtr,

            success: function (msg) {
                //alert(msg);
                //location.reload();
                if (msg == "123") {
                    toastr.error('Invalid OTP', 'error');
                } else {
                    toastr.success('Successful', 'success');
                }
                $('#csolo1uu').html(msg);
                mestamj1.html('');
            }

        });



    }

</script>