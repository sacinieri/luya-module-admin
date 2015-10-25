<?php

namespace admin\controllers;

use Yii;
use luya\helpers\Url;
use yii\helpers\Url as YiiUrl;

class DefaultController extends \admin\base\Controller
{
    public $disablePermissionCheck = true;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDashboard()
    {
        return $this->renderPartial('dashboard.php');
    }

    public function actionLogout()
    {
        Yii::$app->adminuser->logout();
        $url = YiiUrl::to(Url::to('admin/login/index'), true);

        return $this->redirect($url);
    }
    
    public function colorizeValue($value, $displayValue = false)
    {
        $text = ($displayValue) ? $value : 'AN';
        if ($value) {
            return '<span style="color:green;">' . $text . '</span>';
        }
        
        return '<span style="color:red;">Aus</span>';
    }
}
