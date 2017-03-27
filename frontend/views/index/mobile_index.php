<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
    <title>新疆优悦佳品有限公司</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,minimum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <meta name="keywords" content="悦动力,优悦佳品,饮料">
    <meta name="description" content="悦动力,优悦佳品,饮料">

    <link rel="shortcut icon" href="/images/youyue.ico">
    <link rel="stylesheet" type="text/css" href="/css/mobile/main.css">
    <script type="text/javascript" src="/js/mobile/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="/js/mobile/main.js"></script>
</head>

<body class="height-all">
<div class="home-warp">
    <div class="logo-nav">
        <div class="logo"><a href="<?=Url::toRoute('/index/index')?>"><img src="/images/logo.png"></a></div>
        <div class="nav-icon"><img src="/images/nav-icon.png"></div>
    </div>
    <div class="menu-nav">
        <ul class="sum-ment">
            <li><a href="<?=Url::toRoute('/index/index-mobile')?>">首页</a></li>
            <li><a href="<?=Url::toRoute('/company/index-mobile')?>">公司介绍</a></li>
            <li><a href="<?=Url::toRoute('/job/index-mobile')?>">加入我们</a></li>
            <li><a href="<?=Url::toRoute('/cooperation/index-mobile')?>">合作共赢</a></li>
            <li><a href="<?=Url::toRoute('/download/index-mobile')?>">优悦商城</a></li>
        </ul>
    </div>


    <div class="home-page-one">
        <div class="app-down">
            <div class="app-icon"><img src="/images/app-icon.png"></div>
            <div class="title"><img src="/images/home-text.png"></div>
            <div class="lj-down"><a href="http://app.yunshanmeicai.com/?from=singlemessage&isappinstalled=0"
                >立即下载App</a></div>
        </div>
        <div class="down-arrow"><img src="/images/down-arrow.png"></div>
    </div>

    <div class="home-page-two">
        <div class="title"><span>让餐厅采购</span> 省钱 省心 省时间</div>
        <div class="fu-title">源头优选／物流闪送／采购无忧</div>
        <div class="picture"><img src="/images/home-page-2.jpg"></div>
        <ul>
            <li><span class="left a">新鲜</span><span class="right">坚守源头 严格优品 每天都要“新鲜感”</span></li>
            <li><span class="left b">低价</span><span class="right">每天节省财富36% 每单金额立省15%</span></li>
            <li><span class="left c">便捷</span><span class="right">一键下单 准时送达 每天多睡两小时</span></li>
        </ul>
    </div>

    <div class="home-page-three">
        <div class="title"><span>让农民生活</span> 有滋 有味 有盼头</div>
        <div class="fu-title">田间直供／销路稳定／生活多些幸福</div>
        <div class="picture"><img src="/images/home-page-3.jpg"></div>
        <ul>
            <li><span class="left a">合作</span><span class="right">长期合作 农产品销路无忧</span></li>
            <li><span class="left b">让利</span><span class="right">源头直采 告别中间商</span></li>
            <li><span class="left c">双赢</span><span class="right">互联网＋农业＝双赢 改变中国农业市场</span></li>
        </ul>
    </div>

    <div class="home-page-four">
        <img src="/images/home-page-4.jpg">
        <div class="gy-text"><img src="/images/home-gy.png"></div>
        <div class="gy-links"><a href="https://gongyi.meicai.cn/gongyi/mobile/gongyi/index.html">查看详情</a></div>
    </div>

    <div class="home-code-wit">
        <div class="home-code">
            <dl>
                <dt><img src="/images/code-pp.png"</dt>
                <dd>优悦品牌</dd>
            </dl>
            <dl>
                <dt><img src="/images/code-wb.png"</dt>
                <dd>优悦官微</dd>
            </dl>
            <dl>
                <dt><img src="/images/code-wx.png"</dt>
                <dd>微信商城</dd>
            </dl>
            <div class="clear"></div>
        </div>
    </div>

    <footer class="footer">
        <p>copyright © 2014-2016 新疆优悦佳品饮料有限公司<br/>
            010-61770976 &nbsp;</p>
        <p class="xin"><a href="https://credit.cecdc.com/CX20151012011563030185.html"><img src="/images/xin.png"></a></p>
    </footer>
</div>
</body>
</html>