<?php
/**
 * @var $this yii\web\View
 */
use frontend\assets\NewdashboardAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

NewdashboardAsset::register($this);
?>
<?php $this->beginContent('@frontend/views/layouts/base9.php'); ?>
   
<style>
.profile_fill{
	background:rgba(0, 0, 0, 0.3);
	opacity:1;
}
.modl_b{
	    padding: 30px 40px;
    text-align: center;
    font-size: 30px;
}
.edit_butn{
	width: 40%;
    margin: 20px auto;
}
</style>
<body class="fixed-nav sticky-footer body_bg" id="page-top">

<?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
                                                if($checkrole->item_name == "Company_user"){
                                                    $dashboard = Yii::$app->urlManager->createUrl(['site/couserdash']); 
                                                    $profilelink = yii::$app->urlManager->createUrl(['site/copostlogin']);                                                   
                                                }else{
                                                    
                                                   $dashboard = Yii::$app->urlManager->createUrl(['site/userdash']); 
                                                   $profilelink = yii::$app->urlManager->createUrl(['site/postlogin']);  
                                                }  ?>



  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark neela_bg fixed-top" id="mainNav">
    <a class="navbar-brand logo_nav" href="<?php echo $dashboard ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo1.png';  ?>" width="55" class=""></a>
    <button class="navbar-toggler navbar-toggler-right margin_toggl" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav sidenav-toggler">
        
      </ul>
      <ul class="navbar-nav navbar-sidenav dash_sidenav" id="exampleAccordion">
		<li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo $dashboard; ?>">
            <i class="fa fa-tachometer"></i>
            <span class="nav-link-text">Dashboard <b>( <?php  $userids = yii::$app->user->identity->id;
                echo 'UID'.$userids * 23 * 391;?> )</b></span>
          </a>
        </li>

     <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
         
            <i class="fa fa-fw fa-area-chart"></i>
            <span id="userrole" class="nav-link-text"><b>Search</b></span>
          
        </li>-->
        
      
        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">Search</span>
          </a>
        </li>
        
        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
        
        <li class="nav-item buyer" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-area-chart"></i>
            <span class="nav-link-text">Shortlist</span>
          </a>
        </li>
        
     <!-----Lessee menu---->
	  <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-area-chart"></i>
            <span class="nav-link-text">Search</span>
          </a>
        </li>
        
        <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
        <li class="nav-item lessee" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-area-chart"></i>
            <span class="nav-link-text">Shortlist</span>
          </a>
        </li>
        
       
    <!------lessee menu end----->
    <!-------Seller------------>
        <li class="nav-item seller" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-plus"></i>
            <span class="nav-link-text">Add Property</span>
          </a>
        </li>
    
        <li class="nav-item seller" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-street-view"></i>
            <span class="nav-link-text">View Property</span>
          </a>
        </li>
    
        <li class="nav-item seller" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-map-marker"></i>
            <span class="nav-link-text">Manage Property</span>
          </a>
        </li>
        <li class="nav-item seller" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
    <!---------Seller end--------------->
    <!---------lessor start--------------->
    
        <li class="nav-item lessor" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-plus"></i>
            <span class="nav-link-text">Add Property</span>
          </a>
        </li>
    
        <li class="nav-item lessor" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-street-view"></i>
            <span class="nav-link-text">View Property</span>
          </a>
        </li>
    
        <li class="nav-item lessor" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-map-marker"></i>
            <span class="nav-link-text">Manage Property</span>
          </a>
        </li>
        <li class="nav-item lessor" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-fw fa-clipboard"></i>
            <span class="nav-link-text">Expectation</span>
          </a>
        </li>
    <!----------Lessor end--------->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-headphones"></i>
            <span class="nav-link-text">Site Visit</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-file-text"></i>
            <span class="nav-link-text">Documents Upload</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link profile_modl" href="#">
            <i class="fa fa-bank"></i>
            <span class="nav-link-text">Bank details</span>
          </a>
        </li>
        
        
       </ul>
     
      <ul class="navbar-nav ml-auto nav_pd">
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu left_noti" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li> -->





         <li class="nav-item dropdown">
          <a onclick="updateNotify(0)" class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <span id="notif" style="display:none;"></span>
            </span>
          </a>
          <div class="dropdown-menu left_noti" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>

           <?php
            $userid = Yii::$app->user->identity->id;
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s');   
            $baseurl =  Yii::getAlias('@frontendUrl');

            //  Get notifications of profile done

            $sqlstr1 = "select count(*) as countr from notifications where item_id=$userid and item_name='Profile'";
            $data1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();

    if($data1[0]['countr'] == '0'){
            $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
            //echo '<pre>';print_r($getprofilestatus);die;
            if(!$getprofilestatus){
              Yii::$app->db->createCommand()->insert('notifications', [
                'item_name' => 'Profile',
                'item_id' => Yii::$app->user->identity->id,
                'link' => $profilelink,
                'description'=>'Please update your profile  details Lorem Ipsum Dimsums ejects urecka. ',
                'date' => $date,
            ])->execute();
           
          }
        }
           //  Get notifications of profile done End



           //  Get notifications of Documents done

           $sqlstr1 = "select count(*) as countr from notifications where item_id=$userid and item_name='KYC_Documents'";
           $data1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();

   if($data1[0]['countr'] == '0'){
           $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_upload");
           //echo '<pre>';print_r($getprofilestatus);die;
           if(!$getprofilestatus){
             Yii::$app->db->createCommand()->insert('notifications', [
               'item_name' => 'KYC_Documents',
               'item_id' => Yii::$app->user->identity->id,
               'link' => $baseurl.'/common/documents',
               'description'=>'Please upload your KYC documents Lorem Ipsum Dimsums ejects urecka.',
               'date' => $date,
           ])->execute();
          
         }
       }
          //  Get notifications of documents done End



           //  Get notifications of Bank details done

           $sqlstr1 = "select count(*) as countr from notifications where item_id=$userid and item_name='Bankdetails'";
           $data1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();

   if($data1[0]['countr'] == '0'){
           $getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_bank");
           //echo '<pre>';print_r($getprofilestatus);die;
           if(!$getprofilestatus){
             Yii::$app->db->createCommand()->insert('notifications', [
               'item_name' => 'Bankdetails',
               'item_id' => Yii::$app->user->identity->id,
               'link' => $baseurl.'/banknew/create',
               'description'=>'Please update your bank details Lorem Ipsum Dimsums ejects urecka.',
               'date' => $date,
           ])->execute();
          
         }
       }

        //  Get notifications of documents Bank details  End//

       ?>
         



          <div id="appendnotifications">

          </div>

           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>




        <li class="nav-item dropdown">
          <a class="nav-link  profile_modl dropdown-toggle mr-lg-2" id="" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="d-lg-none">Working as
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="">
            
            <a class="dropdown-item" id="drop_buyer" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Buyer</strong>
              </span>
             
            </a>
            
            <a class="dropdown-item" id="drop_seller" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Seller</strong>
              </span>
              
            </a>
            
            <a class="dropdown-item" id="drop_lessor" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Lessor</strong>
              </span>
              
            </a>
            <a class="dropdown-item" id="drop_lessee" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Lessee</strong>
              </span>
              
            </a>
            
          </div>
        </li>
        <!--<li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" id="userrole" href="">
            <i class="fa fa-fw fa-user"></i>Your role is </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  profile_modl" href="<?php echo Yii::$app->urlManager->createUrl(['/user/sign-in/logout']) ?>">
            <i class="fa fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="modal profile_fill" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
     

      <!-- Modal body -->
      <div class="modal-body modl_b">
        Please Fill Your Profile First
      </div>
		<button type="button" class="btn btn-danger edit_butn" data-dismiss="modal">Close</button>
      <!-- Modal footer -->
     

    </div>
  </div>
</div>
  <div class="content-wrapper body_bg">
<?php echo $content ?>
 	</div>
	<?php $this->endContent(); ?>
<script>
$(document).ready(function(){
	$('.profile_modl').click(function(){
		$("#myModal").modal('show');
	});
	$("#myModal").modal({
  backdrop: false
});
});
</script>
<script>
	$(document).ready(function(){

    function setuserloginas(){
            
      $.ajax({
                                                 type: "POST",
                                                 url: '/site/setuserloginas',
                                                 data: {},
                                                 success: function (data) {
                                               
                                                  $('#userrole').html('Your Role :'+  data);
                                                 if(data == 'buyer'){
                                                   //alert(data);


                                                     
                                                    $(".seller").hide();
                                                    $(".lessor").hide();
                                                    $(".lessee").hide();
                                                    $(".buyer").show(); 
                                                 }
                                                 if(data == 'seller'){
                                                     
                                                     $(".seller").show();
                                                     $(".lessor").hide();
                                                     $(".lessee").hide(); 
                                                     $(".buyer").hide(); 
                                                  }
                                                  if(data == 'lessor'){
                                                     
                                                     $(".seller").hide();
                                                     $(".lessor").show();
                                                     $(".lessee").hide(); 
                                                     $(".buyer").hide(); 
                                                  }
                                                  if(data == 'lessee'){
                                                     
                                                     $(".seller").hide();
                                                     $(".lessor").hide();
                                                     $(".lessee").show();
                                                     $(".buyer").hide();  
                                                  }

                                                 },
                                             });

    }
    setuserloginas();

		

		$("#drop_buyer").click(function(){
			$(".seller").hide();
		$(".lessor").hide();
		$(".lessee").hide();
		$(".buyer").show();

    var buyer = 'buyer';    
    getuserloginas(buyer);

		});
		$("#drop_lessee").click(function(){
			$(".seller").hide();
		$(".lessor").hide();
		$(".lessee").show();
		$(".buyer").hide();

    var lessee = 'lessee';   
    getuserloginas(lessee);
		});

		$("#drop_seller").click(function(){
			$(".seller").show();
		$(".lessor").hide();
		$(".lessee").hide();
		$(".buyer").hide();

    var seller = 'seller';   
    getuserloginas(seller);
		});

		$("#drop_lessor").click(function(){
			$(".seller").hide();
		$(".lessor").show();
		$(".lessee").hide();
		$(".buyer").hide();

    var lessor = 'lessor';   
    getuserloginas(lessor);
		});



    function getuserloginas(user) {
    
                                             
                                            
                                             $.ajax({
                                                 type: "POST",
                                                 url: '/site/getuserloginas',
                                                 data: {user: user},
                                                 success: function (data) {
                                               
                                                 
                                                 if(data == '1'){
                                                     
                                                  var datas = user.toLowerCase().replace(/\b[a-z]/g, function(letter) {
return letter.toUpperCase();
});
           $('#userrole').html('<i class="fa fa-user user_i"></i>Your Role : '+  datas);
                                                 toastr.success('Successfully Saved '+ user +' role ','success');    
                                                 }else{
                                                    toastr.error('Internal Error','error');    
                                                         }
                                                 },
                                             });
 
                                         }

   setInterval(function(){notification();}, 2000);

  });
  





                            function updateNotify(id) {
                                        var url      = window.location.href;   
                                        var pathname = window.location.pathname;

                                        //alert(url);alert(pathname);

                                        $(".dropdown-menu left_noti show").load(url);

                                        $.ajax({
                                        type: "POST",
                                        url: '/site/setnotifications',
                                        data: {notify: id},
                                        success: function (datas) {
                                          //alert(datas);
                                        $('#notif').html('');
                                        $('#appendnotifications').html('');
                                        $("#notif").css("display","none");
                                        var obj = $.parseJSON(datas);

                                          $.each(obj, function () {


                                        // var dates = date("h:i A", strtotime(this.date));
                                       var dates =  this.date;

                                          $('#appendnotifications').append(
                                            '<div class="dropdown-divider divider_cs"></div>'+
                                        '<a onclick="changecolour('+this.id+')" target="_blank" class="dropdown-item'+ ((this.viewed != '1') ? ' notif_drp' : ' notif_drpseen')+'" id="notiflink_'+this.id+'" href="' + this.link + '">'+
                                          '<span class="text-success">'+
                                            '<strong id="notifitemname">' + this.item_name + ' Update</strong>'+
                                          '</span>'+
                                          '<span class="small float-right text-muted" id="notifdate">'+ dates +'</span>'+
                                          '<div class="dropdown-message small" id="notifdescription">'+this.description+'</div>'+
                                        '</a>');


                                          });

                                        },
                                        });
                                        

                                }






                        function notification()
                        {

                                $.ajax({
                                type: "POST",
                                url: "/site/getnotifications",	                
                                cache: false,
                                success: function (data)
                                {

                                  
                                var json = $.parseJSON(data);

                                if(json >0)
                                {	                  	 
                                $("#notif").html(json);
                                $("#notif").css("display","block");

                                }
                                else 
                                {
                                $('#notif').html('');
                                $("#notif").css("display","none");

                                }

                        },


                        });
                        }

                        function changecolour(id){

$.ajax({
type: "POST",
url: "/site/changecolour",
data: {id: id},	                
cache: false,
success: function (data)
{

$('#notiflink_'+id).removeClass('row repeat_notif').addClass('row notif_seen');


},


});

}
</script>

     
</body>
</html>
