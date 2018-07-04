<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use kartik\grid\GridView as kartik;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Сельхозтехника');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить сельхозтехнику'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?php
   $gridColumns = [
       //['class' => 'yii\grid\SerialColumn'],
       'id',
       'title',
       //'type_id',
       'typeType',
       'reg_number',
       'fuel',
       //'accessoriesTitle',
   ];
    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'fontAwesome' => true,
    ]);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            //'type_id',
            'typeType',
            'reg_number',
            'fuel',
            //'accessoriesTitle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
