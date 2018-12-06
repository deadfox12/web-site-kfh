<?php
/**
 * Created by PhpStorm.
 * User: deadf
 * Date: 16.11.2018
 * Time: 15:21
 */

namespace app\api\controllers;


use yii\rest\ActiveController;

class FieldApiController extends ActiveController
{
    public $modelClass = 'app\models\Field';
}
