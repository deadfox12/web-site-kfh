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
//     $('input[name="TimeSeriesForm[csvFile]"]').change(function(){
//         f = this.files[0];
//         csv_path = f.name;
//         console.log(csv_path);
//          $(this).closest('.browse-wrap').next('.upload-path').text(csv_path);
//     });
//
//      var data = [
//           {
//             x: arr_dates,
//             y: arr_values,
//             type: 'scatter'
//           }
//         ];
//         Plotly.newPlot('myDiv', data);
//     $.ajax({
//         url: '',
//         type: 'POST',
//         data: date,
//         success: function(){
//         var data = [
//           {
//             x: arr_dates,
//             y: arr_values,
//             type: 'scatter'
//           }
//         ];
//         Plotly.newPlot('myDiv', data);
//     },
//         error: function(){
//             alert('Error!');
//         }
//     });
//     return false;
// }
// );
// // var data = [
// //   {
// //     x: [],
// //     y: [],
// //     type: 'scatter'
// //   }
// // ];
// // Plotly.newPlot('myDiv', data);
Plotly.d3.csv('http://nash-kfh.loc/val_1.csv', function(err, rows){

  function unpack(rows, key) {
  return rows.map(function(row) { return row[key]; });
}


var trace1 = {
  type: "scatter",
  mode: "lines",
  name: 'AAPL High',
  x: unpack(rows, 'Date'),
  y: unpack(rows, 'Productivity'),
  line: {color: '#17BECF'}
}


var data = [trace1];

var layout = {
  title: 'Урожайность риса',
};

Plotly.newPlot('myDiv', data, layout);
})
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции

$this->registerJs($script, yii\web\View::POS_END)
?>

    <div class="row">
        <div class="col-md-6 col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">Добавить данные вручную</div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($model, 'date')->label('Даты')?>
                <?= $form->field($model, 'value')->label('Урожайность') ?>
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">Загрузить csv файл с данными</div>
                <div class="panel-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <?= $form->field($model, 'csvFile')->fileInput() ?>
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
            <?php ActiveForm::end() ?>
        </div>
        </div>
    </div>
        <div class="clearfix"></div>
<div class="container">
<div class="row">
<div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
</div>
</div>