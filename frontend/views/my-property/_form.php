<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MyProperty */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #map_canvas {
        height: 400px;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;

    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 345px;
    }
    .short_list{font-size: 15px;
                position: relative;
                bottom: 3px;
                left: 5px;
    }
    .no_serch{
        margin:0px !important;
    }
    .commrcl_tb{

        padding:0 !important;
    }
    .container{
        width:100%;
    }
    .no_pad{
        padding:0px !important;
    }
    html, body, #map-canvas {
        height: 250px;
        margin: 0px;
        padding: 0px;
    }

    #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
    }
    .form-md-radios {
        padding-top: 87px;
        padding-left: 20px;
    }

    .mapi{
        margin-right: -20px !important;
    }
</style>

<div class="row">
    <div class="col-md-6">
        <div class="form-group form-md-radios form-md-floating-label">
            <label>I am a</label>
            <div class="md-radio-inline">
                <div class="md-radio">
                    <input type="radio" id="radio7" name="radio2" value="radio7" class="md-radiobtn" checked>
                    <label for="radio7">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Seller</label>
                </div>

                <div class="md-radio">
                    <input type="radio" id="radio6" name="radio2" value="radio6" class="md-radiobtn" >
                    <label for="radio6">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Buyer</label>
                </div>

                <div class="md-radio">
                    <input type="radio" id="radio8" name="radio2"  value="radio8" class="md-radiobtn">
                    <label for="radio8">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Lessor </label>
                </div>
                <div class="md-radio">
                    <input type="radio" id="radio9" name="radio2" value="radio9" class="md-radiobtn">
                    <label for="radio9">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Lessee </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="margin-left: -20px !important;"> 
        <div id="map-canvas"></div>
    </div>
</div>
<br/>

<div class="my-property-form" id="add_prop">

    <h3>Add Property</h3><br/>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">    

        <div class="col-md-4">
            <?= $form->field($model, 'site_name')->textInput(['maxlength' => true]) ?>
        </div>   

        <div class="col-md-4">
            <?= $form->field($model, 'site_address')->textInput(['maxlength' => true, 'onchange' => 'getmap(this.value)']) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'super_area')->textInput(['maxlength' => true]) ?>
        </div> 
    </div> 
    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'carpet_area')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'auto_cad_drawing')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => '']) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'possession')->dropDownList([ 'bareshell' => 'Bareshell', 'semi_furnished' => 'Semi furnished', 'furnished' => 'Furnished',], ['prompt' => '']) ?>
        </div> 
    </div>
    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'commercial_approved')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => '']) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'floors')->textInput() ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'agreement')->dropDownList([ 'notorised' => 'Notorised', 'registered' => 'Registered',], ['prompt' => '']) ?>
        </div> 
    </div>
    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'tenure')->textInput() ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'rent')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'maintenance')->textInput(['maxlength' => true]) ?>
        </div> 
    </div>
    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'last_date_rent')->textInput() ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'fit_out_period')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'electricity_load')->textInput(['maxlength' => true]) ?>
        </div> 
    </div>
    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'clarityOn_meter_submeter')->dropDownList([ 'meter' => 'Meter', 'submeter' => 'Submeter',], ['prompt' => '']) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'power_backup')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => '']) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'property_tax')->textInput(['maxlength' => true]) ?>
        </div> 
    </div>
    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'spaceForGenset_ac_watertank')->dropDownList([ 'chargebale' => 'Chargebale', 'not_chargebale' => 'Not chargebale',], ['prompt' => '']) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'car_parking')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => '']) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'motor_waterSupply')->textInput(['maxlength' => true]) ?>
        </div> 
    </div>
    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'stampDuty_registration')->textInput() ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'working_hour_restrict')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], ['prompt' => '']) ?>
        </div> 

    </div>

    <input type="hidden" value="" id="hidinput" name="hidinput">


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&sensor=false&libraries=geometry,drawing,places"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

    $(document).ready(function () {

        

        $("#hidinput").val('seller');
        $('input[type=radio][name=radio2]').change(function () {
            if (this.value == 'radio6') {

                var buy1 = 'buyer';
                window.location.replace("/frontend/web/index.php/myexpectation/create?type=" + encodeURIComponent(buy1));
            }
            if (this.value == 'radio9') {

                var les = 'lessee';
                window.location.replace("/frontend/web/index.php/myexpectation/create?type=" + encodeURIComponent(les));

            }
            if (this.value == 'radio7') {

                $("#hidinput").val('seller');
            }
            if (this.value == 'radio8') {
                $("#hidinput").val('lessor');
            }

        });
    });


    

  var geocoder;
  var map;
    function init() {

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(28.4595, 77.0266);
        var mapOptions = {
            zoom: 8,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }
    
    function getmap(val) {
        var marker='';
        geocoder.geocode({'address': val}, function (results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    
    google.maps.event.addDomListener(window, 'load', init);

</script>    
