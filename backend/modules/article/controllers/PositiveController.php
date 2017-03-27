<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-24
 * Time: 下午3:14
 */

namespace backend\modules\article\controllers;


use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\article\Positive;
use yii\helpers\Url;

class PositiveController extends BaseController
{
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config'=>[
                    'imageManagerListPath'=>'/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                    'imageUrlPrefix' => 'http://admin.blog.com']
            ]
        ];
    }
    public function actionIndex()
    {
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Positive::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }

    public function actionAdd()
    {
        if($this->request->isPost){
            $params = $this->request->post();
            $params['add_time'] = $this->datetime;
            $params['edit_time'] = $this->datetime;
            if(Positive::addRecord($params)){
                return $this->redirect(['index']);
            }
        }
        return $this->render('add');
    }

    public function actionEdit($id){
        if($this->request->isPost){
            $params = $this->request->post();
            $params['edit_time'] = $this->datetime;
            if(Positive::editRecord($id,$params)){
                return $this->redirect(['index']);
            }
        }
        $model = Positive::findOne($id);
        return $this->render('edit',[
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if(Positive::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }

    }
}