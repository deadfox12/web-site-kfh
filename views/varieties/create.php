<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Varieties */

$this->title = Yii::t('app', 'Добавить сорт');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Сорт'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="varieties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
