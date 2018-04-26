<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Accessory */

$this->title = Yii::t('app', 'Добавить оборудование');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Навесное оборудование'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
