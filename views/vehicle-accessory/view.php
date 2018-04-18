<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleAccessory */

$this->title = $model->vehicle_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Accessories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-accessory-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'vehicle_id' => $model->vehicle_id, 'accessory_id' => $model->accessory_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'vehicle_id' => $model->vehicle_id, 'accessory_id' => $model->accessory_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'vehicle_id',
            'accessory_id',
        ],
    ]) ?>

</div>
