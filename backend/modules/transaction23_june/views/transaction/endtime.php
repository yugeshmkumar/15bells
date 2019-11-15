<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\transaction\models\Transaction;
/* @var $this yii\web\View */
/* @var $model backend\modules\transaction\models\Transaction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];

 $model =new Transaction();
 $id=$model->getWinnerid();
 
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-view" style="background-image: url(images/winner.jpg);height: 500px;">

    <a href="<?php echo $id; ?>" >  <h1 style="color:white;"><MARQUEE DIRECTION=LEFT>Winner is <?php echo $model->getWinner(); ?></MARQUEE></h1>
    </a>
</div>
