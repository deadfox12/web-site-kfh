<?php

namespace app\controllers;

use Yii;
use app\models\VehicleAccessory;
use app\models\VehicleAccessorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VehicleAccessoryController implements the CRUD actions for VehicleAccessory model.
 */
class VehicleAccessoryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all VehicleAccessory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehicleAccessorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VehicleAccessory model.
     * @param integer $vehicle_id
     * @param integer $accessory_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($vehicle_id, $accessory_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($vehicle_id, $accessory_id),
        ]);
    }

    /**
     * Creates a new VehicleAccessory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VehicleAccessory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vehicle_id' => $model->vehicle_id, 'accessory_id' => $model->accessory_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VehicleAccessory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $vehicle_id
     * @param integer $accessory_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($vehicle_id, $accessory_id)
    {
        $model = $this->findModel($vehicle_id, $accessory_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vehicle_id' => $model->vehicle_id, 'accessory_id' => $model->accessory_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VehicleAccessory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $vehicle_id
     * @param integer $accessory_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($vehicle_id, $accessory_id)
    {
        $this->findModel($vehicle_id, $accessory_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VehicleAccessory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $vehicle_id
     * @param integer $accessory_id
     * @return VehicleAccessory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($vehicle_id, $accessory_id)
    {
        if (($model = VehicleAccessory::findOne(['vehicle_id' => $vehicle_id, 'accessory_id' => $accessory_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
