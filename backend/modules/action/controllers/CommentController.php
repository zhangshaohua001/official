<?php
namespace backend\modules\action\controllers;
use backend\components\ShowMessage;
use backend\controllers\BaseController;
use common\models\action\Comment;
use common\models\article\About;
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: smile
 * Date: 17-2-24
 * Time: 下午6:59
 */
class CommentController extends BaseController
{
    public function actionIndex()
    {
        $name = $this->request->get('name');
        $pageSize = $this->request->get('per-page', PAGESIZE);
        $info = Comment::getAll($name,$pageSize);
        return $this->render('index', [
            'info' => $info['data'],
            'name' => $name,
            'pages' => $info['pages']
        ]);
    }
}