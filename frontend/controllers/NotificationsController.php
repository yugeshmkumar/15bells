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
        $route = 4;

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
        echo "cURL Error #:" . $err;die;
        } else {
        echo $response;die;
        }


        }

        $html = '<html>
        <body>
    
        <p>Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.Yii::getAlias('@frontendUrl').'/user/sign-in/login?code='.$activation.'">Click here to Activate</a>
        </p><br>

        <p>Regards,<br/>
        Team 15bells.</p>
        </body>
        </html>';

        $email = \Yii::$app->mailer->compose()
        ->setTo('chirag@15bells.com')

        ->setFrom(['info@15bells.com' => '15bells'])
        ->setSubject('15bells Register mail ')
        ->setHtmlBody($html)
        ->send();

        // if($email){
        //     echo 'hii';die;
        // }else{
        //     echo 'hii22222';die;
        // }



      $model3 = Yii::$app->db->createCommand()->update('notifications', ['is_seen' => 1])->execute();

      //return 'done';

    }

    
}
