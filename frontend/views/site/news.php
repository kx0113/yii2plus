<?php
use yii\widgets\LinkPager;
?>

<link type="text/css" href="css/css.css" rel="stylesheet">

<script src="js/jquery-1.js" type="text/javascript"></script> 
<script src="js/js1.htm" type="text/javascript"></script> 
<script type="text/javascript" src="js/ulRoll.js"></script>
<?php include 'header.php';?>
<div class="ejbanner"><img src="images/ejbanner.gif"></div>
<div class="line"></div>
<div class="paging">
  <?php include 'left.php';?>
  <div class="paging_R">
    <div class="paging_R_title">
      <div class="nav_title_L"><img src="images/icon.gif"> <?php echo $tit;?></div>
      <div class="nav_title_R"><img src="images/dqwz.gif"> <a href="index.php?r=site/index">首页</a> &gt; <?php echo $tit;?></div>
    </div>
    <div class="con">
      <div class="news_list">
        <ul>

          <?php foreach($news as $k1=>$v1){?>
            <li><a href="index.php?r=site/new-con&id=<?php echo $v1['id']; ?>&par=<?php echo $tit; ?>">
                <span class="mr">&nbsp;⊙&nbsp;<?php echo mb_substr($v1['name'],0,40,'utf-8'); ?></span>
                <em>发布日期： <?php echo date('Y-m-d',$v1['create_time']); ?>&nbsp;</em></a> </li>
          <?}?>

        </ul>
        <div style="margin:50px 0 0 0;"><?= LinkPager::widget(['pagination' => $page]); ?></div>
        <div style="clear:both"></div>
      </div>
      <div style="clear:both"></div>
      <!--页码-->
      <!--页码--> 
    </div>
  </div>
</div>
<div class="clear"></div>
<?php include 'footer.php';?>
