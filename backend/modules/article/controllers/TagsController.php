<?php
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-24
 * Time: 下午3:12
 */

namespace backend\modules\article\controllers;

use yii;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\article\Tags;
use common\models\routes\Routes;
use yii\helpers\Url;

class TagsController extends BaseController
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
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Tags::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }

    public function actionAdd()
    {
        $menu = Routes::find()->where(['parent_id' => 0])->asArray()->all();
        if($this->request->isPost){
            $params = $this->request->post();
            $params['route_id'] = $params['menu2'];
            $params['add_time'] = $this->datetime;
            $params['edit_time'] = $this->datetime;
            if(Tags::addRecord($params)){
                //ShowMessage::info('添加成功','',Url::toRoute(['index']),'edit');
                return $this->redirect(['index']);
            }
        }
        return $this->render('add',['menu' => $menu]);
    }

    public function actionEdit($id){
        if($this->request->isPost){
            $params = $this->request->post();
            $params['edit_time'] = $this->datetime;
            if(Tags::editRecord($id,$params)){
                //ShowMessage::info('修改成功','',Url::toRoute(['index']),'edit');
                return $this->redirect(['index']);
            }
        }
        $model = Tags::findOne($id);
        return $this->render('edit',[
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if(Tags::delRecord($id)){
            ShowMessage::info('删除成功','',Url::toRoute(['index']),'edit');
        }

    }

    public function actionMenu1(){
        $id = Yii::$app->request->post('id');
        $menu1 = Routes::find()->where(['parent_id' => $id])->asArray()->all();
        return json_encode(array('status'=>200,'info'=>'成功','data'=>$menu1));
        die;
    }

    public function actionMenu2(){
        $id = Yii::$app->request->post('id');
        $menu2 = Routes::find()->where(['parent_id' => $id])->asArray()->all();
        echo json_encode(array('status'=>200,'info'=>'成功','data'=>$menu2));
        die;
    }
}