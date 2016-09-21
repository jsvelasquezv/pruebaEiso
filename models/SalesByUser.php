<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_by_user".
 *
 * @property integer $sale_id
 * @property integer $user_id
 * @property string $sale_date
 * @property double $sale_value
 * @property string $city
 */
class SalesByUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_by_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sale_date', 'city', 'product_id'], 'required'],
            [['sale_id', 'user_id', 'product_id'], 'integer'],
            [['sale_date'], 'safe'],
            [['sale_value'], 'number', 'max' => 999999999],
            [['city'], 'string', 'max' => 100, 'min' => 4],
            [['quantity'], 'integer', 'min' => 1],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sale_id' => 'Sale ID',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'sale_date' => 'Sale Date',
            'sale_value' => 'Sale Value',
            'city' => 'City',
        ];
    }
}
