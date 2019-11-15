<?php

use yii\helpers\Url;
use yii\web\View;

$this->title = 'Terms&conditions';
?>

<?php

 $getcontent = \common\models\activemode::findmywebsitepagecontent("termsconditions");
 
  
?>

          
                    <!-- BEGIN CONTENT HEADER -->
                    <div class="row margin-bottom-40 about-header">
                        <div class="col-md-12">
                            <h1><font color="black"></font></h1>
                            <h2></h2>
                           <!-- <button type="button" class="btn btn-danger">JOIN US TODAY</button>-->
                        </div>
                    </div>
                    <!-- END CONTENT HEADER -->
                    <!-- BEGIN CARDS -->
                  
                    <!-- END CARDS -->
                    <!-- BEGIN TEXT & VIDEO -->
                    <div class="container margin-bottom-40">
                        <div class="col-lg-12">
                            <div class="portlet light">
                            <h3 class="trans_head_b">Terms & Conditions</h3>
                                <p class="margin-top-30">  <?php if($getcontent) { ?><?php echo $getcontent->content; ?><?php } ?></p>
</div>
                        </div>
                        
                    </div> 
                    <!-- END TEXT & VIDEO -->
                    <!-- BEGIN MEMBERS SUCCESS STORIES -->
                  