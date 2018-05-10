<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

    $this->title = 'Построение временных рядов';
    $this->registerJsFile('https://cdn.plot.ly/plotly-latest.min.js', ['position' => yii\web\View::POS_HEAD]);
$script = <<< JS
//Функция отправки данных из формы через AJAX
// $('form').on('beforeSubmit', function(){
//     date = $('input[name="TimeSeriesForm[date]"]').val();
//     arr_dates = date.split(',');//Заносим даты из формы в массив
//     value = $('input[name="TimeSeriesForm[value]"]').val();
//     arr_values = value.split(',');//Заносим значения из формы в массив
//      console.log(arr_dates,arr_values);
//      var data = [
//           {
//             x: arr_dates,
//             y: arr_values,
//             type: 'scatter'
//           }
//         ];
//         //Plotly.newPlot('myDiv', data);
//     // $.ajax({
//     //     url: '',
//     //     type: 'POST',
//     //     data: date,
//     //     success: function(){
//     //     var data = [
//     //       {
//     //         x: arr_dates,
//     //         y: arr_values,
//     //         type: 'scatter'
//     //       }
//     //     ];
//     //     Plotly.newPlot('myDiv', data);
//     // },
//     //     error: function(){
//     //         alert('Error!');
//     //     }
//     // });
//     return false;
// }
// );
// var data = [
//   {
//     x: date,
//     y: value,
//     type: 'scatter'
//   }
// ];
//Plotly.newPlot('myDiv', data);
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_END);
?>
<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'date') ?>
<?= $form->field($model, 'value') ?>
<?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
<?php var_dump($model->python)?>
<div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>