<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesByUser */

$this->title = 'Update Sales By User: ' . $model->sale_id;
$this->params['breadcrumbs'][] = ['label' => 'Sales By Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sale_id, 'url' => ['view', 'id' => $model->sale_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sales-by-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'products' => $products,
    ]) ?>

</div>
