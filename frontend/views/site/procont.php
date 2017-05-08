<?php

/* @var $this yii\web\View */

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
      <div class="nav_title_L"><img src="images/icon.gif"> <?php echo $pro['name'];?></div>
      <div class="nav_title_R"><img src="images/dqwz.gif"> <a href="index.php?r=site/index">首页</a> &gt; <?php echo $pro['name'];?></div>
    </div>
    <div class="con">
      <div class="pro_dt">
        <p align="center"><strong>建筑材料_39</strong></p>
        <div class="pro_dt_img" align="center"> <img src="images/20140821154336_10851.gif"> </div>
        <div style="width:819px; margin:0 auto; position:relative;"><img src="images/xxxx.gif"> <br>
        </div>

      </div>
    </div>
  </div>
  <div class="clear"></div>
  </div>
<?php include 'footer.php';?>