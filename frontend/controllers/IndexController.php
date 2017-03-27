<?php
namespace frontend\controllers;

use common\models\article\News;
use common\models\article\Tags;
use common\models\routes\Loop;
use yii;
use frontend\components\BaseController;
use common\models\routes\Routes;
use common\components\Tools;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        $this->getView()->title = "风电研发";
        $this->getView()->keywords = "风力发电场项目建设工程验收规程";
        $this->getView()->description = "为加强风力发电场项目建设工程验收管理工作，规范风力发电场项目建设工程验收程序，确保风力发电场项目建设工程质量";
        $loop = Loop::getloop();
        return $this->render('index',['loop'=>$loop]);
    }

    /*
     * 查看
     */
    public function actionLook()
    {
        //$name = $this->request->get('name');
        $nameId = explode(',',$_GET['name']);
        $name = $nameId[0];
        $id = $nameId[1];
        $tag = $nameId[2]; //判断是否是列表

        //获取顶部id
        $names = Routes::route_head($name);
        $routes = parent::routes_loop($names['parent_id']);

        if($tag == 1){
            $pageSize = PAGESIZE;
            $info = News::getInfon($id, $pageSize);
            
            $this->getView()->title = '要问列表';
            
            return $this->render('look',[
                'tag' => $tag,
                'name'   => $name,
                'names' => $names,
                'routes' => $routes,
                'info' => $info['data'],
                'pages' => $info['pages'],
            ]);
        }else {
            $info = Tags::getOne($id);
            $this->getView()->title = $info['name'];
            $this->getView()->keywords = $info['name'];
            $this->getView()->description = Tools::cutUtf8(strip_tags($info['content']),80);
            return $this->render('look',[
                'tag' => $tag,
                'name'   => $name,
                'names' => $names,
                'routes' => $routes,
                'info' => $info,
            ]);
        }
    }

    public function actionArticle(){
        $idName =  explode(',',$_GET['idName']);
        $name = $idName[1];
        $names = Routes::route_head($name);
        $routes = parent::routes_loop($names['parent_id']);
        $info = News::findOne($idName[0]);

        $this->getView()->title = $info['title'];
        $this->getView()->keywords = $info['title'];
        $this->getView()->description = Tools::cutUtf8(strip_tags($info['content']),80);

        $info['browse_times']+=1;
        $info->save();
        
        return $this->render('article',[
            'name'   => $name,
            'names' => $names,
            'routes' => $routes,
            'info' => $info,
        ]);
    }
}