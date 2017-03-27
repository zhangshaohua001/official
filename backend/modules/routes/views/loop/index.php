<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;
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
        <th>标题</th>
        <th>图片</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $k=($pages->limit) * ($pages->page);foreach ($info as $val): ?>
        <tr>
            <td style="vertical-align: middle;"><?= ++$k; ?></td>
            <td style="vertical-align: middle;"><?= $val->title; ?></td>
            <td style="vertical-align: middle;"><a href="<?= $val->image?>" class="pirobox_gall" title=""><img src="<?= MPS_URL.$val->image?>" alt="<?= $val->title.'图片';?>" width="80" height="50"></a></td>
            <td style="vertical-align: middle;"><?= $val->edit_time;?></td>
            <td style="vertical-align: middle;">
                <a class="btn btn-warning buttonbtn btn-info button"
                   href='javascript:window.location.href="<?php echo Url::toRoute(['/routes/loop/edit', 'id' => $val->id]);?>"'><i
                        class="glyphicon glyphicon-edit"></i> 修改</a>

                <a class="btn btn-danger button"
                   href="javascript:confirmurl('<?= Url::toRoute(['/routes/loop/delete', 'id' => $val->id]); ?>', '确定要刪除<?=$val->title?>吗?')"><i
                        class="glyphicon glyphicon-trash"></i> 删除</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="pull-right">
    <?php echo GoLinkPager::widget(['pagination' => $pages,'go' => false]); ?>
</div>
<script>
    function add(){
        window.location.href = "<?=Url::toRoute('/routes/loop/add')?>";
        /*omnipotent('edit','<?=Url::toRoute('/article/timer/add')?>', '添加新记录', 600, 450, 0);*/
    }
</script>

