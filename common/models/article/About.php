<?php

namespace common\models\article;
use yii\db\ActiveRecord;
use yii\data\Pagination;
class About extends ActiveRecord
{
    public static function tableName()
    {
        return 'art_about';
    }

    public static function tableDesc()
    {
        return '关于自己';
    }

    public static function getAll($name = '',$pageSize)
    {
        $query = self::find()->where(['del_flag' => DEL_FLAG_FALSE]);
        if(!empty($name)){
            $query->andFilterWhere(['like','name',$name]);
        }
        
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => $pageSize]);
        $info['data'] = $query->offset($pages->offset)->limit($pages->limit)->all();
        $info['pages'] = $pages;
        return $info;
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