<?php
/**
 * Eugine Terentev <eugine@terentev.net>
 */

namespace backend\controllers;

use Yii;
use yii\caching\Cache;
use yii\caching\TagDependency;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\HttpException;
use yii\db\Query;
use common\models\CompanyEmp;



/**
 * Class CacheController
 * @package backend\controllers
 */
class SalesController extends Controller
{
    /**
     * @return string
     */
	 public $layout = "sales_layout";
    public function actionIndex()
    {
       
        return $this->render('index');
    }
	public function actionHead()
    {
       
        return $this->render('head');
    }
	public function actionDemand()
    {
       $this->layout = "sales_demand_layout";
        return $this->render('demand');
    }
	public function actionSupply()
    {
        $this->layout = "sales_supply_layout";
        return $this->render('supply');
    }
	public function actionSales_buying_supply()
    {
        $this->layout = "sales_buying_layout";
        return $this->render('sales_buying');
    }
	public function actionSales_leasing_supply()
    {
        $this->layout = "sales_leasing_layout";
        return $this->render('sales_leasing');
    }


    public function actionGetsalesdata($yes){

        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
        $assigned_id = $querys->id;
        
        $getclient = new Query;
        $getclient->select('*')
                    ->from('leadassignment_sales')
                    ->where(['assigned_toID' => $assigned_id]);
        $commands = $getclient->createCommand();
        $paymentsm = $commands->execute();

        $getclient1 = new Query;
        $getclient1->select('*')
                    ->from('shortlistproperty')
                    ->where(['assigned_id' => $assigned_id]);
        $commandshortlist = $getclient1->createCommand();
        $paymentshortlst = $commandshortlist->execute();


        $getclient2 = new Query;
        $getclient2->select('*')
                    ->from('request_site_visit')
                    ->where(['assigned_to_id' => $assigned_id]);
        $commandsitevisit = $getclient2->createCommand();
        $paymentsitevisit = $commandsitevisit->execute();

        $getclient3 = new Query;
        $getclient3->select('*')
                    ->from('request_site_visit')                        
                    ->where(['assigned_to_id' => $assigned_id])
                    ->groupBy('user_id');
        $commandsitevisitclient = $getclient3->createCommand();
        $paymentsitevisitclient = $commandsitevisitclient->execute();



        $getclient2 = new Query;
        $getclient2->select('*')
                    ->from('request_site_visit')
                    ->where(['assigned_to_id' => $assigned_id]);
        $commandsitevisit = $getclient2->createCommand();
        $paymentsitevisit = $commandsitevisit->execute();

        $getclient3 = new Query;
        $getclient3->select('*')
                    ->from('request_site_visit')                        
                    ->where(['assigned_to_id' => $assigned_id])
                    ->groupBy('user_id');
        $commandsitevisitclient = $getclient3->createCommand();
        $paymentsitevisitclient = $commandsitevisitclient->execute();
        

        $arr = array ( 
      
            // Every array will be converted 
            // to an object 
            array( 
                "year" => "Suspect", 
                "shortlist" => $paymentshortlst,
                "client"  => $paymentsm
            ), 
            array( 
                "year" => "Prospect", 
                "sitevisit" => $paymentsitevisit,
                "client"  => $paymentsitevisitclient
            ),
            array( 
                "year" => "Analyse", 
                "EMD" => $paymentshortlst,
                "F2F"=> 4,
                "client"  => $paymentsm
            ),
            array( 
                "year" => "Closure", 
                "EMD" => $paymentshortlst,
                "F2F"=> 4,
                "client"  => $paymentsm,
                "revenue"  => $paymentsm
            )
        ); 
          
        // Function to convert array into JSON 
        return json_encode($arr);


    }
	

}
