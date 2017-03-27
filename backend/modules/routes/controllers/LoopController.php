<?php

/**
 * Created by PhpStorm.
 * User: zsh
 * Date: 17-3-2
 * Time: 下午6:25
 */

namespace backend\modules\routes\controllers;

use backend\controllers\BaseController;
use common\models\routes\Loop;
use common\models\routes\Routes;
use common\components\Image;

class LoopController extends BaseController
{
    public function actionIndex(){
        $name = $this->request->get('title');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Loop::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }

    public function actionAdd(){
        if($this->request->isPost){
            $params = $this->request->post();
            $params['add_time'] = $this->datetime;
            $params['edit_time'] = $this->datetime;
            $_FILES['image']['name'] && $params['image'] = Image::upload($_FILES['image']);
            if(Loop::addRecord($params)){
                return $this->redirect(['index']);
            }
        }
        return $this->render('add');
    }

    public function actionEdit($id){
        if($this->request->isPost){
            $params = $this->request->post();
            $params['edit_time'] = $this->datetime;
            $_FILES['image']['name'] && $params['image'] = Image::upload($_FILES['image']);
            if(Loop::editRecord($id,$params)){
                return $this->redirect(['index']);
            }
        }
        $model = Loop::findOne($id);
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if(Loop::delRecord($id)){
            return $this->redirect(['index']);
            //ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }

    }
}