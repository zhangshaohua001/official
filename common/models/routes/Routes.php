<?php
namespace common\models\routes;
use yii\db\ActiveRecord;

/**
 * Created by PhpStorm.
 * User: zsh
 * Date: 17-2-26
 * Time: 下午4:14
 */

class Routes extends ActiveRecord
{
    public static function tableName()
    {
        return 'routes';
    }

    public static function tableDesc(){
        return '路由';
    }

    /*
     * 获取第一级别
     */
    public static function route_head($name){
        $one = self::find()->select('parent_id,name')->where(['en_name' => $name])->asArray()->one();
        $two = self::find()->select('parent_id,en_name,name as name1')->where(['id' => $one['parent_id']])->asArray()->one();
        $three = self::find()->select('name as name2')->where(['id' => $two['parent_id']])->asArray()->one();
        $merge = array_merge($one,$two,$three);
        return $merge;
    }

    public static function getList($name){
        return self::find()->select('parent_id')->where(['en_name' => $name])->asArray()->one();

    }

    public static function getAll(){
        return self::find()->select('id,name')->where(['tag' => 1])->asArray()->all();

    }

    public static function addRecord($info)
    {
        $model = new self();
        $model->setAttributes($info,false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function editRecord($id,$info)
    {
        $model = self::findOne($id);
        if(empty($model)){
            return false;
        }
        $model->setAttributes($info,false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    public static function delRecord($id)
    {
        $model = self::findOne($id);
        if(empty($model)){
            return false;
        }
        $model->setAttributes(['del_flag' => 1],false);
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }
}