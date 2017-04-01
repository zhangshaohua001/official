<?php
namespace frontend\components;
/**
 * Created by PhpStorm.
 * User: zsh
 * Date: 17-2-26
 * Time: 下午2:00
 */

use Yii;
use common\models\routes\Routes;
use yii\web\Controller;

class BaseController extends Controller
{
    public $routesInfo = '';
    public $request;
    
    function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->routesInfo = self::getRoutes();
        Yii::$app->view->params['routesInfo'] = $this->routesInfo;
    }

    public static function routes_loop($id = 0)
    {
        $res = Routes::find()->select('id,name,en_name,image,tag')->where(['parent_id'=>$id,'del_flag'=>0])->orderBy('sort asc')->asArray()->all();
        if($res){
            foreach ($res as $key => $val){
                $res[$key]['route'] = self::routes_loop($val['id']);
            }
        }
        return $res;
    }

    /*
     * 获取导航
     * */
    public function getRoutes(){
        $res = self::routes_loop(0);
        return $res;
    }


}