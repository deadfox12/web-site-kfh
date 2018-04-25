<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CultivatedFields */
/* @var $form yii\widgets\ActiveForm */
//Фуу, получаю массив в представлении, надо бы перенести в контроллер
$selectedCrops = $model->id;
$arr=\app\models\Crops::find()->with('field')->asArray()->all();
//var_dump($arr);die();
$crops= \yii\helpers\ArrayHelper::map($arr,'id','field.title'/*\app\models\Field::find()->select('title')->where(['id' => 1])->one()*/);
$selectedPesticide = $model->id;
$arr1=\app\models\Pesticide::find()->all();
$pesticide= \yii\helpers\ArrayHelper::map($arr1,'id','title'/*\app\models\Field::find()->select('title')->where(['id' => 1])->one()*/);

?>

<div class="cultivated-fields-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'crops_id')->dropDownList(
        $crops,
        [
            'prompt' => '',
        ]
    ) ?>

    <?= $form->field($model, 'pesticide_id')->dropDownList(
        $pesticide,
        [
            'prompt' => '',
        ]
    ) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
