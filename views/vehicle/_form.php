<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Vehicle */
/* @var $form yii\widgets\ActiveForm */
//Фуу, получаю массив в представлении, надо бы перенести в контроллер
$selectedType =$model->type->id;
$types= ArrayHelper::map(\app\models\VehicleType::find()->all(),'id','type');
//$selectedWarehouse =$model->warehouse->id;
//$warehouses= ArrayHelper::map(\app\models\Warehouse::find()->all(),'id','type');
?>

<div class="vehicle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->dropDownList(
        $types,
        [
            'prompt' => 'Выбор типа техники',
        ]
    ) ?>

    <?= $form->field($model, 'accessory_ids')->dropDownList(\app\models\Accessory::listAll(), ['multiple' => true]) ?>

    <?= $form->field($model, 'reg_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fuel')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
