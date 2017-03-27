<?php

/**
 * Created by PhpStorm.
 * User: zsh
 * Date: 17-3-2
 * Time: 下午6:25
 */

namespace backend\modules\routes\controllers;

use backend\controllers\BaseController;
use common\models\routes\Routes;
use common\components\Image;

class RoutesController extends BaseController
{
    public function actionIndex(){
        //$menus = Routes::find()->where(['del_flag' => DEL_FLAG_FALSE])->orderBy('hierarchy asc')->asArray()->all();
        $menus = parent::routes_loop(0);
        return $this->render('index', [
            'menus' => $menus,
        ]);
    }

    public function actionAdd(){
        $menus = parent::routes_loop(0);
        if($this->request->isPost){
            $params = $this->request->post();
            $_FILES['image']['name'] && $params['image'] = Image::upload($_FILES['image']);
            if(Routes::addRecord($params)){
                return $this->redirect(['index']);
            }
        }
        return $this->render('add', [
            'menus' => $menus,
        ]);
    }

    public function actionEdit($id){
        if($this->request->isPost){
            $params = $this->request->post();
            $_FILES['image']['name'] && $params['image'] = Image::upload($_FILES['image']);
            if(Routes::editRecord($id,$params)){
                return $this->redirect(['index']);
            }
        }
        $menus = parent::routes_loop(0);
        $model = Routes::findOne($id);
        return $this->render('edit', [
            'menus' => $menus,
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if(Routes::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }

    }
}