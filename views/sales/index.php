<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales By Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-by-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sales By User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sale_id',
            'user_id',
            'sale_date',
            'sale_value',
            'city',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
