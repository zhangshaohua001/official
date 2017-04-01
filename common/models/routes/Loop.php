<?php
namespace common\models\routes;
use yii\db\ActiveRecord;
use yii\data\Pagination;

/**
 * Created by PhpStorm.
 * User: zsh
 * Date: 17-2-26
 * Time: 下午4:14
 */

class Loop extends ActiveRecord
{
    public static function tableName()
    {
        return 'off_loop';
    }

    public static function tableDesc(){
        return '轮播图';
    }

    public function getAll($name = '',$pageSize)
    {
        $query = self::find()->where(['del_flag' => DEL_FLAG_FALSE]);
        if (!empty($name)) {
            $query->andFilterWhere(['like', 'title', $name]);
        }
        $query->orderBy(['edit_time'=> SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        $info['data'] = $query->offset($pages->offset)->limit($pages->limit)->all();
        $info['pages'] = $pages;
        return $info;
    }

    public static function getLoop(){
        return self::find()->select('title,image,sort')->where(['del_flag' => 0])->orderBy('sort')->asArray()->all();

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