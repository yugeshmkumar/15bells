<?php
namespace common\models;

use yii\db\ActiveRecord;
?>
<?php 

class activemode extends ActiveRecord
{
	
	
	public static function checkprofilestats($userid,$processname)
	
	{
		
		$getprofilestatus = \common\models\MyProfileProgressStatus::find()
		->where(['user_id'=>$userid,'active'=>1,'process_name'=>$processname])
		->one();
		return $getprofilestatus;
	}
	
	public static function checkprofilestatscomplete($userid,$processname)
	
	{
		
		$getprofilestatus = \common\models\MyProfileProgressStatus::find()
		->where(['user_id'=>$userid,'active'=>1,'process_name'=>$processname,'process_status'=>100])
		->one();
		return $getprofilestatus;
	}
	
	public static function checkprofilestatscompletewidp($userid,$processname,$propertyid)
	
	{
		
		$getprofilestatus = \common\models\MyProfileProgressStatus::find()
		->where(['user_id'=>$userid,'active'=>1,'process_name'=>$processname,'process_status'=>100,'property_id'=>$propertyid])
		->one();
		return $getprofilestatus;
	}
	
	public static function raiseinvoiceforbrokerage($userid,$propertyid,$expected_price)
	{
		$getproperty = \common\models\Property::find()->where(['id'=>$propertyid])->one();
		$findseriesconfig = \common\models\Seriesconfig::find()->where(['seriesname'=>"Invoice Series",'module'=>"Finance"])->one();
		if($findseriesconfig){
		$generateinvoiceno = '15BELLS-INV-00'.$findseriesconfig->currentpoint.$userid.$propertyid.date('y');
		}else{
			$generateinvoiceno = '15BELLS-INV-00'.$userid.$propertyid.date('y');
		}
		$expected_pricenew = str_replace("Rs","",$expected_price);
		$getbrokerageamount = ($expected_pricenew/100)*5;
			//entry in receivables
		$Receivables = new \common\models\Receivables();
		$Receivables->invoiceNumber=$generateinvoiceno;
        $Receivables->userId=$userid;
        $Receivables->paymentStatus="Unpaid";
        $Receivables->invoiceDate=date('y-m-d');
        $Receivables->nextReminder=date('y-m-d');
        $Receivables->lastReminder=date('y-m-d');
        $Receivables->propertyid=$propertyid;
        $Receivables->invoiceAmount=$getbrokerageamount;
        $Receivables->description="brokerage";
        $Receivables->AYID=date('y');
	    $Receivables->save();
	    //entry in invoice_items
		$invitems = new \common\models\InvoiceItems();
		$invitems->invoiceID=$Receivables->invoiceID;
        $invitems->propertyid=$propertyid;
		if($getproperty){
        $invitems->property_typeid=$getproperty->projectypeid;
		}
        $invitems->finyearid=date('y');
        $invitems->amount=$Receivables->invoiceAmount;
        $invitems->remarks="brokerage";
		$invitems->save();
	
		//credit entry in user_account
         $Useraccount = new \common\models\Useraccount();
	     $Useraccount->userID=$userid;
         $Useraccount->propertyID=$propertyid;
         $Useraccount->invoiceID=$Receivables->invoiceID;
         $Useraccount->xnamount=$Receivables->invoiceAmount;
         $Useraccount->xndate=$Receivables->invoiceDate;
         $Useraccount->balance=$Receivables->invoiceAmount;
		 $Useraccount->save();
            
	}
public static function finduserproperty($userid){
	

		$arrgetproperty = \common\models\Property::find()->where(['userid'=>$userid,'isactive'=>1])->all();
	return $arrgetproperty ;
}
public static function getpublishedfaqs($page)
{
	$arrgetfaqs = \common\models\Bellsfaqs::find()->where(['publishstatus'=>"published",'page'=>$page])->all();
	return  $arrgetfaqs ;
	
}
public static function findmybank($userid)
{
	$arrgetbank = \common\models\Bank::find()->where(['user_id'=>$userid,'isactive'=>1])->all();
	return $arrgetbank;
}
public static function getLatLong($address)
{

    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;   
    }


}
public static function findmywebsitepagecontent($page)
{
	$getwebsitecontent = \common\models\Websiteconfig::find()->where(['page'=>$page,'isactive'=>1])->one();
	return $getwebsitecontent;
}

public static function checkifnewroleexitst($rolename){
    $checkrole = \common\models\UserRoles::find()->where(['rolename'=>$rolename,'isactive'=>1])->one();
	return $checkrole ;
}
public static function enternewroletonewtable($rolename){
    $insertrole = new \common\models\UserRoles();
	$insertrole->rolename= $rolename;
	$insertrole->roledesc= $rolename;
    $insertrole->isactive=1;
	$insertrole->save();
	
	return;
}

public static function checkmyrole($user)
{
	$rbac_auth_assignment = \common\models\RbacAuthAssignment::find()->where(['user_id'=>$user])->one();
	return $rbac_auth_assignment;
}
public static function get_my_login_as_id($companytype){
	$myquery = \common\models\LoginAsConfig::find()->where(['name'=>$companytype])->one();
	return $myquery->id;
}
public static function insertmyfirstcompanydetails($companyname,$companytype,$userid)
{
	$company = new \common\models\Company();
	$company->name=$companyname;
    $company->userid=$userid;
    $company->company_type=$companytype;
	$company->save();
	$getloginasid = activemode::get_my_login_as_id($companytype);
	$UserLoginAs = new \common\models\UserLoginAs();
	$UserLoginAs->user_id = $userid;
	$UserLoginAs->login_as = $companytype;
	$UserLoginAs->loginasID=$getloginasid;
	$UserLoginAs->save();
	
	$CompanyEmp = new \common\models\CompanyEmp();
	$CompanyEmp->userid = $userid;
	$CompanyEmp->companyid = $company->id;
	$CompanyEmp->save();
}
public static function check_my_docs_upload_completion_status($userid)
{
	$findcount = \common\models\UserKycdocuments::find()->where(['userid'=>$userid,'isactive'=>1])->count();
	return $findcount;
}
//my profile insertion
public static function insert_phone_numbers($userid,$countrycode,$arrphonenumberid,$chkirid,$key){
	 $checkifalreadyexists = \common\models\UserPhoneconfig::find()->where(['userid'=>$userid,'isdefault'=>$chkirid])->one();
	 if(!$checkifalreadyexists){
 $phonemodel = new \common\models\Phonenumbers();
				   $phonemodel->country_code = $countrycode;
				   $phonemodel->phone_no =$arrphonenumberid;
				   $phonemodel->isdefault=$chkirid;
				   $phonemodel->phonetype = $key;
					 $phonemodel->save();  
//entry in user and phone config
		
		$UserPhoneconfig = new \common\models\UserPhoneconfig();
		$UserPhoneconfig->roleid=3;
		$UserPhoneconfig->userid=$userid;
		$UserPhoneconfig->phoneid=$phonemodel->id;
		$UserPhoneconfig->isdefault=$phonemodel->isdefault;
		$UserPhoneconfig->save();					 
} else {
	$getvaluephonemodel = \common\models\Phonenumbers::find()->where(['id'=>$checkifalreadyexists->phoneid])->one();
	if($getvaluephonemodel){
		           $getvaluephonemodel->country_code = $countrycode;
				   $getvaluephonemodel->phone_no =$arrphonenumberid;
				   $getvaluephonemodel->isdefault=$chkirid;
				   $getvaluephonemodel->phonetype = $key;
				   $getvaluephonemodel->save(); 
				   
				   $checkifalreadyexists->roleid=3;
		           $checkifalreadyexists->userid=$userid;
		           $checkifalreadyexists->phoneid=$getvaluephonemodel->id;
		           $checkifalreadyexists->isdefault=$getvaluephonemodel->isdefault;
		           $checkifalreadyexists->save();	
}}
	
}

//my profile insertion
public static function insert_phone_numbers_guardian($userid,$countrycode,$arrphonenumberid,$chkirid,$key,$guardianid){
	
 $phonemodel = new \common\models\Phonenumbers();
				   $phonemodel->country_code = $countrycode;
				   $phonemodel->phone_no =$arrphonenumberid;
				   $phonemodel->isdefault=$chkirid;
				   $phonemodel->phonetype = $key;
					 $phonemodel->save();  
//entry in user and phone config
		
		$UserPhoneconfig = new \common\models\UserPhoneconfig();
		$UserPhoneconfig->roleid=3;
		$UserPhoneconfig->userid=$userid;
		$UserPhoneconfig->phoneid=$phonemodel->id;
		$UserPhoneconfig->isdefault=$phonemodel->isdefault;
		$UserPhoneconfig->guardianprofileid =$guardianid;
		$UserPhoneconfig->save();					 
}
public static function insert_email_addresses($userid,$arremailaddressid,$chkir2id,$key2){
		 $checkifalreadyexists = \common\models\UserEmailconfig::find()->where(['userid'=>$userid,'isdefault'=>$chkir2id])->one();
	 if(!$checkifalreadyexists){
 
 $Emailaddresses = new \common\models\Emailaddresses();
				   $Emailaddresses->emailaddress = $arremailaddressid;
				   $Emailaddresses->emailtype =$key2;
				   $Emailaddresses->isdefault = $chkir2id;
					 $Emailaddresses->save();  

		//entry in user and email config
		
		$UserEmailconfig = new \common\models\UserEmailconfig();
		$UserEmailconfig->roleid=3;
		$UserEmailconfig->userid=$userid;
		$UserEmailconfig->emailid=$Emailaddresses->id;
		$UserEmailconfig->isdefault=$Emailaddresses->isdefault;
		$UserEmailconfig->save();
	 } else {
		 $getvalueemailaddresses = \common\models\Emailaddresses::find()->where(['id'=>$checkifalreadyexists->emailid])->one();
	if($getvalueemailaddresses){
		          $getvalueemailaddresses->emailaddress = $arremailaddressid;
				   $getvalueemailaddresses->emailtype =$key2;
				   $getvalueemailaddresses->isdefault = $chkir2id;
					 $getvalueemailaddresses->save();  
				   
				   $checkifalreadyexists->roleid=3;
		           $checkifalreadyexists->userid=$userid;
		           $checkifalreadyexists->emailid=$getvalueemailaddresses->id;
		           $checkifalreadyexists->isdefault=$getvalueemailaddresses->isdefault;
		           $checkifalreadyexists->save();	
	}
		 
	 }
}
public static function insert_email_addresses_guardian($userid,$arremailaddressid,$chkir2id,$key2,$guardianid){
	
 $Emailaddresses = new \common\models\Emailaddresses();
				   $Emailaddresses->emailaddress = $arremailaddressid;
				   $Emailaddresses->emailtype =$key2;
				   $Emailaddresses->isdefault = $chkir2id;
					 $Emailaddresses->save();  

		//entry in user and email config
		
		$UserEmailconfig = new \common\models\UserEmailconfig();
		$UserEmailconfig->roleid=3;
		$UserEmailconfig->userid=$userid;
		$UserEmailconfig->emailid=$Emailaddresses->id;
		$UserEmailconfig->isdefault=$Emailaddresses->isdefault;
		$UserEmailconfig->guardianprofileid=$guardianid;
		$UserEmailconfig->save();

}
public static function insert_permanet_addresse($userid,$country,$city,$state,$pincode){
	
	 $checkifalreadyexists = \common\models\UserAddressconfig::find()->where(['userid'=>$userid,'isdefault'=>1])->one();
	 if(!$checkifalreadyexists){
 
				
	               $Addresses = new \common\models\Addresses();
				   $Addresses->country = $country;
				  // $Addresses->description = $key3;
				   $Addresses->city = $city;
				   $Addresses->state = $state;
				   $Addresses->pincode = $pincode;
			       $Addresses->isdefault = 1;
				   $Addresses->save();    
//entry in user and address config
		
		$UserAddressconfig = new \common\models\UserAddressconfig();
		$UserAddressconfig->roleid=3;
		$UserAddressconfig->userid=$userid;
		$UserAddressconfig->addressid=$Addresses->id;
		$UserAddressconfig->isdefault=$Addresses->isdefault;
		$UserAddressconfig->save();
	 } else {
		 $getvalueAddresses = \common\models\Addresses::find()->where(['id'=>$checkifalreadyexists->addressid])->one();
	if($getvalueAddresses){
		          $getvalueAddresses->country = $country;
				   $getvalueAddresses->city = $city;
				   $getvalueAddresses->state = $state;
				   $getvalueAddresses->pincode = $pincode;
			       $getvalueAddresses->isdefault = 1;
					 $getvalueAddresses->save();  
				   
				  $checkifalreadyexists->roleid=3;
		$checkifalreadyexists->userid=$userid;
		$checkifalreadyexists->addressid=$getvalueAddresses->id;
		$checkifalreadyexists->isdefault=$getvalueAddresses->isdefault;
		$checkifalreadyexists->save();
	}
	 }
}
public static function insert_correspondence_addresses($userid,$corr_country,$corr_city,$corr_state,$corr_pincode){
				   
 $checkifalreadyexistsnew = \common\models\UserAddressconfig::find()->where('userid =:userid and isdefault !=:config',array(':userid'=>$userid ,':config'=>1))->one();
	 if(!$checkifalreadyexistsnew){
 
				 
		  $Addressescorr = new \common\models\Addresses();
				   $Addressescorr->country =$corr_country;
				   //$Addresses->description = $key3;
				   $Addressescorr->city = $corr_city;
				   $Addressescorr->state = $corr_state;
				   $Addressescorr->pincode = $corr_pincode;
			       //$Addresses->isdefault = $chkir3[$id];
				   $Addressescorr->save();    
//entry in user and address config
		
		$UserAddressconfig = new \common\models\UserAddressconfig();
		$UserAddressconfig->roleid=3;
		$UserAddressconfig->userid=$userid;
		$UserAddressconfig->addressid=$Addressescorr->id;
		$UserAddressconfig->isdefault=0;
		$UserAddressconfig->save();
	 } else {
		  $getvalueAddresses = \common\models\Addresses::find()->where(['id'=>$checkifalreadyexistsnew->addressid])->one();
	if($getvalueAddresses){
		          $getvalueAddresses->country = $corr_country;
				   $getvalueAddresses->city = $corr_city;
				   $getvalueAddresses->state = $corr_state;
				   $getvalueAddresses->pincode = $corr_pincode;
			       $getvalueAddresses->isdefault = 0;
				   $getvalueAddresses->save();  
				   
				  $checkifalreadyexistsnew->roleid=3;
		$checkifalreadyexistsnew->userid=$userid;
		$checkifalreadyexistsnew->addressid=$getvalueAddresses->id;
		$checkifalreadyexistsnew->isdefault=$getvalueAddresses->isdefault;
		$checkifalreadyexistsnew->save();
	}
	 }
}
public static function update_my_profile_progress_status($userid,$process_name,$count,$roleid){
	
	 $myprofilestatus =\common\models\MyProfileProgressStatus::find()->where(['user_id'=>$userid,'process_name'=>$process_name])->one();
			if($myprofilestatus){
		$myprofilestatus->process_status=$count;
		$myprofilestatus->save();
			 } else{
	$myprofilestatus = new \common\models\MyProfileProgressStatus();
		 $myprofilestatus->process_name=$process_name;
		 $myprofilestatus->process_status=$count;
		 $myprofilestatus->user_id= $userid;
		 $myprofilestatus->role_id=$roleid;
		 $myprofilestatus->save();
		 
}}
public static function insert_to_my_profile_table($userid,$Title,$FirstName,$middlename,$LastName,$Emailid,$Mobileid,$Dob,$Gender,$nationality,$MartialStatus,$Minor,$RelatnshpWithMinor,$GuardianName,$PanCardNo,$AdharCardNo,$CurrentCountry,$CurrentState
,$CurrentCity,$CurrentPincode,$PermanentCountry,$PermanentState,$PermanentCity,$PermanentPincode,$currentaddress,$permanentaddress,$countryverificatn,$passportno,$ocinumber,$pionumber){
	        $checkifalreadyexists = \common\models\Myprofilenew::find()->where(['userID'=>$userid,'isactive'=>1])->one();
			if(!$checkifalreadyexists){
			$modelMyprofile = new \common\models\Myprofilenew();
			$modelMyprofile->userID=$userid;
	        $modelMyprofile->title = $Title;
            $modelMyprofile->first_name=$FirstName;
			$modelMyprofile->middlename=$middlename;
            $modelMyprofile->last_name=$LastName;
            $modelMyprofile->emailid=$Emailid;
            $modelMyprofile->mobileid=$Mobileid;
            $modelMyprofile->dob=$Dob;
            $modelMyprofile->gender=$Gender;
			$modelMyprofile->nationality=$nationality;
            $modelMyprofile->martial_status=$MartialStatus;
            $modelMyprofile->isMinor=$Minor;
            $modelMyprofile->relatnshp_with_minor=$RelatnshpWithMinor;
            $modelMyprofile->guardian_name=$GuardianName;
            $modelMyprofile->pan_card_no=$PanCardNo;
            $modelMyprofile->adhar_card_no=$AdharCardNo;
			$modelMyprofile->countryverificatn =$countryverificatn;
			$modelMyprofile->pionumber=$pionumber;
			$modelMyprofile->ocinumber=$ocinumber;
			$modelMyprofile->passportno=$passportno;
		    $modelMyprofile->current_country=$CurrentCountry;
            $modelMyprofile->current_state=$CurrentState;
            $modelMyprofile->current_city=$CurrentCity;
            $modelMyprofile->current_pincode=$CurrentPincode;
			$modelMyprofile->current_address=$currentaddress;
            $modelMyprofile->permanent_country=$PermanentCountry;
            $modelMyprofile->permanent_state=$PermanentState;
            $modelMyprofile->permanent_city=$PermanentCity;
            $modelMyprofile->permanent_pincode=$PermanentPincode;
			$modelMyprofile->permanent_address=$permanentaddress;
	        $modelMyprofile->save();
			} else {
			$checkifalreadyexists->userID=$userid;
	        $checkifalreadyexists->title = $Title;
            $checkifalreadyexists->first_name=$FirstName;
			$checkifalreadyexists->middlename=$middlename;
            $checkifalreadyexists->last_name=$LastName;
            $checkifalreadyexists->emailid=$Emailid;
            $checkifalreadyexists->mobileid=$Mobileid;
            $checkifalreadyexists->dob=$Dob;
            $checkifalreadyexists->gender=$Gender;
			$checkifalreadyexists->nationality=$nationality;
            $checkifalreadyexists->martial_status=$MartialStatus;
            $checkifalreadyexists->isMinor=$Minor;
            $checkifalreadyexists->relatnshp_with_minor=$RelatnshpWithMinor;
            $checkifalreadyexists->guardian_name=$GuardianName;
            $checkifalreadyexists->pan_card_no=$PanCardNo;
            $checkifalreadyexists->adhar_card_no=$AdharCardNo;
			$checkifalreadyexists->countryverificatn =$countryverificatn;
			$checkifalreadyexists->pionumber=$pionumber;
			$checkifalreadyexists->ocinumber=$ocinumber;
			$checkifalreadyexists->passportno=$passportno;
		    $checkifalreadyexists->current_country=$CurrentCountry;
            $checkifalreadyexists->current_state=$CurrentState;
            $checkifalreadyexists->current_city=$CurrentCity;
            $checkifalreadyexists->current_pincode=$CurrentPincode;
			$checkifalreadyexists->current_address=$currentaddress;
            $checkifalreadyexists->permanent_country=$PermanentCountry;
            $checkifalreadyexists->permanent_state=$PermanentState;
            $checkifalreadyexists->permanent_city=$PermanentCity;
            $checkifalreadyexists->permanent_pincode=$PermanentPincode;
			$checkifalreadyexists->permanent_address=$permanentaddress;
	        $checkifalreadyexists->save();	
			}
}
}
?>