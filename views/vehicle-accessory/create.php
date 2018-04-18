<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VehicleAccessory */

$this->title = Yii::t('app', 'Create Vehicle Accessory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Accessories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-accessory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
