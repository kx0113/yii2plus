<?php

/* @var $this yii\web\View */

$this->title = $proclass[1]['title'];
?>
<link type="text/css" href="css/css.css" rel="stylesheet">
<script src="js/jquery-1.js" type="text/javascript"></script>
<!--滚动-->
<link href="css/jo.css" rel="stylesheet" type="text/css">
<!--banner-->
<script type="text/javascript">
    $(document).ready(function(){
        $('.banner').each(function() {
            var $showPic =$(this).find('.bannerxList li');
            var $btonBox=$(this).find('.bannerxBton');
            var _n=0;
            var _vt=3000;
            var _vf=2000;
            var timer;
            //生成角标
            for(i=1;i<=$showPic.length;i++){
                $btonBox.append('<li>'+'</li>');
            }
            var $btonList=$btonBox.children('li');
            //鼠标事件
            $btonList.each(function(e){
                $(this).hover(function(){
                    clearInterval(timer);
                    showImg(e);
                    _n=e;
                },function(){
                    timer = setInterval(auto,_vt);
                });
            });
            //图片轮换
            var showImg= function(n){
                $showPic.eq(n).fadeIn(_vf).siblings().fadeOut();
                $btonList.eq(n).addClass('up').siblings().removeClass('up');

            }
            //自动播放
            var auto=function(){
                showImg(_n);
                _n++
                if(_n == $showPic.length){_n=0;}
            }
            timer = setInterval(auto,_vt);
            showImg(_n);
            _n++;

        });

    });
</script>
<script type="text/javascript" src="js/ulRoll.js"></script>
<?php include 'header.php';?>
<div style="height: 473.134px;" class="banner">
    <div style="height: 438.134px;" class="bannerx">
        <ul class="bannerxList">
            <?php foreach($banner as $k1=>$v1){?>

            <?}?>
            <li style="opacity: 0.507854;"><a href="javascript:void(0)"> <img style="width: 1423px; height: 438.134px;" src="images/20140828150856_38155.jpg"></a></li>
            <li style="display: list-item; opacity: 0.0239887;"><a href="javascript:void(0)"> <img style="width: 1423px; height: 438.134px;" src="images/20140828150444_89818.gif"></a></li>
            <li style="display: none;"><a href="javascript:void(0)"> <img style="width: 1423px; height: 438.134px;" src="images/20140828150437_59567.gif"></a></li>
        </ul>
        <ul class="bannerxBton">
            <li class=""></li>
            <li class="up"></li>
            <li></li>
        </ul>
    </div>
    <script>
        $(function(){
            var wid=$(window).width();
            var he=wid/1900*585;
            var hehe=he+35;
            $(".banner").css("height",hehe);
            $(".bannerx").css("height",he);
            $(".bannerxBox").css("height",he);
            $(".bannerxBox").css("width",wid);
            $(".bannerxBox").css("margin","0 auto");
            $(".bannerxList li a img").css("width",wid);
            $(".bannerxList li a img").css("height",he);
            //alert(wid);
        })
    </script>
</div>
<div class="main">
    <div class="main_Con">
        <div class="main_Con_t">
            <div class="main_Con_t_L">
<!--                images/20140821062919_74525.gif-->
<!--                D:/WWW/Yii2plus/backend/web/uploads/20170506/20170506_180151_1111024649.png-->
                <div class="title"><img src="images/icon.gif"> 关于我们 <span>ABOUT US</span></div>
                <div class="index_gywm"> <img src=" images/20140821062919_74525.gif" alt="" style="padding-right:10px;" align="left"><?php echo $proclass[1]['indexabout']?><br><a href="index.php?r=site/intro&id=1220&name=关于我们"><img src="images/ckxx.gif"></a> </div>
            </div>
            <div class="main_Con_t_M">
                <div class="title"><img src="images/icon.gif"> 新闻中心 <span>NEWS</span> <span class="more"><a href="index.php?r=site/news&id=1&par=新闻中心">+MORE</a></span></div>
                <div class=" ">

                    <div class="index_news_list">
                        <ul>
                            <?php foreach($news as $k3=>$v3){?>
                                <li><img src="images/icon1.gif">&nbsp;&nbsp;<a href="index.php?r=site/new-con&id=<?php echo $v3['id']; ?>&par=新闻中心">
                                        <?php echo mb_substr($v3['name'],0,16,'utf-8'); ?><span class="mr">
                                            <?php echo date('Y-m-d',$v3['create_time']); ?></span></a> </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_Con_t_R">
                <div class="index_lxwm">
                    <div class="liubai">&nbsp;</div>
                    <div class="index_lxwm_Con"> <a href="index.php?r=site/intro&id=1218&name=上门维修">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上门维修</a><br>
                        <a href="index.php?r=site/intro&id=1217&name=联系我们">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联系我们</a> </div>
                </div>
            </div>
        </div>
        <!--产品展示-->
        <div class="main_Con_b">
            <div class="title"><img src="images/icon.gif"> 服务项目 <span>SERVICE&nbsp;PROJECT</span> <span class="more"><a href="index.php?r=site/product">+MORE</a>&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
            <div class="index_pro">
                <div class="pro_02">
                    <div class="pro_02_01" id="colee_left">
                        <ul>
                            <?php foreach($product as $k2=>$v2){ ?>
                                <li>
                                    <h1><a href="#"><img src="./<?php echo $v2['home_img'];?>"></a></h1>
                                    <h2><a href="#">
                                            <?php echo mb_substr($v2['name'],0,10,'utf-8'); ?>
                                            </a></h2>
                                </li>
                           <? }?>


                        </ul>
                        <script type="text/javascript">
                            var colee_left = new ulRoll("colee_left", "1", 20);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<?php include 'footer.php';?>
