<?php
use yii\helpers\Url;
?>
<!-- slider begin -->

<div class="device">

    <a class="arrow-right" href="javascript:;"><img src="image/hand_rt.png"></a>
    <a class="arrow-left" href="javascript:;"><img src="image/hand_lt.png"></a>
    <div class="swiper-wrapper">
        <?php foreach ($loop as $val): ?>
        <div class="swiper-slide">
            <a class="item_list" href="#">
                <img src="<?= MPS_URL.$val['image'];?>">
                <div class="info">
                    <h2></h2>
                    <h3><?=$val['title'];?></h3>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination">
        <li class="on">1</li>
    </div>
</div>

<!-- slider end -->
<!-- row of columns -->
<div class="focus_content">
    <p>
        <img class="f_up" src="image/focus_up.png">
    </p>
    <div class="f_turn" style="display: none;">
        <div class="f_wih">
            <div class="txt">
                <h2 class="ywfw">业务范围</h2>
                <ul style="margin-left: 89px;">
                    <li style="font-size: 18px;">风电运维技术服务</li>
                    <li style="font-size: 18px;">备品备件供应服务</li>
                    <li style="font-size: 18px;">风机部件生产销售</li>
                    <li style="font-size: 18px;">专业人才外包服务</li>
                </ul>
            </div>
            <ul class="f_tit">
                <li class="">
                    <a href="http://www.eulikind.com/tuoyewu/zhuyingyewu/jishufuwu/">
                        <img src="file/4f0375a0ea51737cdc48602879cad6fd.png">
                        <h2>技术服务</h2>
                        <div class="f_list">
                            <img src="file/4f0375a0ea51737cdc48602879cad6fd.png">
                            <h2>技术服务</h2>
                            <p>安装督导、调试、定检、维护、中修、大修、风机体检、远程支持、技术改造、风场整体运维服务与技术培训等.</p>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="http://www.eulikind.com/tuoyewu/zhuyingyewu/beipinbeijian/">
                        <img src="file/96fafffa8ac20ee9b565c78903825649.png">
                        <h2>备品备件</h2>
                        <div class="f_list">
                            <img src="file/96fafffa8ac20ee9b565c78903825649.png">
                            <h2>备品备件</h2>
                            <p>基于备件数据库和风电服务备件网，建立“风电备件云平台”，实现多品牌风机全生命周期备件、消耗品供应、维修与替代及资源配置最优化。</p>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="http://www.eulikind.com/tuoyewu/zhuyingyewu/bujianzhizao/">
                        <img src="file/c5dd13f2ba544b8fa7ab149ba0d25538.png">
                        <h2>部件制造</h2>
                        <div class="f_list">
                            <img src="file/c5dd13f2ba544b8fa7ab149ba0d25538.png">
                            <h2>部件制造</h2>
                            <p>拥有天津、保定部件制造基地和产品研发中心，为风电主流整机商、业主生产、供应机舱罩和轮毂罩等风机部件。
                            </p>
                        </div>
                    </a>
                </li>
                <li class="">
                    <a href="http://www.eulikind.com/tuoyewu/zhuyingyewu/rencaifuwu/">
                        <img src="file/20b8fbe98838ceb22a4912d7311ca236.png">
                        <h2>人才服务</h2>
                        <div class="f_list">
                            <img src="file/20b8fbe98838ceb22a4912d7311ca236.png">
                            <h2>人才服务</h2>
                            <p>立足解决行业痛点，基于对风电行业从业规律认识，发挥公司多层次，全方位专业人才培训和管理体系的独特优势，向客户提供专业岗位人才服务。</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="pic_news">
    <ul id="da-thumbs" class="da-thumbs">
        <li>
            <!--企业文化-->
            <div class="da-thumb-bor">
                <h2 class="tit_cn">公司简介</h2>
                <h3 class="tit_en">INTRODUCTION</h3>
                <img src="file/31f7cf996e12819691597c4bb28e9f4b.jpg" alt="">
                <div class="hot_info">
                    <h2>公司简介</h2>
                    <h3>INTRODUCTION</h3>
                    <div
                        onclick="window.location.href='/zhiwomen/qiyegaikuang/qiyejianjie/2016-12-29/5.html';return false"
                        onmouseover="this.style.cursor='pointer'">
                        北京优利康达科技股份有限公司，英文简称EULIKIND，股票代码839234，是目前国内成立时间最早、服务客户与机型最多、规模最大、按照国际...
                    </div>
                    <p>
                        <a href="http://www.eulikind.com/zhiwomen/qiyegaikuang/qiyejianjie/2016-12-29/5.html">
                            <img src="image/da_cur.png">
                        </a>
                    </p>
                </div>
            </div>
        </li>
        <li>
            <!--公司要闻-->
            <div class="da-thumb-bor">
                <h2 class="tit_cn">公司要闻</h2>
                <h3 class="tit_en">NEWS</h3>
                <img src="file/8a7fd9c30fc1593c429d7c8fdc1240ab.jpg" alt="">
                <div class="hot_info" style="display: none;">
                    <h2>公司要闻</h2>
                    <h3>NEWS</h3>
                    <dl>
                        <dd>
                            <a href="http://www.eulikind.com/yuezixun/qiyedongtai/gongsiyaowen/">
                                <span class="right">2017-01-24</span>
                                <span class="left">寒冬之行，温暖众心——优利康达高...</span>
                            </a>
                        </dd>
                        <dd>
                            <a href="http://www.eulikind.com/yuezixun/qiyedongtai/gongsiyaowen/">
                                <span class="right">2017-01-19</span>
                                <span class="left">上下同欲  锐意进取 ——优利康...</span>
                            </a>
                        </dd>
                        <dd>
                            <a href="http://www.eulikind.com/yuezixun/qiyedongtai/gongsiyaowen/">
                                <span class="right">2017-01-06</span>
                                <span class="left">优利康达又一重大项目在内蒙古青...</span>
                            </a>
                        </dd>
                    </dl>
                    <p>
                        <a href="http://www.eulikind.com/yuezixun/qiyedongtai/gongsiyaowen/">
                            <img src="image/da_cur.png"></a>
                    </p>
                </div>
            </div>
        </li>
        <li>
            <!--社会责任-->
            <div class="da-thumb-bor">
                <h2 class="tit_cn">人才招聘</h2>
                <h3 class="tit_en">TALENT RECRUITMENT</h3>
                <img src="file/685c976d446411f2b780579f4147e8bb.jpg" alt="">
                <div class="hot_info">
                    <h2>人才招聘</h2>
                    <h3>TALENT RECRUITMENT</h3>
                    <dl>
                    </dl>
                    <p>
                        <a href="http://www.eulikind.com/zhaorencai/xiaoyuanzhaopin/zhaopingangwei/">
                            <img src="image/da_cur.png">
                        </a>
                    </p>
                </div>
            </div>
        </li>
    </ul>
</div>

<script src="js/jquery-latest.js"></script>

<script src="js/hover.js"></script>


<script>
    <!--焦点显示-->
    $(document).ready(function () {

        $(".focus_content .f_turn").mouseleave(function () {
            $(".focus_content .f_turn").fadeToggle("1000", function () {
                $(this).parent().toggleClass("focus_hover");
            });

        });
        $(".focus_content p .f_up").click(function () {
            $(".focus_content .f_turn").fadeToggle("1000", function () {
                $(this).parent().toggleClass("focus_hover");
            });
        });

    });
</script>
<script>
    <!--焦点显示-->
    $(document).ready(function () {
        $(".f_wih .f_tit li").mouseenter(function (event) {
            $(this).addClass('f_current').siblings().removeClass('f_current');
        });
        $(".f_wih .f_tit").mouseleave(function () {
            $(".f_wih .f_tit li").removeClass('f_current');

        });
    });
</script>

<script type="text/javascript">
    $(function () {
         /*var zz=$('<span class="prev"></span><span class="next"></span>');
         $(".fullSlide").append(zz);*/

        jQuery(".device").slide({
            titCell: ".pagination",
            mainCell: ".swiper-wrapper",
            autoPlay: false,
            speed: 1000,
            autoPage: true,
            trigger: "click",
            startFun: function (i) {
                var curLi = jQuery(".device .swiper-wrapper .swiper-slide").eq(i);
                if (!!curLi.attr("href")) {
                    curLi.css(curLi.attr("href")).removeAttr("href")
                }

            }
        });
        /*jQuery(".arrow-left,.arrow-right").show();
        debugger;
        var h = $('.swiper-wrapper img').height();
        $('.swiper-wrapper').height();*/
    })
</script>   