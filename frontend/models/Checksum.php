<?php


namespace frontend\models;

use Yii;
use yii\base\Model;


class Checksum extends Model{

	static function calculateChecksum($secret_key, $all) {
		$hash = hash_hmac('sha256', $all , $secret_key);
		$checksum = $hash;
		return $checksum;
	}
	
	static function getAllParams() {
		//ksort($_POST);
		$all = '';
		
		
		$checksumsequence= array("amount","bankid","buyerAddress",
				"buyerCity","buyerCountry","buyerEmail","buyerFirstName","buyerLastName","buyerPhoneNumber","buyerPincode",
				"buyerState","currency","debitorcredit","merchantIdentifier","merchantIpAddress","mode","orderId",
				"product1Description","product2Description","product3Description","product4Description",
				"productDescription","productInfo","purpose","returnUrl","shipToAddress","shipToCity","shipToCountry",
				"shipToFirstname","shipToLastname","shipToPhoneNumber","shipToPincode","shipToState","showMobile","txnDate",
				"txnType","zpPayOption");
		
		
		foreach($checksumsequence as $seqvalue)	{
			if(array_key_exists($seqvalue, $_POST))	{
				if(!$_POST[$seqvalue]=="")
				{
					if($seqvalue != 'checksum') 
					{
							$all .= $seqvalue;
							$all .="=";
							if ($seqvalue == 'returnUrl') 
							{
								$all .= Checksum::sanitizedURL($_POST[$seqvalue]);
						} 
							else 
							{
								$all .= Checksum::sanitizedParam($_POST[$seqvalue]);
							}
						$all .= "&";
						}
				}
				
			}
		}
		
		
		
		return $all;
	}
	static function getAllParamsCheckandUpdate() {
		//ksort($_POST);
		$all = '';
		foreach($_POST as $key => $value)	{
			if($key != 'checksum') {
				$all .= "'";
				if ($key == 'returnUrl') {
					$all .= Checksum::sanitizedURL($value);
				} else {
					$all .= Checksum::sanitizedParam($value);
				}
				$all .= "'";
			}
		}
		
		return $all;
	}
	static function outputForm($checksum) {
		//ksort($_POST);
		foreach($_POST as $key => $value) {
			if ($key == 'returnUrl') {
				echo '<input type="hidden" name="'.$key.'" value="'.Checksum::sanitizedURL($value).'" />'."\n";
			} else {
				echo '<input type="hidden" name="'.$key.'" value="'.Checksum::sanitizedParam($value).'" />'."\n";
			}
		}
		echo '<input type="hidden" name="checksum" value="'.$checksum.'" />'."\n";
	}
	
	static function verifyChecksum($checksum, $all, $secret) {
		$cal_checksum = Checksum::calculateChecksum($secret, $all);
		$bool = 0;
		if($checksum == $cal_checksum)	{
			$bool = 1;
		}
		
		return $bool;
	}
	
	static function sanitizedParam($param) {
		$pattern[0] = "%,%";
		$pattern[1] = "%#%";
		$pattern[2] = "%\(%";
		$pattern[3] = "%\)%";
		$pattern[4] = "%\{%";
		$pattern[5] = "%\}%";
		$pattern[6] = "%<%";
		$pattern[7] = "%>%";
		$pattern[8] = "%`%";
		$pattern[9] = "%!%";
		$pattern[10] = "%\\$%";
		$pattern[11] = "%\%%";
		$pattern[12] = "%\^%";
		$pattern[13] = "%=%";
		$pattern[14] = "%\+%";
		$pattern[15] = "%\|%";
		$pattern[16] = "%\\\%";
		$pattern[17] = "%:%";
		$pattern[18] = "%'%";
		$pattern[19] = "%\"%";
		$pattern[20] = "%;%";
		$pattern[21] = "%~%";
		$pattern[22] = "%\[%";
		$pattern[23] = "%\]%";
		$pattern[24] = "%\*%";
		$pattern[25] = "%&%";
		$sanitizedParam = preg_replace($pattern, "", $param);
		return $sanitizedParam;
	}
	
	static function sanitizedURL($param) {
		$pattern[0] = "%,%";
		$pattern[1] = "%\(%";
		$pattern[2] = "%\)%";
		$pattern[3] = "%\{%";
		$pattern[4] = "%\}%";
		$pattern[5] = "%<%";
		$pattern[6] = "%>%";
		$pattern[7] = "%`%";
		$pattern[8] = "%!%";
		$pattern[9] = "%\\$%";
		$pattern[10] = "%\%%";
		$pattern[11] = "%\^%";
		$pattern[12] = "%\+%";
		$pattern[13] = "%\|%";
		$pattern[14] = "%\\\%";
		$pattern[15] = "%'%";
		$pattern[16] = "%\"%";
		$pattern[17] = "%;%";
		$pattern[18] = "%~%";
		$pattern[19] = "%\[%";
		$pattern[20] = "%\]%";
		$pattern[21] = "%\*%";
		$sanitizedParam = preg_replace($pattern, "", $param);
		return $sanitizedParam;
	}
	
	public function outputResponse($bool) {


		$arrayval = array();
		$responsecode =  $_POST['responseCode'];
		$orderid =  $_POST['orderId'];
		$checksum =   $_POST['checksum'];
		$transaid =  $_POST['pgTransId'];
		//$keys = array('responsecode', 'orderid', 'checksum', 'transaid');
       
		$responsearray =    array($responsecode,$orderid,$checksum,$transaid);

		return $responsearray;
		// $a = array_fill_keys($keys, $responsearray);
		// echo '<pre>';print_r($responsearray);die;


		// echo '<pre>';print_r($_POST);die;
		// foreach($_POST as $key => $value) {
		// 	if ($bool == 0) {
		// 		if ($key == "responseCode") {
		// 			echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
		// 				<td width="50%" align="center" valign="middle"><font color=Red>***</font></td></tr>';
		// 		} else if ($key == "responseDescription") {
		// 			echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
		// 				<td width="50%" align="center" valign="middle"><font color=Red>This response is compromised.</font></td></tr>';
		// 		} else {
		// 			echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
		// 				<td width="50%" align="center" valign="middle">'.$value.'</td></tr>';
		// 		}
		// 	} else {
		// 		echo '<tr><td width="50%" align="center" valign="middle">'.$key.'</td>
		// 			<td width="50%" align="center" valign="middle">'.$value.'</td></tr>';
		// 	}
		// }
		// echo '<tr><td width="50%" align="center" valign="middle">Checksum Verified?</td>';
		// if($bool == 1) {
		// 	echo '<td width="50%" align="center" valign="middle">Yes</td></tr>';
		// }
		// else {
		// 	echo '<td width="50%" align="center" valign="middle"><font color=Red>No</font></td></tr>';
		// }
	}
	static function getAllResponseParams() {
		//ksort($_POST);
		$all = '';
		$checksumsequence= array("amount","bank","bankid",
				"cardId","cardScheme","cardToken","cardhashid","doRedirect","orderId","paymentMethod","paymentMode","responseCode",
				"responseDescription");
		foreach($checksumsequence as $seqvalue)	{
			if(array_key_exists($seqvalue, $_POST))	{
				
				$all .= $seqvalue;
				$all .="=";
				if ($seqvalue == 'returnUrl') {
					$all .= $_POST[$seqvalue];
				} else {
					$all .= $_POST[$seqvalue];
				}
				$all .= "&";
				
				
				
			}
		}
		
		
		return $all;
	}
}
?>
