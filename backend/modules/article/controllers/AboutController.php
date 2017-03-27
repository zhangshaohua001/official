<?php

namespace backend\modules\article\controllers;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\article\About;
use yii\helpers\Url;

class AboutController extends BaseController
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
        $info = About::getAll($name,$pageSize);
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
            if(About::addRecord($params)){
                return $this->redirect(['index']);
            }
        }
        return $this->render('add');
    }

    public function actionEdit($id){
        if($this->request->isPost){
            $params = $this->request->post();
            if(About::editRecord($id,$params)){
                return $this->redirect(['index']);
            }
        }
        $model = About::findOne($id);
        return $this->render('edit',[
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if(About::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }
    }
    
    public function actionInfo($id)
    {
        $model = About::findOne($id);
        return $this->render('info',[
            'model' => $model,
        ]);
    }
    
    
}