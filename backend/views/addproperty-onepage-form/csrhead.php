<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\base\view;
use kartik\datetime\DateTimePicker;



/* @var $this yii\web\View */
/* @var $searchModel backend\models\AddpropertyOnepageForm\AddpropertyOnepageFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Addproperty Onepage Forms';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
 <?php //echo $this->render('import', ['model' => $blog]); ?>

 <style>
 .span_rad{
	    position: relative;
    bottom: 8px;
    margin: 0 10px;
}
.span_rad input{
	       margin: 0 6px;
    position: relative;
    top: 2px;
}
.btn_n{
	color:#ffffff;
	background:#10101d !important;
	border-color:#10101d;
}
.span_rad input {
    margin: 0 6px;
    position: relative;
    top: 2px;
}
 </style>
<div class="addproperty-onepage-form-index">
    <div id="ajaxCrudDatatable">
   
   
    
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_csrheadcolumns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Addproperty Onepage Forms','class'=>'btn btn-default']).
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                    '{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => true,          
            'panel' => [
                'type' => 'primary', 
                'heading' => '<i class="glyphicon glyphicon-list"></i> Addproperty Onepage Forms listing',
                'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                ["bulk-delete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Are you sure?',
                                    'data-confirm-message'=>'Are you sure want to delete this item'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<div id="modal_follw" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Followup</h4>
      </div>
      <div class="modal-body">   

      <input id="scheduleid" type="hidden">     
        <?php
        echo '<label>Followup  Date/Time</label>';
        echo DateTimePicker::widget([
        'name' => 'datetime_10',
        'value' => '12/31/2010 05:10:20',
        'options' => ['placeholder' => 'Select operating time ...'],
        'convertFormat' => true,
        'pluginOptions' => [

        'autoclose'=>true,
        'format' => 'yyyy-MM-dd hh:i:00',    
        'todayHighlight' => true
        ]
        ]);
        ?>

      <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea id="folowup_comment" class="form-control" rows="5" id="comment"></textarea>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="onlinesave()" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal_wrong" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Wrong Lead</h4>
      </div>
      <div class="modal-body">        
      <input type="hidden" id="wrongid">
      <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="wrongcomment"></textarea>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="wrongsave()" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal_sitvst" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Site Visit</h4>
      </div>
      <div class="modal-body pt-4">

                    <form class="form-horizontal" id="registrationForm"> 
                    <div class="col-md-12">
						
							<div class="form-group row">	
								<input type="hidden" id="visittypeid">
								<input type="hidden" id="visittype">
								<div class="col-md-6"><label class="btn btn-primary btn_n"><i class="fa fa-handshake-o" style="font-size:38px"></i><span class="span_rad"><input type="radio" id="pending" name="gender" value="pending" autocomplete="off">Pending</span></label></div>
								
								<div class="col-md-6"><label class="btn btn-primary btn_n">
								<i class="fa fa-camera-retro" style="font-size:38px"></i><span class="span_rad"><input type="radio" name="gender" value="done"  id="done"  autocomplete="off"> Done</span>
								 </label></div>
							</div>
						
					</div>
		

                    </form>
                </div>
      <div class="modal-footer">
        <button type="button" onclick="addvisittype()" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal_remark" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Remarks</h4>
      </div>
      <div class="modal-body">   

      <input type="hidden" id="remarkid">
      
       
      <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="remarks_comment"></textarea>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="saveremarks()" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&v=3.exp&libraries=geometry,drawing,places"></script>


<script>


function assigncsr(id){


    var crmid = id;

     $.ajax({
               type: "POST",
               url: 'reassigncsr',
               data: {crmid:crmid},
               //dataType: 'json',
               success: function (data) {  
                                                             
                 if(data == '1'){
                   toastr.success('Successfully sent', 'success'); 
                 }else{
                   toastr.error('Some Internal Error', 'error'); 
                 }
                 
                 $.pjax({container: '#crud-datatable-pjax'}) 
               }
   });



}
    
    function viewdocs(date,id,comment) {

      //  alert(date);alert(id);
        $('#w3').val(date);
        $('#scheduleid').val(id);
        $('#folowup_comment').val(comment);
        $("#modal_follw").modal('show');
}


function onlinesave() {

// alert( $( "input[name$='datetime_10']" ).val());
  var newdates = $( "input[name$='datetime_10']" ).val();
  var newsiteid = $('#scheduleid').val();
  var newsitecomment= $('#folowup_comment').val();


  $.ajax({
      type: "POST",
      url: 'savescheduledtime',
      data: {newdates: newdates, newsiteid: newsiteid,newsitecomment:newsitecomment},
      success: function (data) {


          if (data == '1') {
              toastr.success('Location Successfully Saved', 'success');
              $.pjax({container: '#crud-datatable-pjax'});
              $('#modal_follw').modal('hide');
              
          }
          else {
              toastr.error('Internal Error', 'error');
          }

      },
  });



}



 function addvisittype(){

var radioValue=     $("input[name='gender']:checked").val();
var visittypeid = $('#visittypeid').val();

     if(radioValue){
        
       $.ajax({
               type: "POST",
               url: 'setvisittype',
               data: {visittypeid:visittypeid,radioValue: radioValue},
               //dataType: 'json',
               success: function (data) {  
                                                             
                 if(data == '1'){
                   toastr.success('Successfully saved visit type', 'success'); 
                 }else{
                   toastr.error('Some Internal Error', 'error'); 
                 }
                 $('#modal_sitvst').modal('hide');
                 $.pjax({container: '#crud-datatable-pjax'}) 
               }
   });
     }
}

    
function wrong_lead(visitid) {
 
        $("#modal_wrong").modal('show');
        $('#wrongid').val(visitid);
}

function wrongsave(){

  var wrongid = $('#wrongid').val();
  var wrongcomment  =  $('#wrongcomment').val();
           $.ajax({
						                        type: "POST",
                                                url: 'wrongsave',
                                                data: {wrongid: wrongid,wrongcomment:wrongcomment},
                                                //dataType: 'json',
                                                success: function (data) {  

                                           if(data == '1'){
                                              toastr.success('Successfully saved', 'success'); 
                                            }else{
                                              toastr.error('Some Internal Error', 'error'); 
                                            }
                                            $('#modal_wrong').modal('hide');
                                                }
                                    });

}
        


   
function site_visit(visitid,visittype) {
        $("#modal_sitvst").modal('show');
        $('#visittypeid').val(visitid);
        $('#visittype').val(visittype);
                                    $.ajax({
						                        type: "POST",
                                                url: 'getvisittype',
                                                data: {visitid: visitid},
                                                //dataType: 'json',
                                                success: function (data) {  
                                                  
                                                  if(data == ''){
                                                   
                                                    $("#"+pending).prop("checked", true);
                                                  }else{
                                                  $("#"+data).prop("checked", true);
                                                  }
                                                }
                                    });
}



   
function addremarks(visitid) {
         
        $('#remarks_comment').val('');
        $("#modal_remark").modal('show');

        $('#remarkid').val(visitid);

                     $.ajax({
                           type: "POST",
                                       url: 'getremarks',
                                       data: {visitid: visitid},
                                       //dataType: 'json',
                                       success: function (data) {  
                                         
                                        if(data !=''){
                                                    $('#remarks_comment').val(data);
                                                  }
                                       }
                           });
}



     function saveremarks(){

 var visittypeid  =  $('#remarkid').val();
 var remarks_comment  =  $('#remarks_comment').val();


        
       $.ajax({
               type: "POST",
               url: 'setremarks',
               data: {visittypeid:visittypeid,remarks_comment: remarks_comment},
               //dataType: 'json',
               success: function (data) {  
                                                             
                 if(data == '1'){
                   toastr.success('Successfully saved Remarks', 'success'); 
                 }else{
                   toastr.error('Some Internal Error', 'error'); 
                 }
                 $('#modal_remark').modal('hide');
                 $.pjax({container: '#crud-datatable-pjax'}) 
               }
   });
     
}




   
</script>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>
