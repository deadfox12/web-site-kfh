<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VehicleType */

$this->title = Yii::t('app', 'Добавить тип сельхозтехники ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Тип сельхозтехники'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
