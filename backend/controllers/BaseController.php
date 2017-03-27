<?php

/**
 * Created by PhpStorm.
 * User: smile
 * Date: 16-9-14
 * Time: 下午4:18
 */
namespace backend\controllers;
use backend\components\ShowMessage;
use yii\web\Controller;
use Yii;
use yii\helpers\Url;
use common\models\routes\Routes;
class BaseController extends Controller
{
    public $cache;
    public $request;
    public $session;
    public $userid;
    public $name;
    public $realname;
    public $datetime;


    public function init()
    {
        parent::init();
        $this->cache = Yii::$app->cache;

        $this->request = Yii::$app->request;

        $this->session = Yii::$app->session;

        $this->userid = $this->session->get('userid');
        $this->name = $this->session->get('name');
        $this->realname = $this->session->get('realname');
        if(empty($this->userid)){
            ShowMessage::info('您还没有登陆！',Url::toRoute('/login/index'),1000);
        }
        $this->datetime = date('Y-m-d H:i:s');
    }

    public function routes_loop($id = 0)
    {
        $res = Routes::find()->select('*')->where(['parent_id'=>$id,'del_flag'=>0])->orderBy('sort asc')->asArray()->all();
        if($res){
            foreach ($res as $key => $val){
                $res[$key]['route'] = self::routes_loop($val['id']);
            }
        }
        return $res;
    }
    
}