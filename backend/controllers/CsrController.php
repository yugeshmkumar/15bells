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
class CsrController extends Controller
{
    /**
     * @return string
     */
	 public $layout = "csr_head_layout";
    public function actionIndex()
    {
       
        return $this->render('index');
    }
	public function actionLms()
    {
       
        return $this->render('lms');
    }
	public function actionDemand_index()
    {
       $this->layout = "csr_demand_layout";
        return $this->render('demand_index');
    }
	public function actionSupply_index()
    {
        $this->layout = "csr_supply_layout";
        return $this->render('supply_index');
    }
	

    
}
