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



        $getclient4 = new Query;
        $getclient4->select('*')
                    ->from('request_emd')
                    ->where(['status' => 1])
                    ->andwhere(['assigned_to_id' => $assigned_id]);
        $commandemd = $getclient4->createCommand();
        $paymentemd = $commandemd->execute();

        $getclient5 = new Query;
        $getclient5->select('*')
                    ->from('request_emd')                        
                    ->where(['status' => 1])
                    ->andwhere(['assigned_to_id' => $assigned_id])
                    ->groupBy('user_id');
        $commandemdclient = $getclient5->createCommand();
        $paymentemdclient = $commandemdclient->execute();



        $getclient6 = new Query;
        $getclient6->select('*')
                    ->from('sales_f_2_f')
                    ->where(['status' => 'IN_PROGRESS'])
                    ->andwhere(['sales_executive_id' => $assigned_id]);
        $commandf2f = $getclient6->createCommand();
        $paymentf2f = $commandf2f->execute();

        $getclient7 = new Query;
        $getclient7->select('*')
                    ->from('sales_f_2_f') 
                    ->where(['status' => 'IN_PROGRESS'])                       
                    ->andwhere(['sales_executive_id' => $assigned_id])
                    ->groupBy('buyer_id');
        $commandf2fclient = $getclient7->createCommand();
        $paymentf2fclient = $commandf2fclient->execute();



        //  closure //



        $getclient8 = new Query;
        $getclient8->select('*')
                    ->from('request_emd')
                    ->where(['status' => 1])
                    ->andwhere(['payment_status' => 'paid'])
                    ->andwhere(['assigned_to_id' => $assigned_id]);
        $commandemdclose = $getclient8->createCommand();
        $paymentemdclose = $commandemdclose->execute();

        $getclient9 = new Query;
        $getclient9->select('*')
                    ->from('request_emd')                        
                    ->where(['status' => 1])
                    ->andwhere(['assigned_to_id' => $assigned_id])
                    ->groupBy('user_id');
        $commandemdclientclose = $getclient9->createCommand();
        $paymentemdclientclose = $commandemdclientclose->execute();



        $getclient10 = new Query;
        $getclient10->select('*')
                    ->from('sales_f_2_f')
                    ->where(['status' => 'COMPLETED'])
                    ->andwhere(['sales_executive_id' => $assigned_id]);
        $commandf2fclose = $getclient10->createCommand();
        $paymentf2fclose = $commandf2fclose->execute();

        $getclient11 = new Query;
        $getclient11->select('*')
                    ->from('sales_f_2_f') 
                    ->where(['status' => 'COMPLETED'])                       
                    ->andwhere(['sales_executive_id' => $assigned_id])
                    ->groupBy('buyer_id');
        $commandf2fclientclose = $getclient11->createCommand();
        $paymentf2fclientclose = $commandf2fclientclose->execute();
        

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
                "EMD" => $paymentemd,
                "F2F"=> $paymentf2f,
                "client"  => $paymentemdclient + $paymentf2fclient
            ),
            array( 
                "year" => "Closure", 
                "EMD" => $paymentemdclose,
                "F2F"=> $paymentf2fclose,
                "client"  => $paymentemdclientclose + $paymentf2fclientclose,
                "revenue"  => $paymentsm
            )
        ); 
          
        // Function to convert array into JSON 
        return json_encode($arr);


    }
	

}
