<?php
use yii\helpers\Url;
use common\components\Tools;
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
                    <?php if($tag == 1){ ?>

                        <?php foreach($info as $val): ?>
                            <div class="cd_con_right cd-20 clearfix ">
                                <!-- 内容开始 -->
                                <div class="cd-20 cd_20_top30 clearfix">
                                    <a href="<?php echo Url::toRoute(['/index/article', 'idName' => $val['id'].','.$name]);?>"><img class="cd-7" src="<?= MPS_URL.$val->image;?>" alt=""></a>
                                    <div class="right_text cd-13">
                                        <h6 class="font_24 font_24_martop"><a href="<?php echo Url::toRoute(['/index/article', 'idName' => $val['id'].','.$name]);?>"><?= $val->title;?></a></h6>
                                        <p class="p_color">发布日期：<span>2017-01-24</span></p>
                                        <p><?= Tools::cutUtf8(strip_tags($val->content),100);?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    <?php }else{ ?>
                        <div class="cd_con_right cd-20 clearfix ">
                            <!-- 内容开始 -->
                            <?=$info['content'];?>
                        </div>
                    <?php } ?>
                    <!-- right_text cd-10 -->
                    <!-- 内容详情结束 -->
                </div>

                <!-- 右侧结束 -->
            </div><?php /*echo GoLinkPager::widget(['pagination' => $pages,'go' => false]); */?>
            <?php if($tag == 1){ ?>
                <div id="PageBar" class="page-normal top_bor">
                    <!--<span class="span_c"></span></a>&nbsp;<a class="cur" href="javascript:;"></a>&nbsp;&nbsp;123<span class="span_c">&gt;</span>-->
                                         <a id="pagefirst" class="page-prev"><span class="span_c">&lt;</span></a>
                                        <a class="cur" href="javascript:;"><span>1</span></a>
                                        <a id="pagenxt" href="javascript:void(0);" class="page-next"><span class="span_c">&gt;</span></a>
                </div>
            <?php } ?>
        </div>
        <!--版心1440 main_row版心pad部分-->
    </div>
    <!-- content_mains 版心100%位置-->
</div>
