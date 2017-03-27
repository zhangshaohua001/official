<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;
use common\components\Tools;
?>

<link href="/css/form.css" rel="stylesheet">
<div class="search-nav">
    <form class="form-inline" action="<?= Url::toRoute('/action/comment/index') ?>" method="get">
        <div class="form-group input-group-sm">
            <label for="txtName">关键字：</label>
            <input class="form-control ipt" id="txtName" placeholder="请输入关键字" name="name" value="<?= empty($name) ? '' : $name ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="btnSearch" type="submit"><i class="glyphicon glyphicon-search"></i> 查询</button>
        </div>
    </form>
</div>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
        <th>序号</th>
        <th>留言内容</th>
        <th>留言时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td><?= ++$k; ?></td>
            <td><?= $val->name; ?></td>
            <td><?= Tools::cutUtf8(strip_tags($val->content),30);?></td>
            <td>
                <a class="btn btn-success buttonbtn btn-info button"
                   href='javascript:window.location.href="<?php echo Url::toRoute(['/article/about/info', 'id' => $val->id]); ?>"'><i
                        class="glyphicon glyphicon-zoom-in"></i> 查看</a>
                <a class="btn btn-warning buttonbtn btn-info button"
                   href='javascript:window.location.href="<?php echo Url::toRoute(['/article/about/edit', 'id' => $val->id]); ?>"'><i
                        class="glyphicon glyphicon-edit"></i> 修改</a>

                <a class="btn btn-danger button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/article/about/delete', 'id' => $val->id]); ?>', '确定要刪除<?=$val->name?>吗?')"><i
                        class="glyphicon glyphicon-trash"></i> 删除</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo GoLinkPager::widget(['pagination' => $pages,'go' => false]); ?>
</div>


