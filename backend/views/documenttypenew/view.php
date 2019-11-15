<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Documenttypenew */
?>
<div class="documenttypenew-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'documenttypeID',
            'documentsconfig.documentType',
            'documentTypeName',
            'loginAsConfig.name',
        ],
    ]) ?>

</div>
