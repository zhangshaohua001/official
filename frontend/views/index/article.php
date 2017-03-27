<?php
use yii\helpers\Url;
use backend\components\widgets\GoLinkPager;
?>
<div class="content_marp clearfix">
    <div class="banner_img">
        <img src="/file/c76818b5dce3846aeed28373901c71f2.jpg" alt="">
    </div>
    <!-- 版心开始 -->
    <div class="content_mains clearfix">
        <div class="main_row">
            <div class="duty_info clearfix ">
                <h4 class="font_40 fl">企业介绍</h4>
                <div class="cont_info ">
                    当前位置：<a href="http://www.eulikind.com/"> 首页 </a>&gt;
                    <a href="#"><?=$names['name2']; ?> </a>&gt;
                    <a href="#"><?=$names['name1']; ?></a>&gt;
                    <a href="#" class="nowss"><?=$names['name']; ?></a>

                </div>
            </div>
            <!-- 面包屑结束 -->
            <!-- 内容页开始 -->
            <div class="duty_content clearfix">
                <div class="box_left cd-5">
                    <div class="subNavBox">

                        <?php foreach($routes as $val): ?>
                            <div class="height_10"></div>
                            <div class="subNav currentDd <?=$val['en_name'] === $names['en_name'] ? 'currentDt' : ''?>"><i class="icon_lefts"></i><span><?= $val['name']; ?></span></div>
                            <ul class="navContent" style="display:<?=$val['en_name'] === $names['en_name'] ? 'block' : 'none'?>;">
                                <?php foreach($val['route'] as $val): ?>
                                    <li><a class="<?=$val['en_name'] === $name ? 'active' : ''?>" href="<?php echo Url::toRoute(['index/look','name'=>$val['en_name'].','.$val['id'].','.$val['tag']]);?>">-<?= $val['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>

                    </div>
                    <!-- 二维码 -->
                    <div class="erweima">
                        <a href="#">
                            <img src="/image/erweima.png" alt="">
                        </a>
                        <p class="p_24">官方微信</p>
                    </div>
                    <!-- 二维码 -->
                </div>
                <!-- 左侧结束 -->
                <div class="box_right cd-15">
                    <h4 class="font_40 "><?=$names['name']; ?></h4>
                    <p class="font_imgbg">
                        <img src="/file/512463db6e77660e218a33aa0fc1a6a7.png" alt="">
                    </p>
                    <div class="cd_con_right cd-20 right_text_xqy clearfix">

                        <div class="right_text cd-20">

                            <h6 class="font_24 font_center"><?=$info->content;?></h6>
                            <p class="p_color p_color_center"><span>浏览次数: <em><?=$info->browse_times;?></em> </span>&nbsp;&nbsp;&nbsp;发布日期：<span><?=$info->edit_time;?></span> </p>
                            <?=$info->content;?>
                        </div>
                    </div>
                    <!-- right_text cd-10 -->
                    <!-- 内容详情结束 -->
                </div>

                <!-- 右侧结束 -->
            </div>
        </div>
        <!--版心1440 main_row版心pad部分-->
    </div>
    <!-- content_mains 版心100%位置-->
</div>
