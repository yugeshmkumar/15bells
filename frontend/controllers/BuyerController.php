<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use mPDF;
use common\models\SaveSearch;

class BuyerController extends Controller {

    public function __construct($id, $module, $config = array()) {
            parent::__construct($id, $module, $config);
            $this->layout = "roleLayout";
        }
    public function actionIndex() {

        //    meta tags description starts here  

		$title =  \Yii::$app->view->title = '15Bells - Buy Commercial Property, Find and Search Best Deals';

		Yii::$app->view->registerMetaTag([
		'name' => 'viewport',			
		'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
		]);
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'We bet you will find the best commercial properties in Delhi, Gurgaon, Noida, Ghaziabad, Faridabad, and other NCR locations.'
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
        
            $model = new SaveSearch();

		 
        return $this->render('index',[
            'model' => $model,
        ]);
    } 

    public function actionBuyer() {
		$this->layout = "homeLayout"; 
        return $this->render('buyer');
    }

    public function actionSearchproperty() {
       return $this->render('searchproperty');
    }
	
	 public function actionMyescrow() {
        return $this->render('myescrow');
    }

    public function actionPrelogindetails(){

        echo '<pre>';print_r($_POST);die;

    }


    public function actionCreatepdf()
    {
        $this->layout = "homeLayout"; 

        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf'));
        $mpdf->Output();
        exit;
    }
    public function actionSamplepdf()
    {
        $mpdf = new mPDF;
       
        $mpdf->WriteHTML('hello world');
        $mpdf->SetWatermarkText('DRAFT');
        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;
        
        $mpdf->Output();
        exit;
    }


    public function actionSamplepdf1()
    {

       
        try {

           // require_once __DIR__ . '/../vendor/autoload.php';

         $mpdf = new mPDF;

      
        $mpdf->SetImportUse();
        
       // $mpdf->Thumbnail('sample.pdf', 4);
        $pagecount = $mpdf->SetSourceFile('pdfdocuments/registry.pdf');
        
        for ($i=1; $i<=$pagecount; $i++) {

                
                
                if($i % 2 != 0){

                    $import_page = $mpdf->ImportPage($i);
                    $mpdf->AddPage();
                $mpdf->UseTemplate($import_page);
                $mpdf->setFooter('{PAGENO}');
                //$mpdf->WriteHTML($pagecount);
                $mpdf->SetWatermarkText('CANCELLED',0.1);
                $mpdf->showWatermarkText = true;
                $mpdf->watermark_font = 'DejaVuSansCondensed';
                $mpdf->watermark_color = 'black';
                $mpdf->watermarkTextAlpha = 0.5;
                
                $mpdf->SetDisplayMode('fullpage');
                $mpdf->SetProtection(array(), 'admin', 'admin');
                }else{

                    $mpdf->AddPage();
                }
                
                
                
        }

        $mpdf->Output();
        //$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::FILE);

        
       //$tplId = $mpdf->ImportPage(2);
        //$mpdf->UseTemplate($tplId);

                // $import_page = $mpdf->ImportPage($pagecount);
                // $mpdf->UseTemplate($import_page);
                // $mpdf->WriteHTML('hello world');
                // $mpdf->SetVisibility('screenonly');
                // $mpdf->setFooter('{PAGENO}');
                // //$mpdf->WriteHTML($pagecount);
                // $mpdf->SetWatermarkText('CANCELLED');
                // $mpdf->showWatermarkText = true;
                // $mpdf->watermarkTextAlpha = 0.1;
                
                // $mpdf->Output();

               //$mpdf->SetProtection(array(), 'admin', 'admin');
        
         
        

    } catch (Exception $e) {
        throw new MpdfException($e->getMessage()); // Delete this line to return false on fail
        return false;
    }


    }


    public function actionForcedownloadpdf()
    {
        $mpdf = new mPDF();
        $mpdf->WriteHTML($this->renderPartial('mpdf'));
        $mpdf->SetWatermarkText('heloo demo',50,200,200,0,'PNG');
        $mpdf->SetWatermarkText = true;
        $mpdf->Output('MyPDF.pdf', 'D');
        exit;
    }

}
