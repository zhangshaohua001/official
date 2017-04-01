<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?=$this->title;?></title>
    <meta name="keywords" content="<?=$this->keywords;?>">
    <meta name="description" content="<?=$this->description;?>">
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/list.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/sty.css">
    <link rel="stylesheet" type="text/css" href="/css/ipad.css" media="(min-width:540px) and (max-width:979px)">
    <script src="/js/jquery-1.js"></script>
    <script src="/js/left.js"></script>
    <script src="/js/common.js"></script>
    <!--haeder/js-->
    <script src="/js/daohang.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/erweima.js" type="text/javascript" charset="utf-8"></script>
    <!--haeder/js-->
</head>

<body>
<!-- header开始 -->
<div class="header">
    <div class="navbar_all">
        <a href="./" class="avator"><img src="/image/logo1.png"></a>
        <ul class="navbar">
            <li><a href="../">首 页</a></li>

            <?php foreach($this->context->routesInfo as $val): ?>
            <li>
                <?= $val['name']; ?>
                <div class="nav_ins">
                    <div class="nav_img"><img src="<?= MPS_URL.$val['image']; ?>"></div>
                    <div class="nav_txt">
                        <?php foreach($val['route'] as $val): ?>
                            <div class="ins_4 ">
                                <h2><?= $val['name']; ?></h2>
                                <?php foreach($val['route'] as $val): ?>
                                    <p><a href="<?php echo Url::toRoute(['index/look','name'=>$val['en_name'].','.$val['id'].','.$val['tag']]);?>"><?= $val['name']; ?></a></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>

            <li class="">
                主营业务
                <div class="nav_ins">
                    <div class="nav_img"><img src="/file/fa089462a48d56fae20bc63fc9a9275b.jpg"></div>
                    <div class="nav_txt">
                        <div class="ins_4 ">
                            <h2>主营业务</h2>
                            <p><a href="./index/look">技术服务</a></p>
                            <p><a href="#">备品备件</a></p>
                            <p><a href="#">部件制造</a></p>
                            <p><a href="#">人才服务</a></p>
                        </div>
                        <div class="ins_4 ">
                            <h2>业务分布</h2>
                            <p><a href="#">华北地区</a></p>
                            <p><a href="#">西北地区</a></p>
                            <p><a href="#">华东地区</a></p>
                            <p><a href="#">华南地区</a></p>
                            <p><a href="#">东北地区</a></p>
                            <p><a href="#">西南地区</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                人力资源
                <div class="nav_ins">
                    <div class="nav_img"><img src="/file/25f3e428387636d7f3ed94dd8b9a6728.jpg"></div>
                    <div class="nav_txt">
                        <div class="ins_4 ">
                            <h2>校园招聘</h2>
                            <p><a href="#">招聘岗位</a></p>
                            <p><a href="#">应聘流程</a>
                            </p>
                        </div>
                        <div class="ins_4 ">
                            <h2>社会招聘</h2>
                            <p><a href="#">招聘岗位</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                客户服务
                <div class="nav_ins">
                    <div class="nav_img"><img src="/file/6afb3ce703d1ec0f02ce54e16ca9ef33.jpg"></div>
                    <div class="nav_txt">
                        <div class="ins_4 ">
                            <h2>互动交流</h2>
                            <p><a href="#">联系我们</a></p>
                            <p><a href="#">留言反馈</a></p>
                        </div>
                        <div class="ins_4 ">
                            <h2>素材分享</h2>
                            <p><a href="#">视频</a></p>
                            <p><a href="#/">图片</a></p>
                            <p><a href="#">资料</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="rt_img">
            <a href="#" class="wei" id="er"><img src="/image/wei.jpg"></a>
            <a href="mailto:mail.eulikind.com" class="xin"><img src="/image/xin.png"></a>
            <div class="search_input">
                <form name="search_js1" method="post" action="/e/search/"
                      onsubmit="return search_check(document.search_js1);" id="searchForm">
                    <!--<a href="javascript:document.getElementById('searchForm').submit();"><img
                            src="image/search.png"></a>-->
                    <a href=""><img
                            src="../image/search.png"></a>
                    <input name="show" value="title,smalltext,newstext,writer" type="hidden">
                    <input name="classid" value="" type="hidden">
                    <input name="tempid" value="1" type="hidden">
                    <input class="input1 input_hover" name="keyboard" type="text">
                </form>
            </div>
        </div>
        <div id="er_icon">
            <img src="/image/weixin_bg.png">
        </div>
    </div>
</div>
<!-- header结束-->


<?php echo $content ?>

<!-- footer begin-->
<div class="footer">
    <p class="right">Copyright©2015 北京优利康达科技股份有限公司　版权所有　　京ICP备京ICP备14027180号号</p>
    <p class="left"><a href="http://www.eulikind.com/rencaizhaopin/">人才招聘</a> | <a
            href="http://www.eulikind.com/falvshengming/">法律声明</a> | <a href="http://www.eulikind.com/youqinglianjie/">友情链接</a>
        | <a href="http://www.eulikind.com/wangzhanditu/">网站地图</a></p>
</div>


<!-- footer end -->
<!-- javascript
================================================== -->



</body>
</html>