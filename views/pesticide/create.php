<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pesticide */

$this->title = Yii::t('app', 'Добавить химическое средство');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Химические средства'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesticide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
