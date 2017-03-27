<?php
use yii\helpers\Url;
use \kucha\ueditor\UEditor;
?>
<form name="myform" id="myform" enctype="multipart/form-data" action="<?=Url::toRoute(['/article/news/edit','id' => $model->id]) ?>" method="post">
    <div class="common-form">
        <table width="100%" class="table_form contentWrap">
            <tbody>
            <tr>
                <th width="80">标题：</th>
                <td>
                    <input class="form-control menu_source" value="<?=$model->title;?>" style="width:200px" placeholder="请输入原创文章标题" name="title">
                    <span id="nameTip" style="color:red;display:none;">请输入文章标题</span>
                </td>
            </tr>
            <tr>
                <th width="100">列表名：</th>
                <td>
                    <select class="form-control-table width-160" id="route_id" name="route_id" style="width: 120px;">
                        <option>请选择</option>
                        <?php foreach ($list as $val): ?>
                            <option <?=$model['route_id'] == $val['id'] ? 'selected' : '' ?> value ="<?=$val['id'];?>"><?=$val['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th width="80">图片：</th>
                <td>
                    <img src="<?= MPS_URL.$model->image;?>" id="thumb" width="200" height="150">
                    <a href="javascript:;" style="margin-left:15px;" id="thumb_select">>>点击这里选择图片</a>
                    <input type="file" id="thumb_file" name="image" style="display: none;">
                </td>
            </tr>
            <tr>
                <th width="80">原创内容：</th>
                <td>
                    <?php
                    echo UEditor::widget([
                        'name'=>'content',
                        'id'=>'content',
                        'value' => $model->content,
                        'clientOptions' => [
                            //编辑区域大小
                            'initialFrameHeight' => '400',
                            'initialFrameWidth' => '800',
                            //设置语言
                            'lang' =>'zh-cn', //中文为 zh-cn
                            //定制菜单
                            'toolbars' => [
                                [
                                    'fullscreen', 'source', 'undo', 'redo', '|',
                                    'fontsize',
                                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                                    'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                                    'forecolor', 'backcolor', '|',
                                    'lineheight','|',
                                    'indent', '|','simpleupload', //单图上传
                                    'insertimage', //多图上传
                                ],
                            ]
                        ]]);
                    ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <input type="submit" value="提交" class="btn btn-success" style="margin:10px 0 10px 100px;padding:8px 15px;">
        <input type="button" value="返回" class="btn btn-success" style="margin:10px;padding:8px 15px;" onclick="goback()">
    </div>
</form>
<script>
    $("#myform").submit(function(){
        var name = $("input[name=title]").val();
        if(name == ""){
            $("#nameTip").show();
            setTimeout(function(){
                $("#nameTip").hide();
            },3000);
            return false;
        }
    });
    function goback() {
        window.location.href="<?=Url::toRoute('/article/news/index')?>"
    }

    $("#thumb_select").click(function(){
        $("#thumb_file").click();
    });
    $("#thumb_file").change(function(){
        var objUrl = getObjectURL(this.files[0]) ;
        console.log("objUrl = "+objUrl) ;
        if (objUrl) {
            $("#thumb").attr("src", objUrl);
        }
    }) ;
    //建立一個可存取到該file的url
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
</script>
