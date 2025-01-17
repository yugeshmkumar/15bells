<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use yii\web\Response;
use yii\db\Query;

class NotificationsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout="dashboard";
        return $this->render('index');
    }

    public function actionChangeviewed(){

        $userid = Yii::$app->user->identity->id;
        $model3 = Yii::$app->db->createCommand()->update('notifications', ['viewed' => '1'], 'item_id = "' . $userid . '"')->execute();

       if($model3){
              return 1;
       }else {
           return 2;
       }


    }


    public function actionSendmessages()
    {
        $this->layout="dashboard";

        $userid = Yii::$app->user->identity->id;
        $payments = \Yii::$app->db->createCommand("SELECT * FROM notifications where is_seen ='0'")->queryAll();

// print_r($payments);die;
        foreach ($payments as $payment){

           
           
        $itemid = $payment['item_id'];
        $scheduletime = $payment['date'];
        $arrcheckrole = \common\models\User::find()->where(['id'=>$itemid])->one();
        $mobileNumber = $arrcheckrole->username;
        $emailuser = $arrcheckrole->email;
        $fullname = $arrcheckrole->fullname;

        $message = $payment['description'];
            //Your authentication key
        $authKey = "222784ARHZNXuXI5b334809";

        //Multiple mobiles numbers separated by comma
        //$mobileNumber = $phonenum;

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "XVBELL";

        //Your message to send, Add URL encoding here.
    // $message = urlencode("Your Verification Code is ".$activation."");

        //Define route 
        $route = 1;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=$mobileNumber&authkey=$authKey&route=$route&sender=$senderId&message=$message&country=91",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }

if($emailuser != ''){
    
        $html = '<html>
        <body>
    
        <p>Hello '.$fullname.', <br/> <br/> '.$message.'
        
        </p><br>

        <p>Regards,<br/>
        Team 15bells.</p>
        </body>
        </html>';

        $email = \Yii::$app->mailer->compose()
        ->setTo($emailuser)

        ->setFrom(['info@15bells.com' => '15bells'])
        ->setSubject('15bells Notification mail ')
        ->setHtmlBody($html)
        ->send();

}

        
        }

      $model3 = Yii::$app->db->createCommand()->update('notifications', ['is_seen' => 1])->execute();
 
    }

    
}
