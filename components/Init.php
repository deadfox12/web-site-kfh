<?php
namespace app\components;

use yii\base\Component;
use yii\helpers\Url;

class Init extends \yii\base\Component {
    public function init() {
        if (\Yii::$app->getUser()->isGuest && (\Yii::$app->getRequest()->url != Url::to(\Yii::$app->getUser()->loginUrl)))
        {
            \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        parent::init();
    }
}