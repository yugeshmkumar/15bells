<?php
use frontend\models\Checksum;
use common\models\Payments;
use common\models\Invoice;

	// Please insert your own secret key here
	$secret = '4b9300e1ab614616ab4d01eb25fd7944';

 	$recd_checksum = $_POST['checksum'];
	$all = Checksum::getAllResponseParams();
	error_log("AllParams:".$all);
	error_log("Secret Key : ".$secret);
	$checksum_check = Checksum::verifyChecksum($recd_checksum, $all, $secret);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zaakpay</title>
</head>
<body>

<center>
<table width="500px;">
	<?php //Checksum::outputResponse($checksum_check);

             $krequestids =    $_SESSION['requestids'];
            $kamount_payable =    $_SESSION['amount_payable']/100;
			$responsecode =  Checksum::outputResponse($checksum_check);

			// echo '<pre>';print_r($responsecode);die;

			$responsecodes = $responsecode[0];
		 $orderId = $responsecode[1];	
			$checksum = $responsecode[2];
			$transaid = $responsecode[3];


        // $orderId =  $_POST['orderid'];
       //  $krequestids =  $_POST['krequestids'];
        // $kamount_payable =  $_POST['kamount_payable'];
 
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
 
         $finduser = \common\models\RequestSiteVisit::find()->where(['request_id' => $krequestids])->one();
         // echo '<pre>';print_r($finduser);die;
        if($finduser){

			$proid = $finduser->property_id;
			$propdetails = \common\models\Addproperty::find()->where(['id' => $proid])->one();

         if ($responsecodes == 100) { 
                      
            
             $finduser->request_status = 'paid';
             $finduser->save(false);
 
             $model = new Payments;
             $model->item_name = 'sitevisit';
             $model->item_number = $krequestids;
			 $model->txn_id = $transaid;
			 $model->orderid = $orderId;
             $model->payment_amount = $kamount_payable;
             $model->currency_code = 'INR';
             $model->payment_status = 'paid';
             $model->created_date = $date;
             if($model->save(false)){

                $Invoice = new Invoice;
              //  $Invoice->invoiceID = 'documentshow';
                $Invoice->propertyid = $finduser->property_id;
                $Invoice->user_id = $finduser->user_id;
                $Invoice->payment_id = $model->id;
                $Invoice->finyearid = 1;
                $Invoice->amount = $kamount_payable;
                $Invoice->isActive = 1;
                $Invoice->createdAt = $date;
                if($Invoice->save(false)){

                    $payments = \Yii::$app->db->createCommand("SELECT LPAD(invoiceitemid,7,'0') as generateid from invoice_items where invoiceitemid='$Invoice->invoiceitemid'")->queryOne();
                    $generateid =  $payments['generateid'];


                    $saveinvoiceid = \common\models\Invoice::find()->where(['invoiceitemid' => $Invoice->invoiceitemid])->one();
                   
                    $saveinvoiceid->invoiceID = $generateid;
					$saveinvoiceid->save(false);
					
					Yii::$app->session->setFlash('success', "payment has been successfully paid");
if($propdetails->property_for == 'rent'){
					return Yii::$app->response->redirect(['request-sitevisit/lessee']);
}else{
	return Yii::$app->response->redirect(['request-sitevisit/buyer']);

}
                }

                
                 
             }else{

                Yii::$app->session->setFlash('success', "Error while doing payment");

				if($propdetails->property_for == 'rent'){
					return Yii::$app->response->redirect(['request-sitevisit/lessee']);
}else{
	return Yii::$app->response->redirect(['request-sitevisit/buyer']);

}
             }
 
             
         }else{

			Yii::$app->session->setFlash('error', "Payment not Done");

			if($propdetails->property_for == 'rent'){
				return Yii::$app->response->redirect(['request-sitevisit/lessee']);
}else{
return Yii::$app->response->redirect(['request-sitevisit/buyer']);

}
		 }
     }
     
     
     session_destroy();
	 

	?>
</table>


</center>



</body>
</html>
