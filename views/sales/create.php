<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesByUser */

$this->title = 'Create Sales By User';
$this->params['breadcrumbs'][] = ['label' => 'Sales By Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-by-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
