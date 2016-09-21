<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesByUser */

$this->title = 'Create Sales By User';
$this->params['breadcrumbs'][] = ['label' => 'Sales By Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-by-user-create">
    <?php if(Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('error') ?>
            </div>
    <?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'products' => $products,
    ]) ?>

</div>
