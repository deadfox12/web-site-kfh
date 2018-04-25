<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CultivatedFields */

$this->title = Yii::t('app', 'Create Cultivated Fields');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cultivated Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cultivated-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
