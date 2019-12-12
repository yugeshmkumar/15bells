<?php
/* @var $this yii\web\View */
?>

<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Notifications</h2>
					</div>
					
					
				</div>
        
        <?php 
        $userid = Yii::$app->user->identity->id;
        $payments = \Yii::$app->db->createCommand("select * from notifications where item_id=$userid order by id desc")->queryAll();
          
        foreach ($payments as $payment){

       
        ?>
        <div class="col-md-12">
            <a href="<?php echo $payment['link']; ?>" 
             
            onclick="changecolour(<?php echo $payment['id']; ?>)" target="_blank" class="notif_anchr">
            <div id="notifcolor_<?php echo $payment['id']; ?>" class="<?php  if ($payment['viewed'] == '0'){ echo "row repeat_notif"; } else { echo "row notif_seen";}?>">
                <div class="col-md-1 col-xs-3 text-center noti_icons">
                    <p class="circle_icon m-0"><?php echo $payment['item_name'][0]; ?></p>
                </div>
                <div class="col-md-10 pt-2 col-xs-9">
                    <p class="m-0 notif_detail"><?php echo $payment['description']; ?></p>
                </div>
            </div></a>
        </div>

        <?php } ?>
        
        


    </div>
   
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

                                    $(document).ready(function(){

                                        notifyviewed()

                                    });


                                    function notifyviewed(){

                                       

                                                $.ajax({
                                                  type: "POST",
                                                  url: 'notifications/changeviewed',
                                                  data: {id: 'yes'},	                
                                                  cache: false,
                                                  success: function (data)
                                                  {


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

                                                   $('#notifcolor_'+id).removeClass('row repeat_notif').addClass('row notif_seen');
                                                  

                                                  },


                                                  });

                                            }


</script>