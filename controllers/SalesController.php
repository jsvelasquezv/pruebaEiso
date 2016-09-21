<?php

namespace app\controllers;

use Yii;
use app\models\SalesByUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use app\models\Products;

/**
 * SalesController implements the CRUD actions for SalesByUser model.
 */
class SalesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'acces' => [
                'class' => AccessControl::classname(),
                'only' => ['create', 'update', 'view', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SalesByUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SalesByUser::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SalesByUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SalesByUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new SalesByUser();
        $user_id = Yii::$app->user->identity->user_id;
        $model->user_id = $user_id;
        $products = ArrayHelper::map(Products::find()->all(), 'product_id', 'name');
        $params = [];
        $product = [];
        if (Yii::$app->request->post()) {

            $params = Yii::$app->request->post('SalesByUser');
            $quantity = $params['quantity'];
            $product = Products::find()->where(['product_id'=>$params['product_id']])->one();

            if ($product->stock < $quantity) {
                Yii::$app->getSession()->setFlash('error', 'Insufficient stock');
                return $this->render('create', [
                    'model' => $model,
                    'products' => $products,
                ]);
            } else {
                $model->quantity = $quantity;
                $model->sale_value = $product->price * $quantity;
                $model->load(Yii::$app->request->post());
                $product->stock = $product->stock - $quantity;
                $model->save();
                $product->save();
                if ($model->save() && $product->save()) {
                return $this->redirect(['view', 'id' => $model->sale_id]);
                }
            }

        
        } else {
            return $this->render('create', [
                'model' => $model,
                'products' => $products,
            ]);
        }
    }

    /**
     * Updates an existing SalesByUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $products = ArrayHelper::map(Products::find()->all(), 'product_id', 'name');

        $params = [];
        $product = [];
        if (Yii::$app->request->post()) {

            $params = Yii::$app->request->post('SalesByUser');
            $quantity = $params['quantity'];
            $product = Products::find()->where(['product_id'=>$params['product_id']])->one();

            if ($product->stock < $quantity) {
                Yii::$app->getSession()->setFlash('error', 'Insufficient stock');
                return $this->render('create', [
                    'model' => $model,
                    'products' => $products,
                ]);
            } else {
                $model->quantity = $quantity;
                $model->sale_value = $product->price * $quantity;
                $model->load(Yii::$app->request->post());
                $product->stock = $product->stock - $quantity;
                $model->save();
                $product->save();
                if ($model->save() && $product->save()) {
                return $this->redirect(['view', 'id' => $model->sale_id]);
                }
            }

        } else {
            return $this->render('update', [
                'model' => $model,
                'products' => $products,
            ]);
        }
    }

    /**
     * Deletes an existing SalesByUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SalesByUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SalesByUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SalesByUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
