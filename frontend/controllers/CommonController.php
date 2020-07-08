<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use common\models\Bank;
use common\models\BankSearch;
use frontend\modules\user\models\SignupForm;
use common\models\Company;
use common\models\AuctionParticipants;
use common\models\AuctionParticipantsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\HtmlPurifier;


class CommonController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        //$this->layout = "common";
    }

    public function actionBid() {

        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        //if ($getstatus == 1) {

            $this->layout = "dashboard";
       // } 
        $searchModel = new AuctionParticipantsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('bid', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCheckotpaction() {
        $getotp = $_GET['enterotpvalue'];
        $userid = $_GET['id'];
        $vrroomid = $_GET['vtr'];
        $checkOTP = \common\models\AuctionParticipants::find()->where(['partcipantID' => $userid, 'isactive' => 1, 'vr_roomID' => $vrroomid])->one();
        if ($checkOTP) {
            $vrcode = \common\models\VrSetup::find()->where(['id' => $vrroomid, 'isactive' => 1])->one();

            if ($checkOTP->checkotp == $getotp) {
                $idid = $vrcode->secret_code;
                $auction_type = $vrcode->auction_type;
                //return true;
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Successful.'),
                    'options' => ['class' => 'alert-success']
                ]);

                if($auction_type == 'forward_auction'){

                if ($checkOTP->roleID == 15) {
                    return Yii::$app->response->redirect(Yii::getAlias('@frontendUrl') . '/transaction/transaction/creates?id=' . $idid . '', 301)->send();
                } else if ($checkOTP->roleID == 16) {
                    return Yii::$app->response->redirect(Yii::getAlias('@frontendUrl') . '/transaction/transaction/createsel?id=' . $idid . '', 301)->send();
                }

            }else{
                if ($checkOTP->roleID == 15) {
                    return Yii::$app->response->redirect(Yii::getAlias('@frontendUrl') . '/transaction/transaction/createrev?id=' . $idid . '', 301)->send();
                } else if ($checkOTP->roleID == 16) {
                    return Yii::$app->response->redirect(Yii::getAlias('@frontendUrl') . '/transaction/transaction/createsel?id=' . $idid . '', 301)->send();
                }
            }
            } else {
                return '123';
            }
        } else {
            return '123';
        }
    }

    public function actionCheckotp() {

        $getuser = \common\models\User::find()->where(['id' => $_GET['uid']])->one();
        if ($getuser) {
            $auction_participants = \common\models\AuctionParticipants::find()->where(['partcipantID' => $getuser->id, 'vr_roomID' => $_GET['id'], 'isactive' => 1])->one();
            if ($auction_participants) {
                $phonenum = $getuser->username;
                $emailid = $getuser->email;
                // $OTPval = 'OTP_for_Biding_Engine-' . $auction_participants->checkotp;

           
            $activation =  $auction_participants->checkotp;

            $authKey = "222784ARHZNXuXI5b334809";
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://control.msg91.com/api/sendmailotp.php?otp=$activation&authkey=$authKey&email=$emailid",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "",
              CURLOPT_SSL_VERIFYHOST => 0,
              CURLOPT_SSL_VERIFYPEER => 0,
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              //echo "cURL Error #:" . $err;
            } else {
             // echo $response;
            }
            }
        }
        //end OTP
        return $this->renderPartial('checkotp');
    }

    public function actionFaqs() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "commonfaqs";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }


        return $this->render('faqs');
    }

    public function actionDocuments() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "newdashboard";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }
        $request = Yii::$app->request;
        $mdataPost = $request->post();
        $model = new \common\models\CompanyEmp();


        // get all document type for bus
        $finduserloginas = \common\models\UserLoginAs::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
        if ($finduserloginas) {
            $checkloginrole = \common\models\LoginAsConfig::find()->where(['id' => $finduserloginas->loginasID])->one();

            if ($checkloginrole->login_to == "user") {
                $alldocumentType = \common\models\Documenttype::getalldocumentType(2, $finduserloginas->loginasID);
            } else {
                // get all document type for bus
                $alldocumentType = \common\models\Documenttype::getalldocumentType(1, $finduserloginas->loginasID);
            }
        } else {
            $alldocumentType = \common\models\Documenttype::getalldocumentTypeuser(2);
        }

        // echo '<pre>';print_r($alldocumentType);die;

        if (isset($mdataPost['filedownload'])) {

            //exit();
            function output_file($file, $name, $mime_type = '') {

                //Check the file premission
                if (!is_readable($file))
                    die('File not found or inaccessible!');

                $size = filesize($file);
                $name = rawurldecode($name);

                /* Figure out the MIME type | Check in array */
                $known_mime_types = array(
                    "pdf" => "application/pdf",
                    "txt" => "text/plain",
                    "html" => "text/html",
                    "htm" => "text/html",
                    "exe" => "application/octet-stream",
                    "zip" => "application/zip",
                    "doc" => "application/msword",
                    "xls" => "application/vnd.ms-excel",
                    "ppt" => "application/vnd.ms-powerpoint",
                    "gif" => "image/gif",
                    "png" => "image/png",
                    "jpeg" => "image/jpg",
                    "jpg" => "image/jpg",
                    "php" => "text/plain"
                );

                if ($mime_type == '') {
                    $file_extension = strtolower(substr(strrchr($file, "."), 1));
                    if (array_key_exists($file_extension, $known_mime_types)) {
                        $mime_type = $known_mime_types[$file_extension];
                    } else {
                        $mime_type = "application/force-download";
                    };
                };

                //turn off output buffering to decrease cpu usage
                @ob_end_clean();

                // required for IE, otherwise Content-Disposition may be ignored
                if (ini_get('zlib.output_compression'))
                    ini_set('zlib.output_compression', 'Off');

                header('Content-Type: ' . $mime_type);
                header('Content-Disposition: attachment; filename="' . $name . '"');
                header("Content-Transfer-Encoding: binary");
                header('Accept-Ranges: bytes');

                /* The three lines below basically make the 
                  download non-cacheable */
                header("Cache-control: private");
                header('Pragma: private');
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

                // multipart-download and download resuming support


                if (isset($_SERVER['HTTP_RANGE'])) {
                    list($a, $range) = explode("=", $_SERVER['HTTP_RANGE'], 2);
                    list($range) = explode(",", $range, 2);
                    list($range, $range_end) = explode("-", $range);
                    $range = intval($range);
                    if (!$range_end) {
                        $range_end = $size - 1;
                    } else {
                        $range_end = intval($range_end);
                    }


                    $new_length = $range_end - $range + 1;
                    header("HTTP/1.1 206 Partial Content");
                    header("Content-Length: $new_length");
                    header("Content-Range: bytes $range-$range_end/$size");
                } else {
                    $new_length = $size;
                    header("Content-Length: " . $size);
                }

                /* Will output the file itself */
                $chunksize = 1 * (1024 * 1024);
                $bytes_send = 0;
                if ($file = fopen($file, 'r')) {
                    if (isset($_SERVER['HTTP_RANGE']))
                        fseek($file, $range);

                    while (!feof($file) &&
                    (!connection_aborted()) &&
                    ($bytes_send < $new_length)
                    ) {
                        $buffer = fread($file, $chunksize);
                        print($buffer); //echo($buffer); // can also possible
                        flush();
                        $bytes_send += strlen($buffer);
                    }
                    fclose($file);
                } else
                //If no permissiion
                    die('Error - can not open file.');
                //die
                die();
            }

//Set the time out
            set_time_limit(0);
            $root = $_SERVER['DOCUMENT_ROOT'];
//path to the file
            $file_path = $root . '/archive/web/kycdocuments/' . $_REQUEST['filenamemain'];
            //print($file_path);

//Call the download function with file path,file name and file type
            output_file($file_path, '' . $_REQUEST['filenamemain'] . '', 'text/plain');
            return $this->redirect(['documents', 'id' => $_GET['id']]);
        }
        $request = Yii::$app->request->post();

        if (!empty($request)) {
            $fstBlock = $alldocumentType[1];
            $secBlock = $alldocumentType[1];
            $documentroot = $_SERVER['DOCUMENT_ROOT'];
            $getarchieveurl = $documentroot . 'archive/web';
            $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));
         
            if ($fstBlock != '' && $secBlock != '' && $fstBlock == $secBlock) { 
               //echo '<pre>';print_r($request);die;
 // applying condtion that everything is ok nad we ned to submit now. machine will understand that.
                $chkir = $mdataPost['supportchkir'];
                $model->save(); // save the bus info
                // --------------   upload the files      --------------
//echo 'idhar aya';die;
                $root = $_SERVER['DOCUMENT_ROOT'];
                $target_dir = $root . '/archive/web/kycdocuments/';

                if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
                    foreach ($chkir as $rath) {  //  upload all files
                        $docDescription = $mdataPost['documentDescription' . "$rath"];
                        // $docRemark=$mdataPost['documentRemark'."$rath"];

                        $docFiles = $_FILES["documentfiles" . "$rath"];
                        $file_type =  $_FILES["documentfiles" . "$rath"]['type'];
                        $file_size = $_FILES["documentfiles" . "$rath"]['size'];

                        if(($file_size < 3000000)){   // should be 3 mb
                        if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg" || $file_type=="image/png") {
                        if ($docFiles != '') {
                            $finalfilename = basename($sendingitemContentMod . $_FILES["documentfiles" . "$rath"]["name"]);
                            $target_file = $target_dir . $finalfilename;
                            move_uploaded_file($_FILES['documentfiles' . "$rath"]["tmp_name"], "$target_file");

                            $UserKycdocuments = new \common\models\UserKycdocuments();

                            if (!empty($mdataPost['documentDescription' . "$rath"])) {
                                $UserKycdocuments->userid = Yii::$app->user->identity->id;
                                $UserKycdocuments->document_name = $mdataPost['documentDescription' . "$rath"];
                            }
                            if (!empty($_FILES['documentfiles' . "$rath"]["tmp_name"])) {
                                $UserKycdocuments->file_type = $_FILES['documentfiles' . "$rath"]["tmp_name"];
                            }
                            if (!empty($_FILES['documentfiles' . "$rath"]["name"])) {
                                $UserKycdocuments->document_file_name_extenstn = $finalfilename;
                                $UserKycdocuments->docment_file_name = $_FILES['documentfiles' . "$rath"]["name"];
                                $UserKycdocuments->document_file_path = $root . '/archive/web/kycdocuments/';
                                $UserKycdocuments->save();
                            }
                        }
                        $checkifallareupload = \common\models\activemode::check_my_docs_upload_completion_status(Yii::$app->user->identity->id);
                      
                        if ($checkifallareupload == 7) {
                            //do my docs completiton entry 
                            $myprofilestatus = new \common\models\MyProfileProgressStatus();
                            $myprofilestatus->process_name = "my_KYC_upload";
                            $myprofilestatus->process_status = "100";
                            $myprofilestatus->user_id = Yii::$app->user->identity->id;
                            $myprofilestatus->role_id = 3;
                            $myprofilestatus->save();
                        }else{
                            $myprofilestatus = new \common\models\MyProfileProgressStatus();
                            $myprofilestatus->process_name = "my_KYC_upload";
                            $myprofilestatus->process_status = $checkifallareupload."0";
                            $myprofilestatus->user_id = Yii::$app->user->identity->id;
                            $myprofilestatus->role_id = 3;
                            $myprofilestatus->save();
                        }

                      }
                     }
                    }
                }


                //////////////   end uploading files       ////////////////////


                return $this->redirect(['documents']);
            } else {

                return $this->render('documents', [
                            'model' => $model,
                            //	'totnumberofdocument' => $fstBlock,
                            'totnumberofdocument' => HtmlPurifier::process($fstBlock),
                            'busdocument' => '',
                ]);
            }
        } else {
            return $this->render('documents', [
                        'model' => $model,
                        'totnumberofdocument' => HtmlPurifier::process($alldocumentType[1]),
                        'busdocument' => $alldocumentType[0],
            ]);
        }
    }

    public function actionDocumentsold() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "commondocu";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }
        $model = new \common\models\UserKycdocuments();
        $request = Yii::$app->request;
        $mdataPost = $request->post();

        if (isset($mdataPost['filedownload'])) {

            //exit();
            function output_file($file, $name, $mime_type = '') {

                //Check the file premission
                if (!is_readable($file))
                    die('File not found or inaccessible!');

                $size = filesize($file);
                $name = rawurldecode($name);

                /* Figure out the MIME type | Check in array */
                $known_mime_types = array(
                    "pdf" => "application/pdf",
                    "txt" => "text/plain",
                    "html" => "text/html",
                    "htm" => "text/html",
                    "exe" => "application/octet-stream",
                    "zip" => "application/zip",
                    "doc" => "application/msword",
                    "xls" => "application/vnd.ms-excel",
                    "ppt" => "application/vnd.ms-powerpoint",
                    "gif" => "image/gif",
                    "png" => "image/png",
                    "jpeg" => "image/jpg",
                    "jpg" => "image/jpg",
                    "php" => "text/plain"
                );

                if ($mime_type == '') {
                    $file_extension = strtolower(substr(strrchr($file, "."), 1));
                    if (array_key_exists($file_extension, $known_mime_types)) {
                        $mime_type = $known_mime_types[$file_extension];
                    } else {
                        $mime_type = "application/force-download";
                    };
                };

                //turn off output buffering to decrease cpu usage
                @ob_end_clean();

                // required for IE, otherwise Content-Disposition may be ignored
                if (ini_get('zlib.output_compression'))
                    ini_set('zlib.output_compression', 'Off');

                header('Content-Type: ' . $mime_type);
                header('Content-Disposition: attachment; filename="' . $name . '"');
                header("Content-Transfer-Encoding: binary");
                header('Accept-Ranges: bytes');

                /* The three lines below basically make the 
                  download non-cacheable */
                header("Cache-control: private");
                header('Pragma: private');
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

                // multipart-download and download resuming support


                if (isset($_SERVER['HTTP_RANGE'])) {
                    list($a, $range) = explode("=", $_SERVER['HTTP_RANGE'], 2);
                    list($range) = explode(",", $range, 2);
                    list($range, $range_end) = explode("-", $range);
                    $range = intval($range);
                    if (!$range_end) {
                        $range_end = $size - 1;
                    } else {
                        $range_end = intval($range_end);
                    }


                    $new_length = $range_end - $range + 1;
                    header("HTTP/1.1 206 Partial Content");
                    header("Content-Length: $new_length");
                    header("Content-Range: bytes $range-$range_end/$size");
                } else {
                    $new_length = $size;
                    header("Content-Length: " . $size);
                }

                /* Will output the file itself */
                $chunksize = 1 * (1024 * 1024);
                $bytes_send = 0;
                if ($file = fopen($file, 'r')) {
                    if (isset($_SERVER['HTTP_RANGE']))
                        fseek($file, $range);

                    while (!feof($file) &&
                    (!connection_aborted()) &&
                    ($bytes_send < $new_length)
                    ) {
                        $buffer = fread($file, $chunksize);
                        print($buffer); //echo($buffer); // can also possible
                        flush();
                        $bytes_send += strlen($buffer);
                    }
                    fclose($file);
                } else
                //If no permissiion
                    die('Error - can not open file.');
                //die
                die();
            }

//Set the time out
            set_time_limit(0);
            $root = $_SERVER['DOCUMENT_ROOT'];
//path to the file
            $file_path = $root . '/archive/web/kycdocuments/' . $_REQUEST['filenamemain'];
            print($file_path);

//Call the download function with file path,file name and file type
            output_file($file_path, '' . $_REQUEST['filenamemain'] . '', 'text/plain');
            return $this->redirect(['documents', 'id' => $_GET['id']]);
        }
        $request = Yii::$app->request->post();
        if (!empty($request)) {

            $documentroot = $_SERVER['DOCUMENT_ROOT'];
            $getarchieveurl = $documentroot . 'archive/web';



            $sendingitemContentMod = md5(date('Y-m-d H:i:s') . rand(1111, 9999));

            if (isset($_FILES["files_input"])) {

                $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
                $max_file_size = 102400 * 100; //100 kb
                $path = "uploads/";
                $count = 0;
                if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

                    if ($_FILES['files_input']['name']) {
                        if ($_FILES['files_input']['error'] == 4) {
                            // continue; // Skip file if any error found
                        }
                        if ($_FILES['files_input']['error'] == 0) {
                            if ($_FILES['files_input']['size'] > $max_file_size) {
                                $message[] = "$name is too large!.";
                                //   continue; // Skip large files
                            } else { // No error found! Move uploaded files 
                                $filename = basename($_FILES['files_input']['name']);
                                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                                $new = $filename . $sendingitemContentMod . '.' . $extension;

                                $root = $_SERVER['DOCUMENT_ROOT'];


                                if (move_uploaded_file($_FILES['files_input']['tmp_name'], "{$root}/archive/web/kycdocuments/{$new}")) {
                                    //  copy("uploads/{$new}","{$root}/15bells/archive/web/uploadsthumbnails/{$new}");
                                    $UserKycdocuments = new \common\models\UserKycdocuments();
                                    $UserKycdocuments->userid = Yii::$app->user->identity->id;
                                    $UserKycdocuments->document_name = $new;
                                    $UserKycdocuments->file_type = $extension;
                                    $UserKycdocuments->docment_file_name = $filename;
                                    $UserKycdocuments->document_file_path = $root . '/archive/web/kycdocuments/';
                                    $UserKycdocuments->document_file_name_extenstn = $new;
                                    $UserKycdocuments->save();
                                }
                                //update status
                                $myprofilestatus = new \common\models\MyProfileProgressStatus();
                                $myprofilestatus->process_name = "my_KYC_upload";
                                $myprofilestatus->process_status = "100";
                                $myprofilestatus->user_id = Yii::$app->user->identity->id;

                                $myprofilestatus->role_id = 3;
                                $myprofilestatus->save();

                                $count++; // Number of successfully uploaded file
                            }
                        }
                    }
                }
            }
            if (isset($_GET['id'])) {
                $userid = $_GET['id'];
            } else {
                $userid = $UserKycdocuments->id;
            }


            return $this->redirect(['documentsold', 'id' => $userid]);
        } else {
            return $this->render('documentsold');
        }
    }

    public function actionView($id) {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "commonbank";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }

        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionBankdetails() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "newdashboard";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }
        $model = new \common\models\Bank();

        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request->post();
            $modelreq = $request['Bank'];
            $banknam3 = $modelreq['bank_name'];
            $accountno = $modelreq['account_no'];
            $isfcode = $modelreq['isfc_code'];
            $zipcode = $modelreq['zip_code'];
            $accounttpe = $modelreq['account_type'];
            $branchname = $modelreq['branch_name'];
            $branchaccntname = $modelreq['bank_accnt_name'];
            $userid = Yii::$app->user->identity->id;
            $model->user_id = $userid;
            $model->bank_name = $banknam3;
            $model->account_no = $accountno;
            $model->isfc_code = $isfcode;
            $model->zip_code = $zipcode;
            $model->account_type = $accounttpe;
            $model->branch_name = $branchname;
            $model->bank_accnt_name = $branchaccntname;
            $model->user_auth = "user";
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('bankdetails', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAddsubuser() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "dashboard";
        } else {

            $this->layout = "dashboard";  // common
        }
             $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {

//             echo '<pre>';print_r(Yii::$app->request->post());die;
            $user = $model->signup1();

            $userid = Yii::$app->user->identity->id;
            $subuserid = $user->id;

            $model1 = Company::find()
                    ->where(['userid' => $userid, 'isactive' => 1])
                    ->one();
            $companyid = $model1->id;

            $myprofilestatus = new \common\models\CompanyUsers();
            $myprofilestatus->admin_user_id = $userid;
            $myprofilestatus->company_id = $companyid;
            $myprofilestatus->subuser_id = $subuserid;

            $myprofilestatus->save();


            //print_r($user);die;
        }

        return $this->render('addsubuser', [
                    'model' => $model,
        ]);
    }

    public function actionShortlist() {
        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "commonlist";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }
        return $this->render('shortlist');
    }

    public function actionSettings() {

        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {

            $this->layout = "commonsettings";
        } else {

            $this->layout = "beforeprofilecomplete";  // common
        }

        return $this->render('settings');
    }

    protected function findModel($id) {
        if (($model = Bank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

