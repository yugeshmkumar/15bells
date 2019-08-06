<?php

use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$propid = $_GET['id'];

?>
<style>

    .navbar-me{
        background:#221d36 !important;
    }
    .alert-success {
    color: #c7984f;
    background-color: #ffffff;
    border-color: #d6e9c6;
    font-size:28px;
    }
    .more_images{
        padding:30px 0;
    }
	</style>
<div class="container-fluid property_flow" style="margin-top:100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 no_pad">
				<h1 class="trans_head_b">Post a Property for Sale. </h1>
				<p class="brand_txt">Continue with listing your property at 15 Bells, we’ll get you verified buyers to sell your commercial property</p>
			</div><div class="col-md-6"></div>
		</div>
		<div class="row">
			<div class="col-md-12 no_pad">
					<ul class="add_property nav nav-pills hidden-xs hidden-sm">
						<li class="active property_steps no_pad"><a data-toggle="pill" href="#" class="categ_selec">Type of Property</a></li>
						<li class="property_steps active no_pad"><a data-toggle="pill" href="#" class="categ_selec">Property Location</a></li>
						<li class="property_steps active no_pad"><a data-toggle="pill" href="#" class="categ_selec">Property Availability</a></li>
						<li class="property_steps active no_pad"><a data-toggle="pill" href="#" class="categ_selec">Property Details</a></li>
					</ul>


                    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable text-center">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4 style="margin:20px 0;"><i class="icon fa fa-check"></i>Saved!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
         <div class="more_images">Want to Upload More Documents ?
         <a href="javscript:void(0)" aria-hidden="true" data-dismiss="alert" class="save_buttn active_butn yes_upload" >Yes</a>
         <?= Html::a('No', ['views', 'id' => base64_encode($propid)], ['class' => 'btn btn-primary save_buttn active_butn no_margin']) ?>

         </div>
    </div>
<?php endif; ?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<div class="row additional_property">
							<h1 class="more_detail">You know property with more images/video receive good reach. Upload property images or video now to get better results</h1>
							<p class="brand_txt">You are just 2 steps aways to get best reach of your property</p>
						<div class="col-md-9 no_pad">
							

                            <div class="col-md-12 possession_time">
								<h3 class="flow_heading avail_ability">Add property description ( Optional )</h3>
								
								<div class="col-md-6 date_select">


                                <div style="display:none;">
                                <input type="checkbox"  name="supportchkir[]" checked id="supportchkir"  value="1">
                                </div>
                                <input type="text" name="documentDescription1" id="documentDescription1" placeholder="Enter File Name.." class="form-control input_desgn"  required />

                                
                                
                                </div>
							</div>

        <div class="col-md-12">
		<h3 class="flow_heading avail_ability">Upload documents <span style="font-size:18px;font-weight:500;text-transform:uppercase;">(In Pdf, Png, Jpg, Docs Only)</span></h3>

       

       <?php
echo FileInput::widget([
    'name' => 'documentfiles1',
    'id' => 'documentfiles1',
    'options' => ['multiple' => false, 'accept' => 'pdf/*','class'=>'documentsfiles'],
    'pluginOptions' => [
        'previewFileType' => false,
        'showUpload' => true,
        'maxFileSize'=>4800
    ]   
]);
?>
        </div>

                        <!-- <a href="#" title="" class="add-author" onclick="myfunction(1)"><button class="btn icon btn-info"><i class="fa fa-plus"></i></button> </a> -->


   <div class="col-md-12">
   <?php 

echo Html::submitButton($model->isNewRecord ? 'Save & Upload Documents' : 'Update', [
    'class'=>$model->isNewRecord ? 'btn btn-success save_buttn active_butn' : 'btn btn-primary save_buttn active_butn']
);
    ?>
	</div>
							
					</div>
				</div>

				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



 <script>
   
   $(document).ready(function () {
   
   
   document.getElementById('pro-image').addEventListener('change', readImage, false);
   
   $( ".preview-images-zone" ).sortable();
   
   $(document).on('click', '.image-cancel', function() {
       let no = $(this).data('no');
       $(".preview-image.preview-show-"+no).remove();
   });




var num = 4;
function readImage() {
   if (window.File && window.FileList && window.FileReader) {
       var files = event.target.files; //FileList object
       var output = $(".preview-images-zone");

       for (let i = 0; i < files.length; i++) {
           var file = files[i];
           if (!file.type.match('image')) continue;
           
           var picReader = new FileReader();
           
           picReader.addEventListener('load', function (event) {
               var picFile = event.target;
               var html =  '<div class="preview-image preview-show-' + num + '">' +
                           '<div class="image-cancel" data-no="' + num + '">x</div>' +
                           '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                           '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                           '</div>';

               output.append(html);
               num = num + 1;
           });

           picReader.readAsDataURL(file);
       }
       $("#pro-image").val('');
   } else {
       console.log('Browser not support');
   }
}

});

</script>
  
<script>
  $(document).ready(function(){
  
   //$(".transp_contnt").hide();
   
   $(".trans_clck").click(function(){
   //alert();
       $(".trust_contnt").hide();
       
   });
       // $(".transp_contnt").animate({bottom: '250px'});
   
   $(".buy").click(function(){
        $(".buy").addClass("active");
         $(".sell").removeClass("active");
   });
   $(".sell").click(function(){
        $(".sell").addClass("active");
         $(".buy").removeClass("active");
   });
   
   $('#myCarousel').carousel({
       interval: 10000
   })
   $('.fdi-Carousel .item').each(function () {
       var next = $(this).next();
       if (!next.length) {
           next = $(this).siblings(':first');
       }
       next.children(':first-child').clone().appendTo($(this));

       if (next.next().length > 0) {
           next.next().children(':first-child').clone().appendTo($(this));
       }
       else {
           $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
       }
   });
   
 });

</script>
 <script>

 $(window).scroll(function() {
   if($(this).scrollTop()>5) {
       $( ".navbar-me" ).addClass("fixed-me");
   } else {
       $( ".navbar-me" ).removeClass("fixed-me");
   }
});
/* Set the width of the side navigation to 250px */
function openNav() {
 document.getElementById("mySidenav").style.width = "100%";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
 document.getElementById("mySidenav").style.width = "0";
}
 </script>