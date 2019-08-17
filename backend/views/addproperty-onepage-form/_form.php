<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\PropertyType;

/* @var $this yii\web\View */
/* @var $model backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm */
/* @var $form yii\widgets\ActiveForm */
?>


<style>
.modal-dialog {
    width:80%;
}
.form-control{
    border-radius:5px !important;
    font-family: inherit;
    font-size: 13px;
}
.modal-content{
    background:#f1f1f1;
}
.modal-header{
    border-bottom:2px solid #ffffff !important;
}
label{
    font-family: inherit;
    font-size: 12px;
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
        width: 400px;
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
      .pac-container { z-index: 100000; }
      .count {
        background-color:#e4d5d5b0;
      }
</style>
<div class="addproperty-onepage-form-form">
        <div class="row">
        <div class="pac-card" id="pac-card">
               
               
                </div>
                <div id="map"></div>
                
    
        </div>
        <div class="row">
                <?php $form = ActiveForm::begin(); ?>
            
            <div class="col-md-3">
                    <?= $form->field($model, 'property_for')->dropDownList(['rent' => 'Rent', 'sale' => 'Sale', 'both' => 'Both'], ['class' => 'form-control count'])->label('Select property for') ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'Owner_name')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'primary_contact_no')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'building_name')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                
                <?= $form->field($model, 'completion_in_percentage')->hiddenInput()->label(false) ?>
                
                <div class="col-md-3">
                     <?= $form->field($model, 'locality')->textInput(['class' => 'form-control count','maxlength' => true])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'sector_name')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'city')->textInput(['class' => 'form-control count','maxlength' => true]) ?>

                </div>
                
                
               
                <div class="col-md-3">
                     <?= $form->field($model, 'latitude')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'longitude')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                    <?=
                            $form->field($model, 'property_type_id')->dropDownList(ArrayHelper::map(PropertyType::find()->where(['undercategory' => "Commercial", 'isactive' => 1])->all(), 'id', 'typename'), [
                                'prompt' => 'Select Property  type',
                               
                                'class' => 'form-control count'
                                  
                            ])->label('Select Property Type');
                            ?>                  
                
                </div>
                <div class="col-md-3">
                        <?= $form->field($model, 'unit_number')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'unit_block')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'super_area')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'super_unit')->dropDownList(['sq_feets' => 'Sq.Ft', 'sq_yards' => 'Sq.Yards', 'sq_meters' => 'Sq.Meter',], ['class' => 'form-control count'])->label('Select Unit') ?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'property_on_floor')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'efficiency')->textInput(['class' => 'form-control count'])?>

                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'carpet_area')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                     <?= $form->field($model, 'address')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                
                <div class="col-md-3">
                <?= $form->field($model, 'type_of_space')->dropDownList(['furnished' => 'Furnished', 'semi_furnished' => 'Semi furnished', 'bareshell' => 'Bareshell',], ['prompt' => 'Select Furnishing', 'class' => 'form-control count'])->label('Select furnishing Status') ?>
                </div>
                
                <div class="col-md-3" id="askingleaserate">

                  <?= $form->field($model, 'asking_lease_rate')->textInput(['class' => 'form-control count'])?>
                  </div>

                  <div class="col-md-3" id="totalleaserate">

                  <?= $form->field($model, 'total_lease_rate')->textInput(['class' => 'form-control count']) ?>

                  </div>
                  <div class="col-md-3" id="ratenegotiable">
                  <?= $form->field($model, 'rate_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])->label('Rate Negotiable') ?>
                  </div>
                  <div class="col-md-3">
                  <?= $form->field($model, 'maintenance_charge')->textInput(['class' => 'form-control count'])?>
                  </div>
                  <div class="col-md-3">

                    <?= $form->field($model, 'total_no_of_floors')->textInput(['class' => 'form-control count'])?>
                    </div>
                    <div class="col-md-3">
                <?= $form->field($model, 'floor_plate_area')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'passenger_lift')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])?>

                </div>
                <div class="col-md-3">


                <?= $form->field($model, 'maintenance_agency')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])?>

                </div>
                <div class="col-md-3">

               <?= $form->field($model, 'building_security')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])?>

                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'security_deposit')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'security_negotiable')->textInput(['class' => 'form-control'])?>
                </div>
               
                
             
               
               
               
               
               
                <div class="col-md-3">

                <?= $form->field($model, 'owner_address')->textInput(['maxlength' => true]) ?>
                </div>
                
               
                <!--<div class="col-md-3">
                <?//= $form->field($model, 'service_lift')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])?>

                </div>-->
                
                <div class="col-md-3">
                <?= $form->field($model, 'backup_power')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])?>

                </div>
                
                
               
                
                
                <div class="col-md-3">

                <?= $form->field($model, 'covered_parking')->textInput(['class' => 'form-control'])?>
                </div>
                
                
               <!-- <div class="col-md-3">
                <?//= $form->field($model, 'lock_in_period')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">
                <?//= $form->field($model, 'lock_in_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])?>

                </div>-->

               <!--  <div class="col-md-3">
                <?//= $form->field($model, 'max_period_lease')->dropDownList([ '3' => '3', '6' => '6','9'=>'9'], [ 'class' => 'one_inpt form-control count'])?>
                </div>

                <div class="col-md-3">
                <?//= $form->field($model, 'max_period_lease_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control count'])?>
                </div>
               
                <div class="col-md-3">
                <?//= $form->field($model, 'open_rentfree_period')->textInput(['class' => 'form-control'])?>
                </div>-->
                
                <div class="col-md-3" id="askingpropertyprice" style="display:none;">
                <?= $form->field($model, 'Asking_property_price')->textInput(['class' => 'form-control count'])?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'price_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No',], [ 'class' => 'one_inpt form-control'])->label('Rate Negotiable') ?>

                </div>

                 <div class="col-md-3">
                <?= $form->field($model, 'ownership_title')->dropDownList([ 'property_with_saledeed' => 'Property with saledeed', 'property_power_attorney' => 'Property power attorney',], [ 'prompt'=>'Select Ownership Title','class' => 'one_inpt form-control'])->label('Ownership Title') ?>

                </div>
                <div class="col-md-3" style="display:none">
                <?= $form->field($model, 'property_with_saledeed')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3" style="display:none">
                <?= $form->field($model, 'property_power_attorney')->textInput(['class' => 'form-control'])?>
                </div>
                <div class="col-md-3">

                <?= $form->field($model, 'secondary_contact_no')->textInput(['class' => 'form-control'])?>
                </div>

                <div class="col-md-3">
                <?= $form->field($model, 'email_id')->textInput(['class' => 'form-control count','maxlength' => true]) ?>
                </div>
                <div class="col-md-3">
                <?= $form->field($model, 'ID_proof')->dropDownList([ 'pan_card' => 'Pan card', 'adhar_card' => 'Adhar card','property_tax_id'=>'Property tax id'], ['prompt'=>'Select ID Proof' ,'class' => 'one_inpt form-control'])?>

                </div>
                <div class="col-md-3" id="pancard" style="display:none">
                <?= $form->field($model, 'pan_card')->textInput(['maxlength' => true])->label('ID Number') ?>
                </div>
                <div class="col-md-3" id="adharcard" style="display:none">
                <?= $form->field($model, 'adhar_card')->textInput(['maxlength' => true])->label('ID Number') ?>
                </div>
                <div class="col-md-3" id="propertytaxid" style="display:none">
                <?= $form->field($model, 'property_tax_id')->textInput(['maxlength' => true])->label('ID Number') ?>
                </div>

                 <div class="col-md-3">
                <?= $form->field($model, 'town_name')->hiddenInput(['class' => 'form-control','maxlength' => true])->label(false) ?>
                </div>
               
            
            
                <?php if (!Yii::$app->request->isAjax){ ?>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Approve', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                <?php } ?>

                <?php ActiveForm::end(); ?>
                
</div>




<?php
$script = <<< JS


initMap();
var propertyfor = $('#addpropertyonepageform-property_for').val();

if(propertyfor == 'sale'){

$('#askingleaserate').hide();
$('#totalleaserate').hide();
$('#ratenegotiable').hide();

$('#askingpropertyprice').show();


}else if(propertyfor == 'rent'){
$('#askingleaserate').show();
$('#totalleaserate').show();
$('#ratenegotiable').show();

$('#askingpropertyprice').hide();
}else{
$('#askingleaserate').show();
$('#totalleaserate').show();
$('#ratenegotiable').show();

$('#askingpropertyprice').show();
}



var super_area =  $('#addpropertyonepageform-super_area').val();
var carpet_area = $('#addpropertyonepageform-carpet_area').val();

if(super_area != '' && carpet_area != ''){
  
var efficiency  =  carpet_area/super_area;
var efficiencypercent = Math.round(efficiency*100);  
$('#addpropertyonepageform-efficiency').val(efficiencypercent);
}



var saledeed = $('#addpropertyonepageform-property_with_saledeed').val();
var powerattorney = $('#addpropertyonepageform-property_power_attorney').val();

if(saledeed == 'yes'){

  $('#addpropertyonepageform-ownership_title').val('property_with_saledeed');
}else if(powerattorney == 'yes'){

  $('#addpropertyonepageform-ownership_title').val('property_power_attorney');

}else{

}




JS;
$this->registerJs($script);
?> 


<script>





$('#addpropertyonepageform-unit_number,#addpropertyonepageform-unit_block').blur(function(){

  var address =  $('#addpropertyonepageform-address').val();
  var unitnumber = $(this).val();

  $('#addpropertyonepageform-address').val(address +' '+unitnumber);

});


$('#addpropertyonepageform-property_on_floor').blur(function(){

var address =  $('#addpropertyonepageform-address').val();
var floors = $(this).val();

$('#addpropertyonepageform-address').val(address +' '+floors+' floor');

});


$('#addpropertyonepageform-efficiency').blur(function(){

var super_area =  $('#addpropertyonepageform-super_area').val();
var efficiency = $(this).val();

if(super_area != '' && efficiency != ''){

var carpet_area  =  Math.round(efficiency/100 * super_area);
$('#addpropertyonepageform-carpet_area').val(carpet_area);
}

});


$('#addpropertyonepageform-carpet_area').blur(function(){

var super_area =  $('#addpropertyonepageform-super_area').val();
var carpet_area = $(this).val();

if(super_area != '' && carpet_area != ''){
  
var efficiency  =  carpet_area/super_area;
var efficiencypercent = Math.round(efficiency*100);  
$('#addpropertyonepageform-efficiency').val(efficiencypercent);
}

});

$('#addpropertyonepageform-asking_lease_rate').blur(function(){

var super_area =  $('#addpropertyonepageform-super_area').val();
var asking_lease_rate = $(this).val();

if(super_area != '' && asking_lease_rate != ''){
  
var totalarea  =  super_area * asking_lease_rate;
var efficiencypercent = Math.round(totalarea);  
$('#addpropertyonepageform-total_lease_rate').val(efficiencypercent);
}

});


$('#addpropertyonepageform-total_lease_rate').blur(function(){

var super_area =  $('#addpropertyonepageform-super_area').val();
var total_lease_rate = $(this).val();

if(super_area != '' && total_lease_rate != ''){
  
var asking_lease_rate  =  total_lease_rate/super_area;
var efficiencypercent = Math.round(asking_lease_rate);  
$('#addpropertyonepageform-asking_lease_rate').val(efficiencypercent);
}

});

$('#addpropertyonepageform-property_for').change(function(){

       var propertyfor =  $(this).val();
       if(propertyfor == 'sale'){

         $('#askingleaserate').hide();
         $('#totalleaserate').hide();
         $('#ratenegotiable').hide();

         $('#askingpropertyprice').show();
        

       }else if(propertyfor == 'rent'){
        $('#askingleaserate').show();
         $('#totalleaserate').show();
         $('#ratenegotiable').show();

         $('#askingpropertyprice').hide();
       }else{
        $('#askingleaserate').show();
         $('#totalleaserate').show();
         $('#ratenegotiable').show();

         $('#askingpropertyprice').show();
       }
});


$('#addpropertyonepageform-ownership_title').change(function(){

var ownership_title =  $(this).val();


if(ownership_title == 'property_with_saledeed'){

  $('#addpropertyonepageform-property_with_saledeed').val('yes');
  $('#addpropertyonepageform-property_power_attorney').val('');

}else if(ownership_title == 'property_power_attorney'){

$('#addpropertyonepageform-property_power_attorney').val('yes');
$('#addpropertyonepageform-property_with_saledeed').val('');
}else{

}

//alert($('#addpropertyonepageform-property_with_saledeed').val());

});


$('#addpropertyonepageform-id_proof').change(function(){

var id_proof =  $(this).val();

if(id_proof=='pan_card'){

  $('#pancard').show();
  $('#adharcard').hide();
  $('#propertytaxid').hide();

}else if(id_proof=='adhar_card'){

   $('#pancard').hide();
  $('#adharcard').show();
  $('#propertytaxid').hide();

}else{
  $('#pancard').hide();
  $('#adharcard').hide();
  $('#propertytaxid').show();
}

});





      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var options = {
           // types: ['(cities)'],
            componentRestrictions: {country: "in"}
            };
          
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('addpropertyonepageform-locality');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input,options);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();

           var searchlat = place.geometry.location.lat();
          var searchlng = place.geometry.location.lng();

         $("#addpropertyonepageform-longitude").val(searchlng);
$("#addpropertyonepageform-latitude").val(searchlat);


          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }



          var arrAddress = place.address_components;
// console.log(places[0].address_components);

$.each(arrAddress, function (i, address_component) {
// console.log('address_component:'+i);

if (address_component.types[0] == "route"){
//console.log(i+": route:"+address_component.long_name);
itemRoute = address_component.long_name;
}

if (address_component.types[0] == "locality"){
// console.log("town:"+address_component.long_name); 
itemLocality = address_component.long_name; 

$('#addpropertyonepageform-city').val(itemLocality);
$('#addpropertyonepageform-town_name').val(itemLocality);
var addressed =  $('#addpropertyonepageform-address').val();
$('#addpropertyonepageform-address').val(addressed +' ' +itemLocality);



}
if (address_component.types[0] == "sublocality_level_1"){
// console.log("province:"+address_component.long_name);
itemSectorf = address_component.long_name;
$('#addpropertyonepageform-sector_name').val(itemSectorf);
var addressed =  $('#addpropertyonepageform-address').val();
$('#addpropertyonepageform-address').val(addressed +' ' +itemSectorf);



}



if (address_component.types[0] == "country"){ 
//console.log("country:"+address_component.long_name); 
itemCountry = address_component.long_name;
$('#country').val(itemCountry);
}

if (address_component.types[0] == "postal_code_prefix"){ 
// console.log("pc:"+address_component.long_name); 
itemPc = address_component.long_name;
}

if (address_component.types[0] == "street_number"){ 
// console.log("street_number:"+address_component.long_name); 
itemSnumber = address_component.long_name;
}
//return false; // break the loop 
});

         // infowindowContent.children['place-icon'].src = place.icon;
         // infowindowContent.children['place-name'].textContent = place.name;
         // infowindowContent.children['place-address'].textContent = address;
         // infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

       // setupClickListener('changetype-all', []);
       // setupClickListener('changetype-address', ['address']);
       // setupClickListener('changetype-establishment', ['establishment']);
        //setupClickListener('changetype-geocode', ['geocode']);

        // document.getElementById('use-strict-bounds')
        //     .addEventListener('click', function() {
        //       console.log('Checkbox clicked! New state=' + this.checked);
        //       autocomplete.setOptions({strictBounds: this.checked});
        //     });
      }


    </script>
   

<script>

$(document).ready(function(){


    $('input').on('change', function(){
        
        var cntreq = 0;
        var cntvals = 0;

        $('input').each(function(i, val) {
            if($(this).attr('class') == 'form-control count') {
                cntreq++;
                if($(this).val() != '') {
                    cntvals++;
                }
            }
        });

        var count = (cntvals/cntreq)*100;
        
        $('#addpropertyonepageform-completion_in_percentage').empty();
        $('#addpropertyonepageform-completion_in_percentage').val(Math.round(count));
    });



});

</script>
