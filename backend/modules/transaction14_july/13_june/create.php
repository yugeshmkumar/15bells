
<?php 


use yii\helpers\Html;
use yii\widgets\Pjax;
use backend\modules\transaction\models\Transaction;
if (Yii::$app->session->hasFlash('success')):
 endif; 

$connection = Yii::$app->getDb();

 $model =new Transaction();
 $time=$model->gettime();
 
 
 
 /*$get_price="select reserved_price from product_details where product_id='1'";
 $command = $connection->createCommand($get_price);
$result1 = $command->queryOne();
$r_res=$result1['reserved_price'];
 */
 
 $r_res=$model->getMaxprice();
 
 
 $getcount=$model->getGetcount();
 
?>
<span id ="price"></span>
<div id="bidgrid"></div>
<h3> <span id ="bidstatus" style="color:green;"></span></h3>
<!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd" [
	<!ENTITY ns_extend "http://ns.adobe.com/Extensibility/1.0/">
	<!ENTITY ns_ai "http://ns.adobe.com/AdobeIllustrator/10.0/">
	<!ENTITY ns_graphs "http://ns.adobe.com/Graphs/1.0/">
	<!ENTITY ns_vars "http://ns.adobe.com/Variables/1.0/">
	<!ENTITY ns_imrep "http://ns.adobe.com/ImageReplacement/1.0/">
	<!ENTITY ns_sfw "http://ns.adobe.com/SaveForWeb/1.0/">
	<!ENTITY ns_custom "http://ns.adobe.com/GenericCustomNamespace/1.0/">
	<!ENTITY ns_adobe_xpath "http://ns.adobe.com/XPath/1.0/">

<svg version="1.1" id="Old" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 28 1380 738"
	 style="enable-background:new 0 28 1380 738;" xml:space="preserve">
<style type="text/css">
	.st0{fill:none;enable-background:new    ;}
	.st1{opacity:0.8;fill:none;enable-background:new    ;}
	.st2{fill:#FFFFFF;}
	.st3{font-family:'Lato-Heavy';}
	.st4{font-size:12px;}
	.st5{opacity:0.7;fill:none;enable-background:new    ;}
	.st6{fill:#E4B640;}
	.st7{opacity:0.2;fill:none;enable-background:new    ;}
	.st8{font-family:'Roboto-Light';}
	.st9{font-size:9px;}
	.st10{fill:#009CBD;}
	.st11{font-family:'Roboto-Medium';}
	.st12{font-family:'ArialMT';}
	.st13{font-size:11px;}
	.st14{font-size:10px;}
	.st15{fill:#2D2C2C;}
	.st16{opacity:7.000000e-002;fill:none;enable-background:new    ;}
	.st17{font-size:21.948px;}
	.st18{font-size:19px;}
	.st19{opacity:0.8;stroke:#FFFFFF;enable-background:new    ;}
	.st20{font-family:'Roboto-Bold';}
	.st21{font-size:15px;}
	.st22{fill:#B58D00;}
	.st23{fill:none;stroke:#9B722C;}
	.st24{fill:none;stroke:#555555;}
	.st25{font-family:'Roboto-Regular';}
	.st26{fill:#FFE68E;}
	.st27{font-size:14px;}
	.st28{fill:#F8F8F8;}
	.st29{fill:none;stroke:url(#square_2_);stroke-linejoin:round;stroke-opacity:0.25;}
	.st30{fill:#616161;}
	.st31{font-family:'TickingTimebombBB';}
	.st32{font-size:28px;}
	.st33{fill:#FAFAFA;}
	.st34{fill:#FEFFFF;}
	.st35{fill:#009CBD;stroke:#FFFFFF;}
</style>
<switch>
	<foreignObject requiredExtensions="&ns_ai;" x="0" y="0" width="1" height="1">
		<i:pgfRef  xlink:href="#adobe_illustrator_pgf">
		</i:pgfRef>
	</foreignObject>
	<g i:extraneous="self">
		<g id="Top_Img">
			
				<image style="overflow:visible;" width="1400" height="738" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABXgAAALiAQMAAABZnyzfAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABlBMVEVUtM0AAABTGGshAAAA
AWJLR0QB/wIt3gAAAAlwSFlzAAALEgAACxIB0t1+/AAAAAd0SU1FB+EGCgoaJp6GjbMAAACVSURB
VHja7cExAQAAAMKg9U9tCy+gAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAtwH7bwABT3L8agAAAABJRU5ErkJggg==" transform="matrix(1 0 0 1 -20 28)">
			</image>
			<path class="st0" d="z"/>
			
				<image style="overflow:visible;" width="645" height="341" xlink:href="data:image/png;base64,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
DLV