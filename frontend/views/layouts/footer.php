<?php
use yii\helpers\Url;
?>
<div class="row footer_link abcd" id="footr_nav" style="background:#000;">		
								<div class="col-md-4" style="padding-top:5px;">
								<i class="fa fa-close clode_anim"></i>
									<p class="rights_resrv">© 2017 ALL RIGHTS RESERVED. POWERED BY <a href="https://encriss.com/">encriss.com</a></p>
								</div>	
								<div class="col-md-5">
									<ul class="footer_mnu" style="padding-top:5px;">
												<li><a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
												<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("blogs") ?>">Blog</a></li>
												<li style="border-right:none !important;"><a class="sliding-middle-out" onclick="opencon()" style="cursor: pointer">Contact Us</a></li>
									</ul>
								</div>	
								<div class="col-md-3">
									<ul class="social_ic">
												<li><a href="https://www.facebook.com/15bells/" target="_blank"><i class="fa fa-facebook sc_icn"></i></a></li>
												<li><a href="https://twitter.com/15bells" target="_blank"><i class="fa fa-twitter sc_icn"></i></a></li>
												<li><a href="https://plus.google.com/u/0/101985235162687065074" target="_blank"><i class="fa fa-google-plus sc_icn"></i></a></li>
												<li><a href="https://nl.linkedin.com/company/15bells" target="_blank"><i class="fa fa-linkedin sc_icn"></i></a></li>
												<li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube sc_icn"></i></a></li>
									</ul>
								</div>
								
							</div>
