<?php

/* @var $this yii\web\View */
$this->description = $proclass[1]['description'];
$this->keywords = $proclass[1]['keywords'];
$this->title = $proclass[1]['title'];
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
      <div class="nav_title_L"><img src="images/icon.gif"> <?php echo $tit; ?></div>
      <div class="nav_title_R"><img src="images/dqwz.gif"> <a href="index.php?r=site/index">首页</a> &gt; <?php echo $tit; ?></div>
    </div>
    <div class="con">
      <div class="news_dt">
        <h1><?php echo $news['name']; ?></h1>
        <h2>时间：<?php echo date('Y-m-d H:i:s',$news['create_time']); ?> </h2>
        <?php echo $news['info']; ?>
<!--        <div>-->
<!--          <div class="page"> 上一条：-->
<!--            暂无 <br>-->
<!--            下一条： <a href="#">金属屋面防水施工方案（通用版）</a> </div>-->
<!--        </div>-->
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
<?php include 'footer.php';?>