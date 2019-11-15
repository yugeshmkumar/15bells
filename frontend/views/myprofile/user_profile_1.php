<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Myprofile */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
if(isset($_POST['savedata'])){
	$arrallvalues = $_POST['emailaddress'];
	
}

?>
<div class="myprofile-form">

    <?php $form = ActiveForm::begin(); ?>


<div class="input_fields_wrap">
    <button class="add_field_button"><i class="fa fa-plus"></i></button>
	
    <div style="width:864px;"><input type="text" name="emailaddress[]" id="emailaddress[]"></div>
</div>
<div class="input_fields_wrap1">
    <button class="add_field_button1"><i class="fa fa-plus"></i></button>
	
    <div style="width:864px;"><input type="text" name="phonenumber[]" id="phonenumber[]"></div>
</div>
<div class="input_fields_wrap2">
    <button class="add_field_button2"><i class="fa fa-plus"></i></button>
	
    <div style="width:864px;"><input type="text" name="addresses[]" id="addresses[]"></div>
</div>

                                                
                                                                                            
                                                                                             <script>
	  function focaldiv(){
	  var foc=$('#minor').val();
	  if(foc=='Yes'){
	  document.getElementById('divo1').style.display='block';
	  document.getElementById('divo2').style.display='block';
      
	 document.getElementById('minorrelation').style.display='block';
	  document.getElementById('guardianname').style.display='block';
       
	   
	  }
	  else {
	  document.getElementById('divo1').style.display='none';
	  document.getElementById('divo2').style.display='none';
       
	 document.getElementById('minorrelation').style.display='none';
	  document.getElementById('guardianname').style.display='none';
         
	 
	  }
          
        
          
          
	  }
	  
	  </script>
          
          
          
				 
				
         
	<font style="color:#000000;"><strong> 
               <span class="label"><font color="#000000"><strong><i class="fa fa-pencil-square-o"></i> MINOR</strong></font>
               </span></strong>
	
	 
	
	   
        <div id="divo1" style="display:none;"> 
            
         <font style="color:#000000;"><strong> 
               <span class="label"><font color="#000000"><strong><i class="fa fa-pencil-square-o"></i> A) Relationship with Minor</strong></font>
               </span></strong>
       
            <input type="text" name="minorrelation" id="minorrelation"    style=" display:none;"  class="form-control"> 
      </div> 
     
	  
	  
	  
	  
        <div id="divo2" style="display:none;"> 
		
		
         <font style="color:#000000;"><strong> 
               <span class="label"><font color="#000000"><strong><i class="fa fa-pencil-square-o"></i> B) Guardian Name</strong></font>
               </span></strong>
            <input type="text" name="guardianname" id="guardianname"    style=" display:none;"  class="form-control"> 
	
      </div> 
	  
	  
	  
	  
	  
       
	<?php echo Html::submitButton('<i class="fa fa-plus-square"></i> Submit',['class'=>'btn btn-default','name'=>'savedata']);?>

   <?php ActiveForm::end(); ?>

</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" id="emailaddress[]" name="emailaddress[]" /><a href="#" class="remove_field"><i class="fa fa-minus"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script>

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap1"); //Fields wrapper
    var add_button      = $(".add_field_button1"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" id="phonenumber[]" name="phonenumber[]" /><a href="#" class="remove_field1"><i class="fa fa-minus"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field1", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script>

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button2"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" id="addresses[]" name="addresses[]" /><a href="#" class="remove_field2"><i class="fa fa-minus"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field2", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>