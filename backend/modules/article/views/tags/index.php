<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;

?>
<link href="/css/form.css" rel="stylesheet">

<div class="search-nav">
    <form class="form-inline" action="<?= Url::toRoute('/article/tags/index') ?>" method="get">
        <div class="form-group input-group-sm">
            <label for="txtName">标签名：</label>
            <input class="form-control ipt" id="txtName" placeholder="标签名" name="name" value="<?= empty($name) ? '' : $name ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="btnSearch" type="submit"><i class="glyphicon glyphicon-search"></i> 查询</button>
            <button class="btn btn-default" id="btnSearch" type="button" onclick="add()"><i class="glyphicon glyphicon-plus-sign"></i> 新增</button>
        </div>
    </form>
</div>

<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
        <th>序号</th>
        <th>标题</th>
        <th>添加时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td><?= ++$k; ?></td>
            <td><?= $val->name; ?></td>
            <td><?= $val->add_time; ?></td>
            <td><?= $val->edit_time; ?></td>
            <td>
                <a class="btn btn-warning buttonbtn btn-info button"
                   href='javascript:window.location.href="<?php echo Url::toRoute(['/article/tags/edit', 'id' => $val->id]); ?>"'><i
                        class="glyphicon glyphicon-edit"></i> 修改</a>
                
                    <a class="btn btn-danger button"
                       href="javascript:confirmurl('<?= Url::toRoute(['/article/tags/delete', 'id' => $val->id]); ?>', '确定要刪除<?=$val->name?>吗?')"><i
                            class="glyphicon glyphicon-trash"></i>删除</a>
                
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo GoLinkPager::widget(['pagination' => $pages,'go' => false]);?>
</div>

<script type="text/javascript">
    /**
     * 添加用户
     */
    function add()
    {
        /*omnipotent('edit','<?=Url::toRoute('/article/tags/add')?>', '添加新标签', 500, 150, 0);*/
        window.location.href = "<?=Url::toRoute('/article/tags/add')?>";
    }

</script>