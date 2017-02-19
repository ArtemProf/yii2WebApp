<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 15:27
 */

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return 'Our crm';
    }
}