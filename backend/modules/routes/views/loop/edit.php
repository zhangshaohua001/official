<?php
use yii\helpers\Url;
?>
<form name="myform" id="myform" enctype="multipart/form-data" action="<?=Url::toRoute(['/routes/loop/edit','id' => $model->id]) ?>" method="post">
    <div class="common-form">
        <table width="100%" class="table_form contentWrap">
            <tbody>
            <tr>
                <th width="80">标题：</th>
                <td>
                    <input class="form-control menu_source"  id="name" name="name" value="<?=$model->title;?>" style="width:200px;">
                    <span id="nameTip" style="color:red;display:none;">请输入标题</span>
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
                <th width="80">顺序：</th>
                <td>
                    <input class="form-control menu_source"  id="sort" name="sort" value="<?=$model->sort;?>" style="width:200px;">
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
        var title = $("input[name=title]").val();
        if(title == ""){
            $("#nameTip").show();
            setTimeout(function(){
                $("#nameTip").hide();
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
        window.location.href="<?=Url::toRoute('/routes/routes/index')?>"
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
