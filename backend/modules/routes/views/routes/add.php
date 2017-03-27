<?php
use yii\helpers\Url;
?>
<form name="myform" id="myform"  action="<?=Url::toRoute(['/routes/routes/add']) ?>" method="post" enctype="multipart/form-data">
    <div class="common-form">
        <table width="100%" class="table_form contentWrap">
            <tbody>
            <tr>
                <th width="80">导航名称：</th>
                <td>
                    <input class="form-control menu_source"  id="name" name="name" value="" style="width:200px;">
                    <span id="nameTip" style="color:red;display:none;">请输入导航名称</span>
                </td>
            </tr>
            <tr>
                <th width="80">上级导航名：</th>
                <td>
                    <select name="parent_id">
                        <option value="">--请选择--</option>
                        <option value="0">一级导航</option>
                        <?php foreach ($menus as $val): ?>
                            <option value="<?= $val['id'];?>"><?= $val['name'];?></option>
                            <?php foreach($val['route'] as $val): ?>
                                 <option value="<?= $val['id'];?>"><?= '|--'.$val['name'];?></option>
                                <?php foreach($val['route'] as $val): ?>
                                    <option value="<?= $val['id'];?>"><?= '|-- --'.$val['name'];?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                    <span id="parentTip" style="color:red;display:none;">请选择导航名称</span>
                </td>
            </tr>
            <tr>
                <th width="80">URL：</th>
                <td>
                    <input class="form-control menu_source"  id="url" name="url" value="" style="width:200px;">
                    <span id="urlTip" style="color:red;display:none;">请输入url</span>
                </td>
            </tr>
            <tr>
                <th width="80">图片：</th>
                <td>
                    <img src="" id="thumb" width="200" height="150">
                    <a href="javascript:;" style="margin-left:15px;" id="thumb_select">>>点击这里选择图片</a>
                    <input type="file" id="thumb_file" name="image" style="display: none;">
                </td>
            </tr>
            <tr>
                <th width="80">是否列表：</th>
                <td>
                    <input class=""  type="radio" id="tag" name="tag" value="1" style="width:40px;">是
                    <input class="" checked="checked"  type="radio" id="tag" name="tag" value="0" style="width:40px;">否
                </td>
            </tr>
            <tr>
                <th width="80">顺序：</th>
                <td>
                    <input class="form-control menu_source"  id="sort" name="sort" value="" style="width:200px;">
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
        var name = $("input[name=name]").val();
        if(name == ""){
            $("#nameTip").show();
            setTimeout(function(){
                $("#nameTip").hide();
            },3000);
            return false;
        }
        var name = $("select[name=parent_id]").val();
        if(name == ""){
            $("#parentTip").show();
            setTimeout(function(){
                $("#parentTip").hide();
            },3000);
            return false;
        }
        /*var name = $("input[name=url]").val();
        if(name == ""){
            $("#urlTip").show();
            setTimeout(function(){
                $("#urlTip").hide();
            },3000);
            return false;
        }*/
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
