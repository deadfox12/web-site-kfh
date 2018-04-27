<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Varieties */
/* @var $form yii\widgets\ActiveForm */
$selectedAgricultures = $model->id;
$agricultures = \yii\helpers\ArrayHelper::map(\app\models\Agriculture::find()->all(),'id','title');
?>

<div class="varieties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agriculture_id')->dropDownList(
        $agricultures,
        [
            'prompt' => '',
        ]
    ) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productivity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
