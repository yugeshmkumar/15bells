<?php
/* @var $this yii\web\View */
?>

<div class="col-md-9">
    <div class="portlet portlet-sortable add_managed_proper_div sellr_proprty">
        <div class="portlet-title">
            <div class="caption font-green-sharp exp_titl">
                 <span class="caption-subject bold uppercase exp_name">Notifications</span>
            </div>
        </div>

        <?php 
        $userid = Yii::$app->user->identity->id;
        $payments = \Yii::$app->db->createCommand("select * from notifications where item_id=$userid")->queryAll();
          
        foreach ($payments as $payment){

       
        ?>
        <div class="col-md-12">
            <a href="<?php echo $payment['link']; ?>" 
             
            onclick="changecolour(<?php echo $payment['id']; ?>)" target="_blank" class="notif_anchr">
            <div id="notifcolor_<?php echo $payment['id']; ?>" class="<?php  if ($payment['viewed'] == '0'){ echo "row repeat_notif"; } else { echo "row notif_seen";}?>">
                <div class="col-md-1">
                    <p class="circle_icon m-0"><?php echo $payment['item_name'][0]; ?></p>
                </div>
                <div class="col-md-10 pt-2">
                    <p class="m-0"><?php echo $payment['description']; ?></p>
                </div>
            </div></a>
        </div>

        <?php } ?>
        
        


    </div>
   
</div>

<script>
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