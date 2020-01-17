<?php

namespace frontend\controllers;


use Yii;
use common\models\ContactUs;
use common\models\ContactUsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\HtmlPurifier;

/**
 * ContactUsController implements the CRUD actions for ContactUs model.
 */
class ContactUsController extends Controller
{
    /**
     * @inheritdoc
     */

    // public function __construct($id, $module, $config = array()) {
    //     parent::__construct($id, $module, $config);
    //     $this->layout = "homeLayout";
    // }


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ContactUs models.
     * @return mixed
     */
    public function actionIndex() {
		
		$this->layout = "homeLayout";
           //    meta tags description starts here  

		$title =  \Yii::$app->view->title = '15Bells - Contact us for all your property deals';

		
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'Our team at the backend is all set you to guide you through your real estate buying cycle. Help us with your contact details and we will get back to you as soon as possible.'
		]);
		Yii::$app->view->registerMetaTag([
		'name' => 'author',			
		'content' => '15Bells'
		]);
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',			
            'content' => 'index, follow'
            ]);

		//  og tags 

		Yii::$app->view->registerMetaTag([
		'property' => 'og:title',			
		'content' => $title
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:type',			
		'content' => 'website'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:url',			
		'content' => 'https://www.15bells.com'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:image',			
		'content' => 'https://staging.15bells.com/newimg/logo.png'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:description',			
		'content' => 'Strive to create a transparent and safe place for swift real estate transactions with disruptive technology.'
		]);
	
		//    meta tags description ends here  


                    return $this->render('index');
                
			}
			

	public function actionEnquiry(){

		$this->layout = "homeLayout_new";
		$model = new ContactUs();

		return $this->render('enquiry',[
			'model' => $model,
			
		]);
	}		


    
	public function actionSendcontact()
	{
       
		// echo '<pre>';print_r($_POST);die;
		$role_name = HtmlPurifier::process($_POST['ContactUs']['role_name'][0]);
		$day_noon = HtmlPurifier::process($_POST['ContactUs']['day_noon']);
		$fullname = HtmlPurifier::process($_POST['ContactUs']['full_name']);
		$email = HtmlPurifier::process($_POST['ContactUs']['email']);
		$number = HtmlPurifier::process($_POST['ContactUs']['contact_number']);
		$message = HtmlPurifier::process($_POST['ContactUs']['message']);
		
		$sentmail = \common\models\ContactUs::send_email_to_contact($role_name,$day_noon,$fullname,$email,$number,$message);
                
if($sentmail){
   return 1;
}else{
    return 2;
}
		
    }
    
    
    protected function findModel($id)
    {
        if (($model = ContactUs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
