<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Crops */

$this->title = Yii::t('app', 'Добавить посев');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Посевы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="crops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>