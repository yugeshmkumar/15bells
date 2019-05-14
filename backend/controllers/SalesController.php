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
	

}
