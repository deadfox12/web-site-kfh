<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TimeSeriesForm;

class TimeSeriesController extends Controller
{
    public function actionIndex()
    {
        $model = new TimeSeriesForm();
        $request = Yii::$app->request;
       if ($model->load($request->post())) {
           $chcp = 'chcp 65001';//кодировка в консоли Windows
           $and = '&';
           $pathPythonInterpreter = 'C:\Users\deadf\PycharmProjects\untitled2\venv\Scripts\python.exe';//путь до интерпретатора python
           $pathPythonScript = 'C:\Users\deadf\PycharmProjects\untitled2\tt.py';//путь до скрипта python
           $data = Yii::$app->request->post('TimeSeriesForm');
           $data = json_encode($data);
           //var_dump(json_encode($data));die();
           //$model->python = shell_exec(/*$chcp . $and . */$pathPythonInterpreter . ' ' . $pathPythonScript . ' 2>&1 ' . escapeshellarg((json_encode($data))));
           $model->python = shell_exec(/*$chcp . $and . */$pathPythonInterpreter . ' ' . $pathPythonScript . ' 2>&1 ' . $data);
           //var_dump($data);
           //var_dump(Yii::$app->request->post('TimeSeriesForm'));
           //return $this->render('index', ['model' => $model]);
//           var_dump($python, Yii::$app->request->post('TimeSeriesForm'));
           //echo $python;
        }
        return $this->render('index', ['model' => $model]);
    }
}