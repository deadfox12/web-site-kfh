<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Crops */
/* @var $form yii\widgets\ActiveForm */
$selectedfield = $model->id;
$arr=\app\models\Field::find()->all();
$fields= \yii\helpers\ArrayHelper::map($arr,'id','title');

$selectedvarieties = $model->id;
$arr1=\app\models\Varieties::find()->all();
$varieties= \yii\helpers\ArrayHelper::map($arr1,'id','title');
?>

<div class="crops-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'field_id')->dropDownList(
        $fields,
        [
            'prompt' => '',
        ]
    ) ?>

    <?= $form->field($model, 'varieties_id')->dropDownList(
        $varieties,
        [
            'prompt' => '',
        ]
    ) ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date')->widget(\kartik\date\DatePicker::className(),[
            'name' => 'dp_1',
            'type' => \kartik\date\DatePicker::TYPE_COMPONENT_PREPEND,
            'convertFormat' => true,
            'value'=> date("Y-d-m",(integer) $model->date),
            'pluginOptions' => [
                'format' => 'yyyy-MM-dd',
                'autoclose'=>true,
                'weekStart'=>1, //неделя начинается с понедельника
                'startDate' => '01.05.2015', //самая ранняя возможная дата
                'todayBtn'=>true, //снизу кнопка "сегодня"
            ]
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
