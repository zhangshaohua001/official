<?php
/**
 * Created by PhpStorm.
 * User: zsh
 * Date: 17-2-26
 * Time: 下午1:52
 */

namespace frontend\controllers;


use frontend\components\BaseController;

class CompanyController extends BaseController
{
    public function actionIndex(){

        return $this->render('index');
    }
}