<?php

namespace backend\controllers;

use Yii;
use common\models\Leadrequest;
use common\models\Leads;
use common\models\LeadsSales;
use common\models\LeadcurrentstatusSales;
use common\models\LeadassignmentSales;
use common\models\LeadrequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LeadrequestController implements the CRUD actions for Leadrequest model.
 */
class LeadrequestController extends Controller {

  //  public $layout = "csr_layout";


    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
    
        
        if($assigndash->item_name == "sales_demand_lessee"){
		
		$this->layout="sales_supply_layout";
		
	}else if($assigndash->item_name == "sales_head"){
		
		$this->layout="sales_layout";
		
	}else if($assigndash->item_name == "sales_demand_buyer"){
		
		$this->layout="sales_demand_layout";		
	}
else if($assigndash->item_name == "sales_supply_seller"){
		
		$this->layout="sales_buying_layout";		
	}
else if($assigndash->item_name == "sales_supply_lessor"){
		
		$this->layout="sales_leasing_layout";		
    }
    else if($assigndash->item_name == "csr_supply"){
		
		$this->layout="csr_supply_layout";		
    }else if($assigndash->item_name == "csr_demand"){
		
		$this->layout="csr_demand_layout";		
	}
    else{

        $this->layout="csr_head_layout";
    }
}

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Leadrequest models.
     * @return mixed
     */
    public function actionAdddescr() {
        return $this->renderPartial('adddescr');
    }

    public function actionIndex() {
        $model = new \common\models\Leads(); // your model can be loaded here
        // Check if there is an Editable ajax request
        if (isset($_POST['hasEditable'])) {
            // use Yii's response format to encode output as JSON
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // read your posted model attributes
            if (isset($_POST['editableKey'])) {
                $reqid = $_POST['editableKey'];
                $editableIndex = $_POST['editableIndex'];
                $tagsdata = $_POST['Leads'][$editableIndex]['role_id'];
                $getrq = \common\models\Leads::find()->where(['id' => $reqid])->one();
                if ($getrq) {
                    $getrq->role_id = $tagsdata;
                    $getrq->save();
                }

                $value = $getrq->role_id;
                if ($value == '4') {
                    $nimb = 'Tenant';
                } else if ($value == '5') {
                    $nimb = 'Landlord';
                } else if ($value == '6') {
                    $nimb = 'Seller';
                } else {
                    $nimb = 'Buyer';
                }

                return ['output' => $nimb, 'message' => ''];



                // return JSON encoded output in the below format
                // alternatively you can return a validation error
                // return ['output'=>'', 'message'=>'Validation error'];
            }
            // else if nothing to do always return an empty JSON encoded output
            else {
                return ['output' => '', 'message' => 'not done'];
            }
        }



        return $this->render('index', [
        ]);
    }

    public function actionAllotedindex() {
        $model = new \common\models\Leads(); // your model can be loaded here
        // Check if there is an Editable ajax request
        if (isset($_POST['hasEditable'])) {
            // use Yii's response format to encode output as JSON
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // read your posted model attributes
            if (isset($_POST['editableKey'])) {
                $reqid = $_POST['editableKey'];
                $editableIndex = $_POST['editableIndex'];
                $tagsdata = $_POST['Leads'][$editableIndex]['role_id'];
                $getrq = \common\models\Leads::find()->where(['id' => $reqid])->one();
                if ($getrq) {
                    $getrq->role_id = $tagsdata;
                    $getrq->save();
                }

                $value = $getrq->role_id;
                if ($value == '4') {
                    $nimb = 'Tenant';
                } else if ($value == '5') {
                    $nimb = 'Landlord';
                } else if ($value == '6') {
                    $nimb = 'Seller';
                } else {
                    $nimb = 'Buyer';
                }

                return ['output' => $nimb, 'message' => ''];



                // return JSON encoded output in the below format
                // alternatively you can return a validation error
                // return ['output'=>'', 'message'=>'Validation error'];
            }
            // else if nothing to do always return an empty JSON encoded output
            else {
                return ['output' => '', 'message' => 'not done'];
            }
        }



        return $this->render('allotedindex', [
        ]);
    }

    public function actionScheduleaction() {

        $leadid = $_GET['leadid'];
        $toemail = $_GET['toemail'];
        $enddatetime = $_GET['enddatetime'];
        $startdatetime = $_GET['startdatetime'];
        $location = $_GET['location'];
        $subject = $_GET['subject'];
        $fromemail = $_GET['fromemail'];
        $message = $_GET['message'];

        $findleadrequest = \common\models\Leadrequestnew::find()->where(['leadRequestID' => $leadid])->one();
        if ($findleadrequest) {
            $findleadrequest->status = 3;
            $findleadrequest->save();
        }
        $arrfindallstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->all();
        foreach ($arrfindallstatus as $findallstatus) {
            $findallstatus->isactive = 0;
            $findallstatus->save();

            $newModel3 = new \common\models\Leadcurrentstatus();
            $newModel3->leadid = $leadid;
            $newModel3->productid = $findallstatus->productid;
            $newModel3->statusid = 2;
            $newModel3->leadactionstatus = 3;
            $newModel3->save();
        }

        $to = "$toemail";
        $subject = "$subject";
        $message = "$message.\r\n\r\n";
        $location = "$location";
//==================
        $headers .= "MIME-version: 1.0\r\n";
        $headers .= "Content-class: urn:content-classes:calendarmessage\r\n";
        $headers .= "Content-type: text/calendar; method=REQUEST; charset=UTF-8\r\n";
        $messaje = "BEGIN:VCALENDAR\r\n";
        $messaje .= "VERSION:2.0\r\n";
        $messaje .= "PRODID:PHP\r\n";
        $messaje .= "METHOD:REQUEST\r\n";
        $messaje .= "BEGIN:VEVENT\r\n";
        $messaje .= "DTSTART:20121223T171010Z\r\n";
        $messaje .= "DTEND:20121223T191010Z\r\n";
        $messaje .= "DESCRIPTION: You have registered for the class\r\n";
        $messaje .= "SUMMARY:Technical Training\r\n";
        $messaje .= "ORGANIZER; CN=\"Corporate\":mailto:jayashree.g@fugenx.com\r\n";
        $messaje .= "Location:" . $location . "\r\n";
        $messaje .= "UID:040000008200E00074C5B7101A82E00800000006FC30E6 C39DC004CA782E0C002E01A81\r\n";
        $messaje .= "SEQUENCE:0\r\n";
        $messaje .= "DTSTAMP:" . date('Ymd') . 'T' . date('His') . "\r\n";
        $messaje .= "END:VEVENT\r\n";
        $messaje .= "END:VCALENDAR\r\n";
        $message .= $message;
        mail($to, $subject, $message, $headers);



        return $this->render('index?status=2');
    }

    public function actionCreateanorder() {
        return $this->renderPartial('createanorder');
    }

    public function actionCreateanorderaction() {
        $leadid = $_GET['leadid'];
        $fromdate = $_GET['fromdate'];
        $todate = $_GET['todate'];
        $message = $_GET['message'];
        $getleadrequest = \common\models\Leadrequest::find()->where(['leadRequestID' => $leadid])->one();
        $Leadcurrentstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid, 'isactive' => 1])->one();
        $Leadsproduct = \common\models\Leadsproduct::find()->where(['id' => $Leadcurrentstatus->productid])->one();

        //add in order for finance
        $OrderCustomer = new \common\models\OrderCustomer();
        $OrderCustomer->leadID = $leadid;
        $OrderCustomer->productid = $Leadcurrentstatus->productid;
        $OrderCustomer->orderdesc = $message;
        $OrderCustomer->fromdate = $fromdate;
        $OrderCustomer->todate = $todate;
        $OrderCustomer->message = $message;
        $OrderCustomer->tempinvoiceno = $Leadcurrentstatus->productid . '00' . $leadid . 'INV-16';
        $OrderCustomer->companyid = $getleadrequest->company;
        $OrderCustomer->listedsaleprice = $Leadsproduct->currentvalue;
        $OrderCustomer->save();
        //add in projects
        $Project = new \common\models\Project();
        $Project->campaignname = $Leadsproduct->productname;
        $Project->leadid = $leadid;
        $Project->orderid = $OrderCustomer->id;
        $Project->productid = $Leadcurrentstatus->productid;
        $Project->orderrefnumber = $OrderCustomer->id . 'ODR';
        $Project->save();
        $findleadrequest = \common\models\Leadrequestnew::find()->where(['leadRequestID' => $leadid])->one();
        if ($findleadrequest) {
            $findleadrequest->status = 6;
            $findleadrequest->currentStatus = 3;
            $findleadrequest->save();
        }
        $arrfindallstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->all();
        foreach ($arrfindallstatus as $findallstatus) {
            $findallstatus->isactive = 0;
            $findallstatus->save();
        }
        $newModel3 = new \common\models\Leadcurrentstatus();
        $newModel3->leadid = $leadid;
        $newModel3->productid = $Leadcurrentstatus->productid;
        $newModel3->statusid = 3;
        $newModel3->leadactionstatus = 6;
        $newModel3->save();
        //to customer
        $subject = "Thank you for your interest";
        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear $findleadrequest->name ,<br> <p>
Thank you for accepting the proposal. We have initiated a project for the given details. Request if you may kindly send the purchase order to us or have the same uploaded to the system.
An order with reference number #XXXXXX has been created. The complete order can be viewed in the attachment here. 

</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";

        $to = "$findleadrequest->email";
        $this->SendHTMLMail($to, $subject, $content);

//to PM
        $subject = "New Project";
        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear Sir ,<br> <p>
A new project has been created. Kindly refer to the timelines and the tasks required for completing the order.

</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";
        $to = "sumit@encriss.com";
        $this->SendHTMLMail($to, $subject, $content);

//to Finance
        $subject = "New Order";
        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear accounts@encriss.com ,<br> <p>
A new order has been created. A PO from the customer is pending. Kindly login to the system to see the details.

</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";
        $to = "accounts@encriss.com";
        $this->SendHTMLMail($to, $subject, $content);


        return $this->renderPartial('createanorderaction');
    }

    public function actionSendreviseproposalaction() {
        $leadid = $_GET['leadid'];
        $findleadrequest = \common\models\Leadrequestnew::find()->where(['leadRequestID' => $leadid])->one();
        if ($findleadrequest) {
            $findleadrequest->status = 5;
            $findleadrequest->save();
        }
        $arrfindallstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->all();
        foreach ($arrfindallstatus as $findallstatus) {
            $findallstatus->isactive = 0;
            $findallstatus->save();

            $newModel3 = new \common\models\Leadcurrentstatus();
            $newModel3->leadid = $leadid;
            $newModel3->productid = $findallstatus->productid;
            $newModel3->statusid = 2;
            $newModel3->leadactionstatus = 5;
            $newModel3->save();
        }
        $subject = "Thank you for your interest";
        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear $findleadrequest->requestName ,<br> <p>
Dear Customer, The proposal for your request is attached with this email. Kindly go to the system on the link below and accept the proposal. We shall initiate the campaign installation as soon as you provide your approval.
</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";
        $to = "$findleadrequest->requestEmail";
        $this->SendHTMLMail($to, $subject, $content);

        return $this->render('sendreviseproposalaction');
    }

    public function actionSendproposalaction() {
        $leadid = $_GET['leadid'];
        $findleadrequest = \common\models\Leadrequestnew::find()->where(['leadRequestID' => $leadid])->one();
        if ($findleadrequest) {
            $findleadrequest->status = 4;
            $findleadrequest->save();
        }
        $arrfindallstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->all();
        foreach ($arrfindallstatus as $findallstatus) {
            $findallstatus->isactive = 0;
            $findallstatus->save();

            $newModel3 = new \common\models\Leadcurrentstatus();
            $newModel3->leadid = $leadid;
            $newModel3->productid = $findallstatus->productid;
            $newModel3->statusid = 2;
            $newModel3->leadactionstatus = 4;
            $newModel3->save();
        }
        $subject = "Thank you for your interest";

        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear $findleadrequest->requestName ,<br> <p>
Dear Customer, The proposal for your request is attached with this email. Kindly go to the system on the link below and accept the proposal. We shall initiate the campaign installation as soon as you provide your approval.
</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";

        $to = "$findleadrequest->requestEmail";
        $this->SendHTMLMail($to, $subject, $content);
        return $this->render('sendproposalaction');
    }

    public function actionFollowuponproposal() {
        return $this->renderPartial('followuponproposal');
    }

    public function actionAddproposal() {
        return $this->renderPartial('addproposal');
    }

    public function actionSchedule() {
        return $this->renderPartial('schedule');
    }

    public function actionAssignlead() {
        return $this->renderPartial('assignlead');
    }

    public function actionAssignleaddemand() {
        return $this->renderPartial('assignleaddemand');
    }

    public function actionAssignleadsales() {
        return $this->renderPartial('assignleadsales');
    }

    public function actionAssignleadsalessupply() {
        return $this->renderPartial('assignleadsalessupply');
    }

    public function actionAssignleadaccept() {
        return $this->renderPartial('assignleadaccept');
    }

    public function actionAddleaddetails() {
        $id = $_GET['id'];
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->leadRequestID]);
        } else {
            return $this->render('addleaddetails', [
                        'model' => $model,
            ]);
        }
    }

    public function actionCompanydetails() {
        return $this->renderPartial('companydetails');
    }

    public function actionProductdetails() {
        $id = $_GET['leadid'];
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->leadRequestID]);
        } else {
            return $this->renderPartial('productdetails', [
                        'model' => $model,
            ]);
        }
    }

    public function actionFordemo() {
        return $this->render('fordemo');
    }

    public function actionGrid() {
        $searchModel = new LeadrequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('grid', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSendcompleteemail() {

        return $this->renderPartial('sendcompleteemail');
    }

    /**
     * Displays a single Leadrequest model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Leadrequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Leadrequest();
        $model2 = new \common\models\Leadsproduct();
        $model3 = new \common\models\Company();
        $request = Yii::$app->request->post();
        if (!empty($request)) {
            $modelreq1 = $request['Leadrequest'];
            $modelreq2 = $request['Leadsproduct'];
            $modelreq3 = $request['Company'];


            $requestName = $modelreq1['requestName'];
            $requestEmail = $modelreq1['requestEmail'];
            $teleNo = $modelreq1['teleNo'];
            $dob = $modelreq1['dob'];
            $rquestMessage = $modelreq1['rquestMessage'];
            $sex = $modelreq1['sex'];


            $name = $modelreq3['name'];
            $description = $modelreq3['description'];
            $email1 = $modelreq3['email1'];
            $contact1 = $modelreq3['contact1'];
            $contact2 = $modelreq3['contact2'];
            $address = $modelreq3['address'];
            $location = $modelreq3['location'];
            $city = $modelreq3['city'];
            $country = $modelreq3['country'];
            $website = $modelreq3['website'];

            $productname = $modelreq2['productname'];
            $description = $modelreq2['description'];
            $producttype = $modelreq2['producttype'];
            $currentvalue = $modelreq2['currentvalue'];
            $location = $modelreq2['location'];
            $city = $modelreq2['city'];
            $country = $modelreq2['country'];




            $newModel = new Leadrequest();
            $newModel->requestName = $requestName;
            $newModel->requestEmail = $requestEmail;
            $newModel->teleNo = $teleNo;
            $newModel->dob = $dob;
            $newModel->rquestMessage = $rquestMessage;
            $newModel->currentStatus = 1;
            $newModel->leadQuality = 1;
            $newModel->sex = $sex;
            $newModel->save();

            $newModel1 = new \common\models\Leadsproduct();
            $newModel1->productname = $productname;
            $newModel1->description = $description;
            $newModel1->producttype = $producttype;
            $newModel1->currentvalue = $currentvalue;
            $newModel1->location = $location;
            $newModel1->city = $city;
            $newModel1->country = $country;
            $newModel1->save();

            $newModel2 = new \common\models\Company();
            $newModel2->name = $name;
            $newModel2->description = $description;
            $newModel2->email1 = $email1;
            $newModel2->website = $website;
            $newModel2->contact1 = $contact1;
            $newModel2->contact2 = $contact2;
            $newModel2->address = $address;
            $newModel2->location = $location;
            $newModel2->city = $city;
            $newModel2->country = $country;
            $newModel2->save();

            $getproductid = \common\models\Producttype::find()->where(['name' => $producttype])->one();
            $newModel->company = $newModel2->id;
            if ($getproductid->id == 2) {
                $newModel->color = "blue";
            }
            if ($getproductid->id == 3) {
                $newModel->color = "green";
            }
            if ($getproductid->id == 4) {
                $newModel->color = "yellow";
            }
            $newModel->appliedProductid = $getproductid->id;
            $newModel->save();

            $newModel3 = new \common\models\Leadcurrentstatus();
            $newModel3->leadid = $newModel->leadRequestID;
            $newModel3->productid = $newModel1->id;
            $newModel3->statusid = 1;
            $newModel3->leadactionstatus = 8;
            $newModel3->save();

            if ($model->load(Yii::$app->request->post())) {
                $subject = "Thank you for your interest";

                $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear $requestName ,<br> <p>
Thanks for your interest, we shall be in touch with you soon. You may also call us anytime at +91-98107-89998.
</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";

                $to = "$requestEmail";
                $this->SendHTMLMail($to, $subject, $content);
                return $this->redirect(['index?status=1'
                ]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'model2' => $model2,
                        'model3' => $model3,
            ]);
        }
    }

    /**
     * Updates an existing Leadrequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function SendHTMLMailtwo($to, $subject, $mailcontent, $cc, $from) {
        $limite = "_parties_" . md5(uniqid(rand()));

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
        $headers .= "To: $to\r\n";
        $headers .= 'From: $from' . "\r\n";
        $headers .= 'Cc: $cc' . "\r\n";
//$headers .= 'Bcc: ncritss@gmail.com' . "\r\n";

        mail($to, $subject, $mailcontent, $headers);
    }

    public function SendHTMLMail($to, $subject, $mailcontent) {
        $limite = "_parties_" . md5(uniqid(rand()));

        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
        $headers .= "To: $to\r\n";
        $headers .= 'From: 15bells<crm@15bells.com>' . "\r\n";
        $headers .= 'Cc: sgarg@encriss.com' . "\r\n";
        $headers .= 'Bcc: ncritss@gmail.com' . "\r\n";

        mail($to, $subject, $mailcontent, $headers);
    }

    public function actionSendcompletemail() {
        $leadid = $_GET['leadid'];
        $toemail = $_GET['toemail'];
        $ccemail = $_GET['ccemail'];
        $subject = $_GET['subject'];
        $fromemail = $_GET['fromemail'];
        $message = $_GET['message'];
        $findleadrequest = \common\models\Leadrequestnew::find()->where(['leadRequestID' => $leadid])->one();
        $subject = "A new lead has been assigned to you.";

        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear $toemail,<br> <p>
$message
</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";

        $to = "$toemail";
        $this->SendHTMLMailtwo($to, $subject, $content, $ccemail, $fromemail);

        return $this->render('sendcompletemail');
    }

    public function actionReverselead() {
        $leadid = $_GET['leadid'];
        $findleadrequest = \common\models\Leads::find()->where(['id' => $leadid])->one();

        $arrLeadcurrentstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->all();
        foreach ($arrLeadcurrentstatus as $Leadcurrentstatus) {
            $Leadcurrentstatus->isactive = 0;
            $Leadcurrentstatus->save();
        }
        $leadoldcurrentstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->one();
        $Leadcurrentnewstatus = new \common\models\Leadcurrentstatus();
        $Leadcurrentnewstatus->leadid = $leadid;
        if ($leadoldcurrentstatus) {
            $Leadcurrentnewstatus->role_id = $leadoldcurrentstatus->role_id;
        }
        $Leadcurrentnewstatus->statusid = 1;
        $Leadcurrentnewstatus->leadactionstatus = 8;
        $Leadcurrentnewstatus->save();
        $subject = "Request Accepted";

        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear $findleadrequest->name ,<br> <p>
Your request has been accepted.
</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";

        $to = "$findleadrequest->email";
        $this->SendHTMLMail($to, $subject, $content);
        return true;
    }

    public function actionRejectleadaction() {
        $leadid = $_GET['leadid'];
        $findleadrequest = \common\models\Leads::find()->where(['id' => $leadid])->one();

        $arrLeadcurrentstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->all();
        foreach ($arrLeadcurrentstatus as $Leadcurrentstatus) {
            $Leadcurrentstatus->isactive = 0;
            $Leadcurrentstatus->save();
        }
        $leadoldcurrentstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadid])->one();
        $Leadcurrentnewstatus = new \common\models\Leadcurrentstatus();
        $Leadcurrentnewstatus->leadid = $leadid;

        $Leadcurrentnewstatus->statusid = 4;
        $Leadcurrentnewstatus->leadactionstatus = 7;
        $Leadcurrentnewstatus->save();
        $subject = "Request Rejected";

        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear $findleadrequest->name ,<br> <p>
We regret to inform that we are unable to help you with your request at this point. We shall be eager to serve you in future and would update you as soon as we have service in your area.
</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";

        $to = "$findleadrequest->email";
        $this->SendHTMLMail($to, $subject, $content);
        return true;
    }

    public function actionAssignleadacceptactn() {
		 $message = $_GET['message'];
//		 if($status == 1){
//			 $mvstatus = 2;
//		 }
//		 if($status == 2){
//			 $mvstatus = 3;
//		 }
//		 
//		 $leadid = $_GET['leadid'];
//		 $arrfindallstatus = \common\models\Leadcurrentstatus::find()->where(['leadid'=>$leadid])->all();
//			foreach($arrfindallstatus as $findallstatus){
//			$findallstatus->isactive=0;
//			$findallstatus->save();
//			}
//			$newModel3 = new \common\models\Leadcurrentstatus();
//				$newModel3->leadid =$leadid;
//				$newModel3->role_id=3;
//				$newModel3->statusid=$mvstatus;
//				$newModel3->leadactionstatus=1;
//			    $newModel3->save();

        $leadid = $_GET['leadid'];

        $Assignleadtoemployee = \common\models\Leadassignment::find()->where(['leadid' => $leadid, 'isactive' => 1])->one();        
        $Assignleadtoemployee->comments = $message;
        $Assignleadtoemployee->save();



        $arrfindallstatus = \common\models\Leads::find()->where(['id' => $leadid])->one();

        $arrfindallstatus->move_to_alloted = 2;
        $arrfindallstatus->save();



        return true;
    }

    public function actionAssignleadreject() {
        return $this->renderPartial('assignleadreject');
    }

    public function actionAssignleadaction() {

        $employee = $_GET['employeeid'];
        $leadid = $_GET['leadid'];
        $meaasge = $_GET['message'];
        $Assignleadtoemployee = \common\models\Leadassignment::find()->where(['leadid' => $leadid, 'isactive' => 1])->one();
        $Assignleadtoemployee->old_assigned_to = $Assignleadtoemployee->assigned_toID;
        $Assignleadtoemployee->save();
        $Assignleadtoemployee->assigned_toID = $employee;
        $Assignleadtoemployee->reassigned_at = date('Y-m-d h:i:s');
        $Assignleadtoemployee->comments = $meaasge;
        $Assignleadtoemployee->save();

        $changeleadstatus = \common\models\Leads::find()->where(['id' => $leadid])->one();
        $changeleadstatus->move_to_alloted = 2;
        $changeleadstatus->save();


        $employeedetails = \common\models\Employee::find()->where(['idEmployee' => $employee])->one();
        $subject = "A new lead has been assigned to you.";

        $content = " <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='48%'><a href='http://www.encriss.com' title='15Bells'>
    <img src='../web/img/logo.png' width='96' height='85' longdesc='http://www.encriss.com' /></a></td></tr> </table>

<br><br> <div align='center'> <table width='52%' border='0' cellspacing='0' cellpadding='0'> <tr> <td width='81%'>Dear info@encriss.com ,<br> <p>
A new lead has been assigned to you. Kindly follow up as soon as possible.
</p>  </td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
  
 <br> <br><br>

</td> </tr> <tr> <td>&nbsp;</td> </tr> </table> </div> <br><br>
 ";

        $to = "info@encriss.com";
        $this->SendHTMLMail($to, $subject, $content);
    }

    public function actionAssignleadsalesaction() {

        $employee = $_GET['employeeid'];
        $leadid = $_GET['leadid'];
        $meaasge = $_GET['message'];


        $changeleadstatus = \common\models\Leads::find()->where(['id' => $leadid])->one();
        $changeleadstatus->move_to_alloted = 3;
        $changeleadstatus->save();
        $user_id = $changeleadstatus->user_id;
        $email = $changeleadstatus->email;
        $location = $changeleadstatus->location;
        $role_id = $changeleadstatus->role_id;
        $name = $changeleadstatus->name;
        $number = $changeleadstatus->number;
        $user_id = $changeleadstatus->user_id;

        $changeleadstatus1 = \common\models\SaveSearches::find()->where(['user_id' => $user_id])->orderBy(['id' => SORT_DESC])->limit(1)->one();

        if ($changeleadstatus1) {
            $searchid = $changeleadstatus1->id;
        } else {
            $searchid = 0;
        }

        
        $Assignleadtoemployee1 = new LeadsSales;
        $Assignleadtoemployee1->user_id = $user_id;
        $Assignleadtoemployee1->lead_id = $leadid;
        $Assignleadtoemployee1->email = $email;
        $Assignleadtoemployee1->location = $location;
        $Assignleadtoemployee1->role_id = $role_id;
        $Assignleadtoemployee1->name = $name;
        $Assignleadtoemployee1->number = $number;
        $Assignleadtoemployee1->product_id = $searchid;
        $Assignleadtoemployee1->save();

        
        $Assignleadtoemployee2 = new LeadcurrentstatusSales;
        $Assignleadtoemployee2->leadid = $Assignleadtoemployee1->id;
        $Assignleadtoemployee2->role_id = $role_id;
        $Assignleadtoemployee2->statusid = '1';
        $Assignleadtoemployee2->leadactionstatus = '8';
        $Assignleadtoemployee2->save();

        
        $getsecondlastid = LeadsSales::find()->orderBy(['id' => SORT_DESC])->offset(1)->one();
        $olduser_id = $getsecondlastid->user_id;
        
        if($olduser_id === $user_id){
            $lastassigmentid = LeadassignmentSales::find()->where(['leadid' => $getsecondlastid->id])->one();
            $oldassigned_toID = $lastassigmentid->assigned_toID;
            
            $Assignleadtoemployee3 = new LeadassignmentSales;
            $Assignleadtoemployee3->leadid = $Assignleadtoemployee1->id;
            $Assignleadtoemployee3->lead_current_status_ID = $Assignleadtoemployee2->id;
            $Assignleadtoemployee3->assigned_toID = $oldassigned_toID;
            $Assignleadtoemployee3->assigned_at = date('Y-m-d h:i:s');
            $Assignleadtoemployee3->save();
            
            $changeleadstatusemployee = \common\models\CompanyEmp::find()->where(['id' => $employee])->one();
            $changeleadstatusemployee->alloted = 0;
            $changeleadstatusemployee->save();

         //$sitevisitallot = \common\models\RequestSiteVisitbin::find()->where(['user_id' => $user_id,'lead_id'=>$leadid])->one();
            //$sitevisitallot->assigned_to_id = $oldassigned_toID;
            //$sitevisitallot->save(false);

            
            
        }else{
        $Assignleadtoemployee3 = new LeadassignmentSales;
        $Assignleadtoemployee3->leadid = $Assignleadtoemployee1->id;
        $Assignleadtoemployee3->lead_current_status_ID = $Assignleadtoemployee2->id;
        $Assignleadtoemployee3->assigned_toID = $employee;
        $Assignleadtoemployee3->assigned_at = date('Y-m-d h:i:s');
        $Assignleadtoemployee3->save();

       // $sitevisitallot = \common\models\RequestSiteVisitbin::find()->where(['user_id' => $user_id,'lead_id'=>$leadid])->one();
           // $sitevisitallot->assigned_to_id = $employee;
           // $sitevisitallot->save(false);
             }


             
    }



















    public function actionUpdate($id) {
        $id = $_GET['id'];
        $model = $this->findModel($id);
        $getcompanyid = \common\models\Leadcurrentstatus::find()->where(['leadid' => $id, 'isactive' => 1])->one();
        $leadRequestID = \common\models\Leads::find()->where(['leadRequestID' => $id])->one();
        $newModel1 = \common\models\Leadsproduct::find()->where(['id' => $getcompanyid->productid])->one();
        $newModel2 = \common\models\Company::find()->where(['id' => $leadRequestID->company])->one();
        $model2 = $this->findModel1($getcompanyid->productid);
        $model3 = $this->findModel2($leadRequestID->company);

        $request = Yii::$app->request->post();
        if (!empty($request)) {
            $modelreq1 = $request['Leadrequest'];
            $modelreq2 = $request['Leadsproduct'];
            $modelreq3 = $request['Company'];


            $requestName = $modelreq1['requestName'];
            $requestEmail = $modelreq1['requestEmail'];
            $teleNo = $modelreq1['teleNo'];
            $dob = $modelreq1['dob'];
            $rquestMessage = $modelreq1['rquestMessage'];
            $sex = $modelreq1['sex'];


            $name = $modelreq3['name'];
            $description = $modelreq3['description'];
            $email1 = $modelreq3['email1'];
            $website = $modelreq3['website'];
            $contact1 = $modelreq3['contact1'];
            $contact2 = $modelreq3['contact2'];
            $address = $modelreq3['address'];
            $location = $modelreq3['location'];
            $city = $modelreq3['city'];
            $country = $modelreq3['country'];

            $productname = $modelreq2['productname'];
            $description = $modelreq2['description'];
            $producttype = $modelreq2['producttype'];
            $currentvalue = $modelreq2['currentvalue'];
            $location = $modelreq2['location'];
            $city = $modelreq2['city'];
            $country = $modelreq2['country'];





            $leadRequestID->requestName = $requestName;
            $leadRequestID->requestEmail = $requestEmail;
            $leadRequestID->teleNo = $teleNo;
            $leadRequestID->dob = $dob;
            $leadRequestID->rquestMessage = $rquestMessage;
            $leadRequestID->currentStatus = 2;
            $leadRequestID->leadQuality = 1;
            $leadRequestID->sex = $sex;

            $leadRequestID->status = 1;
            $leadRequestID->save();


            $newModel1->productname = $productname;
            $newModel1->description = $description;
            $newModel1->producttype = $producttype;
            $newModel1->currentvalue = $currentvalue;
            $newModel1->location = $location;
            $newModel1->city = $city;
            $newModel1->country = $country;
            $newModel1->save();


            $newModel2->name = $name;
            $newModel2->description = $description;
            $newModel2->email1 = $email1;
            $newModel2->contact1 = $contact1;
            $newModel2->contact2 = $contact2;
            $newModel2->address = $address;
            $newModel2->location = $location;
            $newModel2->website = $website;
            $newModel2->city = $city;
            $newModel2->country = $country;
            $newModel2->save();

            $getproductid = \common\models\Producttype::find()->where(['name' => $producttype])->one();
            $leadRequestID->company = $newModel2->id;
            if ($getproductid->id == 2) {
                $leadRequestID->color = "blue";
            }
            if ($getproductid->id == 3) {
                $leadRequestID->color = "green";
            }
            if ($getproductid->id == 4) {
                $leadRequestID->color = "yellow";
            }
            $leadRequestID->appliedProductid = $getproductid->id;
            $leadRequestID->save();
            $arrfindallstatus = \common\models\Leadcurrentstatus::find()->where(['leadid' => $leadRequestID->leadRequestID])->all();
            foreach ($arrfindallstatus as $findallstatus) {
                $findallstatus->isactive = 0;
                $findallstatus->save();
            }
            $newModel3 = new \common\models\Leadcurrentstatus();
            $newModel3->leadid = $leadRequestID->leadRequestID;
            $newModel3->productid = $newModel1->id;
            $newModel3->statusid = 2;
            $newModel3->leadactionstatus = 1;
            $newModel3->save();

            if ($model->load(Yii::$app->request->post())) {
                return $this->redirect(['index?status=1'
                ]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'model2' => $model2,
                        'model3' => $model3,
            ]);
        }
    }

    /**
     * Deletes an existing Leadrequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leadrequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Leadrequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id) {
        
        if (($model = \common\models\Leads::findOne($id)) !== null) {
            
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModel1($id) {
        if (($model2 = \common\models\Leads::findOne($id)) !== null) {
            return $model2;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModel2($id) {
        if (($model3 = \common\models\Company::findOne($id)) !== null) {
            return $model3;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

