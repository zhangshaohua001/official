<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-24
 * Time: 下午3:13
 */

namespace backend\modules\article\controllers;


use yii;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\article\Beauty;
use yii\helpers\Url;
use yii\web\UploadedFile;

class BeautyController extends BaseController
{
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config'=>[
                    'imageManagerListPath'=>'/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                    'imageUrlPrefix' => 'http://official.com']
            ]
        ];
    }
    public function actionIndex()
    {
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Beauty::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }

    public function actionAdd()
    {
        $model=new Beauty();
        if (Yii::$app->request->isPost) {
            $name = $this->request->post();
            //var_dump($name);die;
            $model->file = UploadedFile::getInstance($model, 'file');
            //var_dump($model->file);
            //var_dump($this->request->post('name'));die;
            if ($model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension)) {
                // 文件上传成功
                return;
            }
        }

        /*if($this->request->isPost){
            $params = $this->request->post();
            $params['add_time'] = $this->datetime;
            $params['edit_time'] = $this->datetime;
            if(Beauty::addRecord($params)){
                return $this->redirect(['index']);
            }
        }*/
        return $this->render('add', ['model' => $model]);
    }

    public function actionEdit($id){
        if($this->request->isPost){
            $params = $this->request->post();
            $params['add_time'] = $this->datetime;
            $params['edit_time'] = $this->datetime;
            if(Beauty::editRecord($id,$params)){
                return $this->redirect(['index']);
            }
        }
        $model = Beauty::findOne($id);
        return $this->render('edit',[
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if(Beauty::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }

    }
}