<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleAccessory */

$this->title = Yii::t('app', 'Update Vehicle Accessory: ' . $model->vehicle_id, [
    'nameAttribute' => '' . $model->vehicle_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Accessories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_id, 'url' => ['view', 'vehicle_id' => $model->vehicle_id, 'accessory_id' => $model->accessory_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vehicle-accessory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
