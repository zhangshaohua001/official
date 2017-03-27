<?php
use yii\helpers\Url;
use \kucha\ueditor\UEditor;
?>
<div class="pad_10">
    <div class="common-form">
        <form name="myform" action="<?=Url::toRoute(['/article/tags/edit','id' => $model->id]) ?>" method="post" id="myform">
            <div class="common-form">
                <table width="100%" class="table_form contentWrap">
                    <!--<tr>
                        <th width="100">标题名：</th>
                        <td>
                            <select class="form-control-table width-160" id="menu" name="menu" style="width: 120px;">
                                <option>请选择</option>
                                <?php /*foreach ($menu as $val): */?>
                                    <option value ="<?/*=$val['id'];*/?>"><?/*=$val['name'];*/?></option>
                                <?php /*endforeach; */?>
                            </select>
                            <select class="form-control-table width-160"  id="menu1" name="menu1" style="width: 120px;">
                                <option value="">请选择</option>
                            </select>
                            <select class="form-control-table width-160" id="menu2" name="menu2" style="width: 120px;">
                                <option value="">请选择</option>
                            </select>
                            <span id="menu2Tip" style="color:red;display:none;">请选择标题名</span></td>
                        </td>
                    </tr>-->
                    <tr>
                        <th width="100">标题：</th>
                        <td><input type="text" name="name" value="<?=$model->name;?>" class="form-control-table width-160" id="name" style="display: inline" >
                            <span id="nameTip" style="color:red;display:none;">请输入标题</span></td>
                    </tr>
                    <tr>
                        <th width="100">内容：</th>
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
                </table>
            </div>
            <div>
                <input type="submit" value="提交" class="btn btn-success" style="margin:10px 0 10px 100px;padding:8px 15px;">
                <input type="button" value="返回" class="btn btn-success" style="margin:10px;padding:8px 15px;" onclick="goback()">
            </div>
        </form>
    </div>
</div>
<script>
    $(function(){
        $("#myform").submit(function(){
            var name = $("input[name=name]").val();
            if(name == ""){
                $("#nameTip").show();
                setTimeout(function(){
                    $("#nameTip").hide();
                },3000);
                return false;
            }
            var menu2 = $("select[name=menu2]").val();
            if(menu2 == ""){
                $("#menu2Tip").show();
                setTimeout(function(){
                    $("#menu2Tip").hide();
                },3000);
                return false;
            }
        });

        /*$('#menu').on('change',function(){
            var id = $('#menu').val();

            var url = '/article/tags/menu1';
            $.post(url,{id:id},function(data){
                if(data.status == 200){
                    var data_html;
                    $.each(data.data,function(k,v){
                        data_html += '<option value="'+ v.id +'">'+ v.name +'</option>';
                    });
                    $('#menu1 option').remove();
                    $('#menu1').html('<option value="0">请选择</option>');
                    $('#menu1').append(data_html);
                }else{
                    console.log('参数错误');
                }
            },'json');
        });*/

        /*$('#menu1').on('change',function(){
            var id = $('#menu1').val();

            var url = '/article/tags/menu2';
            $.post(url,{id:id},function(data){
                if(data.status == 200){
                    var data_html;
                    $.each(data.data,function(k,v){
                        data_html += '<option value="'+ v.id +'">'+ v.name +'</option>';
                    });
                    $('#menu2 option').remove();
                    $('#menu2').html('<option value="0">请选择</option>');
                    $('#menu2').append(data_html);
                }else{
                    console.log('参数错误');
                }
            },'json');
        });*/

    });
</script>
