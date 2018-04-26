<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CultivatedFields */

$this->title = Yii::t('app', 'Добавить обработанное поле');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Обработанные поля'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivated-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
