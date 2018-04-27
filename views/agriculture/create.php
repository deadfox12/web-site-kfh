<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Agriculture */

$this->title = Yii::t('app', 'Добавить агрокультуру');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Агрокультура'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agriculture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
