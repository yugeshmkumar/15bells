<?php

$customer_name=$_POST['name'];
$customer_email=$_POST['email'];

$message=$_POST['description'];
//echo $customer_name;exit;
$mail_message = 'Customer Name : '.$customer_name.'
       Email Id :  '.$customer_email.' 
    
   
   Message : '.$message.'';
		
	  $message = $mail_message;
	  $subject ="Customer Query";
	  $from = "15BELLS Query";
		
		
	$to = "satender1990kumar@gmail.com";	
	$mail= mail($to, $subject, $message);
	//print_r $message; 
	//exit;
	//echo $res=1;

if($mail){
echo $res=1;}
else
{
echo $res=0;
}

?>


