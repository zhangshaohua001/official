<?php
use yii\helpers\Url;
use common\components\Tools;
?>
<link href="/css/form.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/css/lunbotu.css">
<link type="text/css" rel="stylesheet" href="/css/lunbotu/style.css">
<script type="text/javascript" src="/js/jquery.min2.js"></script>
<script type="text/javascript" src="/js/pirobox.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $().piroBox({
            my_speed: 400, //animation speed
            bg_alpha: 0.1, //background opacity
            slideShow : true, // true == slideshow on, false == slideshow off
            slideSpeed : 4, //slideshow duration in seconds(3 to 6 Recommended)
            close_all : '.piro_close,.piro_overlay'// add class .piro_overlay(with comma)if you want overlay click close piroBox
        });
    });
</script>

<link href="/css/form.css" rel="stylesheet">
<div class="search-nav">
    <form class="form-inline" action="<?= Url::toRoute('/article/news/index') ?>" method="get">
        <div class="form-group input-group-sm">
            <label for="txtName">标题：</label>
            <input class="form-control ipt" id="txtName" placeholder="标题" name="title" value="<?= empty($name) ? '' : $name ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="btnSearch" type="submit"><i class="glyphicon glyphicon-search"></i> 查询</button>
            <button class="btn btn-default" id="btnSearch" type="button" onclick="add()"><i class="glyphicon glyphicon-add"></i> 新增</button>
        </div>
    </form>
</div>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
        <th>序号</th>
        <th>导航名称</th>
        <th>URL</th>
        <th>是否列表</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($menus as $val): ?>
        <tr>
            <td style="vertical-align: middle;"><?= $val['id'];?></td>
            <td style="text-align: left;padding--left: 40px;"><?= $val['name'];?></td>
            <td style="vertical-align: middle;"><?= $val['url'];?></td>
            <td style="vertical-align: middle;"><?= $val['tag']==1 ? '是' :'否';?></td>
            <td style="vertical-align: middle;">
                <a class="btn btn-warning buttonbtn btn-info button"
                   href='javascript:window.location.href="<?php echo Url::toRoute(['/routes/routes/edit', 'id' => $val['id']]);?>"'><i
                        class="glyphicon glyphicon-edit"></i> 修改</a>

                <a class="btn btn-danger button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/routes/routes/delete', 'id' => $val['id']]); ?>', '确定要刪除<?=$val['name']?>吗?')"><i
                        class="glyphicon glyphicon-trash"></i> 删除</a>

            </td>
        </tr>
        <?php foreach($val['route'] as $val): ?>
            <tr>
                <td style="vertical-align: middle;"><?= $val['id'];?></td>
                <td style="text-align: left;padding-left: 40px;"><?= '|--'.$val['name'];?></td>
                <td style="vertical-align: middle;"><?= $val['url'];?></td>
                <td style="vertical-align: middle;""><?= $val['tag']==1 ? '是' :'否';?></td>
                <td style="vertical-align: middle;">
                    <a class="btn btn-warning buttonbtn btn-info button"
                       href='javascript:window.location.href="<?php echo Url::toRoute(['/routes/routes/edit', 'id' => $val['id']]);?>"'><i
                            class="glyphicon glyphicon-edit"></i> 修改</a>

                    <a class="btn btn-danger button"
                       href="javascript:confirmurl('<?= Url::toRoute(['/routes/routes/delete', 'id' => $val['id']]); ?>', '确定要刪除<?=$val['name']?>吗?')"><i
                            class="glyphicon glyphicon-trash"></i> 删除</a>

                </td>
            </tr>
            <?php foreach($val['route'] as $val): ?>
                <tr>
                    <td style="vertical-align: middle;"><?= $val['id'];?></td>
                    <td style="text-align: left;padding-left: 40px;"><?= '|-- --'.$val['name'];?></td>
                    <td style="vertical-align: middle;"><?= $val['url'];?></td>
                    <td style="vertical-align: middle;""><?= $val['tag']==1 ? '是' :'否';?></td>
                    <td style="vertical-align: middle;">
                        <a class="btn btn-warning buttonbtn btn-info button"
                           href='javascript:window.location.href="<?php echo Url::toRoute(['/routes/routes/edit', 'id' => $val['id']]);?>"'><i
                                class="glyphicon glyphicon-edit"></i> 修改</a>

                        <a class="btn btn-danger button"
                           href="javascript:confirmurl('<?= Url::toRoute(['/routes/routes/delete', 'id' => $val['id']]); ?>', '确定要刪除<?=$val['name']?>吗?')"><i
                                class="glyphicon glyphicon-trash"></i> 删除</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>

    </tbody>
</table>
<script>
    function add(){
        window.location.href = "<?=Url::toRoute('/routes/routes/add')?>";
        /*omnipotent('edit','<?=Url::toRoute('/article/timer/add')?>', '添加新记录', 600, 450, 0);*/
    }
</script>

