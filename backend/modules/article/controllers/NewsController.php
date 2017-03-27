<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-24
 * Time: 下午3:13
 */

namespace backend\modules\article\controllers;

use common\components\Image;
use common\models\routes\Routes;
use yii;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\article\News;
use yii\helpers\Url;

class NewsController extends BaseController
{
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config'=>[
                    'imageManagerListPath'=>'/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}',
                    'imageUrlPrefix' => MPS_URL]
            ]
        ];
    }
    public function actionIndex()
    {
        $name = $this->request->get('title');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = News::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }

    public function actionAdd()
    {
        $model = new News();
        $list = Routes::getAll();
        if($this->request->isPost){
            $params = $this->request->post();
            if(empty($params['title'])) {
                ShowMessage::info("新闻标题不能为空!", Url::toRoute('add'));
            }

            if(empty($_FILES['image']['name'])) {
                ShowMessage::info("图片不能为空", Url::toRoute('add'));
            }
            $params['add_time'] = $this->datetime;
            $params['edit_time'] = $this->datetime;
            $_FILES['image']['name'] && $params['image'] = Image::upload($_FILES['image']);

//            $model->file = UploadedFile::getInstance($model, 'file');
//            $params['image'] = 'uploads/'.$model->file->baseName . '.' . $model->file->extension;
            //if($model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension)){
            if(News::addRecord($params)){
                return $this->redirect(['index']);
            }
        }
        return $this->render('add', ['model' => $model,'list'=>$list]);
    }

    public function actionEdit($id){
        if($this->request->isPost){
            $params = $this->request->post();
            $params['add_time'] = $this->datetime;
            $params['edit_time'] = $this->datetime;
            $_FILES['image']['name'] && $params['image'] = Image::upload($_FILES['image']);
            if(News::editRecord($id,$params)){
                return $this->redirect(['index']);
            }
        }
        $model = News::findOne($id);
        $list = Routes::getAll();
        return $this->render('edit',['model' => $model,'list'=>$list]);
    }

    public function actionDelete($id)
    {
        if(News::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }

    }
}