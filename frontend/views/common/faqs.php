<div class="row margin-bottom-40 about-header">
    <div class="col-md-12">
        <h1>FAQ's</h1>
        <h2 style="padding-left:20%;padding-right:20%;padding-top:10%;"><div class="search-page search-content-1" style="padding:5px">
            </div></h2>

    </div>
</div>

<div class="faq-page faq-content-1">
    <?php
    $arrgetfaqs = common\models\activemode::getpublishedfaqs("landlord");
    ?>
    <div class="faq-content-container">
        <div class="row" style="padding:2%;">
            <div class="col-md-6">

                <div class="faq-section ">
                    <h2 class="faq-title uppercase font-blue">LESSOR</h2>
                    <div class="panel-group accordion faq-content" id="accordion1">
                        <?php
                        $temp = 0;
                        foreach ($arrgetfaqs as $getfaqs) {
                            $temp++;
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?php echo $temp ?>"> <?php echo $getfaqs->subject ?></a>
                                    </h4>
                                </div>
                                <div id="collapse_<?php echo $temp ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $getfaqs->content ?></p>
                                    </div>
                                </div>
                            </div>
<?php } ?>

                    </div>
                </div>
                <?php
                $arrgetfaqseller = common\models\activemode::getpublishedfaqs("seller");
                ?>
                <div class="faq-section ">
                    <h2 class="faq-title uppercase font-blue">Seller</h2>
                    <div class="panel-group accordion faq-content" id="accordion3">
                        <?php
                        $tempt = 0;
                        foreach ($arrgetfaqseller as $getfaqseller) {
                            $tempt++;
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_65<?php echo $tempt ?>"> <?php echo $getfaqseller->subject ?></a>
                                    </h4>
                                </div>
                                <div id="collapse_65<?php echo $tempt ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $getfaqseller->content ?></p>
                                    </div>
                                </div>
                            </div>
<?php } ?>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
<?php
$arrgetfaqtenant = common\models\activemode::getpublishedfaqs("tenant");
?>
                <div class="faq-section ">
                    <h2 class="faq-title uppercase font-blue">LESSEE</h2>
                    <div class="panel-group accordion faq-content" id="accordion3">
<?php
$temptr = 0;
foreach ($arrgetfaqtenant as $getfaqtenant) {
    $temptr++;
    ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_34<?php echo $temptr ?>"> <?php echo $getfaqtenant->subject ?></a>
                                    </h4>
                                </div>
                                <div id="collapse_34<?php echo $temptr ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $getfaqtenant->content ?></p>
                                    </div>
                                </div>
                            </div>
                <?php } ?>

                    </div>
                </div>

                        <?php
                        $arrgetfaqbuyer = common\models\activemode::getpublishedfaqs("buyer");
                        ?>
                <div class="faq-section ">
                    <h2 class="faq-title uppercase font-blue">Buyer</h2>
                    <div class="panel-group accordion faq-content" id="accordion3">
<?php
$temptrp = 0;
foreach ($arrgetfaqbuyer as $getfaqbuyer) {
    $temptrp++;
    ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_39<?php echo $temptrp ?>"> <?php echo $getfaqbuyer->subject ?></a>
                                    </h4>
                                </div>
                                <div id="collapse_39<?php echo $temptrp ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $getfaqbuyer->content ?></p>
                                    </div>
                                </div>
                            </div>
<?php } ?>

                    </div>
                </div>
                        <?php
                        $arrgetfaqbroker = common\models\activemode::getpublishedfaqs("broker");
                        ?>
                <div class="faq-section ">
                    <h2 class="faq-title uppercase font-blue">Broker</h2>
                    <div class="panel-group accordion faq-content" id="accordion3">
<?php
$broker = 0;
foreach ($arrgetfaqbroker as $getfaqbroker) {
    $broker++;
    ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-circle"></i>
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse_60<?php echo $broker ?>"> <?php echo $getfaqbroker->subject ?></a>
                                    </h4>
                                </div>
                                <div id="collapse_60<?php echo $broker ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p><?php echo $getfaqbroker->content ?></p>
                                    </div>
                                </div>
                            </div>
<?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT BODY -->
</div></div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
