<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-24
 * Time: 下午7:00
 */

namespace backend\modules\action\controllers;


use backend\controllers\BaseController;
use common\models\action\Left;

class LeftController extends BaseController
{
    public function actionIndex()
    {
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Left::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }
}