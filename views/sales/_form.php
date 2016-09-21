<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SalesByUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-by-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'sale_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'sale_date')->textInput() ?> -->

    <?= 
        $form->field($model, 'sale_date')->widget(DatePicker::className(), [
        // 'attributeTo' => 'date_to', 
        // 'form' => $form, // best for correct client validation
        // 'language' => 'es',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
            ]
        ]);
    ?>

    <!-- <?= $form->field($model, 'sale_value')->textInput() ?> -->

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->dropDownList($products) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>


    <!-- <?= Html::activeDropDownList($model, 'product_id', $products) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
