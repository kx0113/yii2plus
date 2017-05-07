<?php
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
<link type="text/css" href="css/css.css" rel="stylesheet">
</head>

<body>
<script src="js/jquery-1.js" type="text/javascript"></script> 
<script src="js/js1.htm" type="text/javascript"></script> 
<script type="text/javascript" src="js/ulRoll.js"></script>
<div class="top">
  <div class="head">
    <div class="logo"><a href="#"><img src="images/20141115101650.gif" align="top" height="114" border="0" width="364"></a></div>
    <div class="search"> <img src="images/tel.gif">
      <div class="search_Con">
        <form name="search" id="search" method="get" action="index.php">
          <div id="search">
            <input name="keyword" id="keyword" class="so_int" onfocus="if(this.value=='输入关键词'){this.value='';this.style='color:#999;'}" onblur="if(this.value=='') {this.value='输入关键词';this.style='color:#ccc;'}" type="text">
            <input value="productssearch" data-role="none" name="p" type="hidden">
            <input id="tijiao" value="" type="submit">
          </div>
          <!-- search -->
        </form>
      </div>
    </div>
  </div>
  <div class="menu">
    <ul>
      <?php foreach($menu as $k=>$v){?>
        <li><a href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a></li>
      <?}?>
    </ul>
  </div>
  <div class="ejbanner"><img src="images/ejbanner.gif"></div>
  <div class="line"></div>
</div>
<div class="paging">
  <div class="paging_L">
    <div class="L_title">分类展示</div>
    <div class="L_fl">
      <ul>
        <li><a href="#">行业新闻</a></li>
        <li><a href="#">公司新闻</a></li>
      </ul>
    </div>
    <div class="paging_lxwm">
      <div class="liubai167"></div>
      <div class="paging_lxwm_con">+13935123710 15110367895<br>
        +0351-7180866 5748965<br>
        <p> sunlei_jidian@163.com&nbsp; </p>
        <p> 山西.太原市.科技有限公司&nbsp; &nbsp;&nbsp; </p>
        地址：山西省太原市南内环街100号恒地大厦<br>
      </div>
    </div>
  </div>
  <div class="paging_R">
    <div class="paging_R_title">
      <div class="nav_title_L"><img src="images/icon.gif"> <?php echo $tit;?></div>
      <div class="nav_title_R"><img src="images/dqwz.gif"> <a href="index.php?r=site/index">首页</a> &gt; <?php echo $tit;?></div>
    </div>
    <div class="con">
      <div class="news_list">
        <ul>

          <?php foreach($news as $k1=>$v1){?>
            <li><a href="index.php?r=site/new-con&id=<?php echo $v1['id']; ?>&par=<?php echo $tit; ?>"><span class="mr">&nbsp;⊙&nbsp;<?php echo $v1['name'];?></span> <em>发布日期： <?php echo date('Y-m-d',$v1['create_time']); ?>&nbsp;</em></a> </li>
          <?}?>

        </ul>
        <div style="margin:50px 0 0 0;"><?= LinkPager::widget(['pagination' => $page]); ?></div>
        <div style="clear:both"></div>
      </div>
      <div style="clear:both"></div>
      <!--页码-->
      <ul id="ym">
        <li> </li>
      </ul>
      <!--页码--> 
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="bot">
  <div class="bot_center">
    <div class="dbxx"><img src="images/20141202015420_54093.png" alt="" align="left" height="59" width="139">Copyright &#169; 2014LCKEJ.com All Rights Reserved.<br>
      版权所有：dddd技术支持：科技集团<br>
    </div>
     
  </div>
</div>
</body>
</html>