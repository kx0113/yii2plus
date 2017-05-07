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
      <div class="nav_title_L"><img src="images/icon.gif"> 服务项目</div>
      <div class="nav_title_R"><img src="images/dqwz.gif"> <a href="index.php?r=site/index">首页</a> &gt; 服务项目</div>
    </div>
    <div class="con">
      <div class="case_list">
        <ul>

          <?php foreach($product as $k15=>$v15){?>
            <li>
              <h1><a href="index.php?r=site/pro-cont&id=<?php echo $v15['id']; ?>"><img src="images/20140821154336_38276.gif"></a></h1>
              <h2><a style="display:block;width:187px;height:30px;line-height: 30px;"
                     href="index.php?r=site/pro-cont&id=<?php echo $v15['id']; ?>">
                  <?php echo mb_substr($v15['name'],0,10,'utf-8'); ?>
                  </a></h2>
            </li>
          <?}?>


          
          <div style="clear: both"></div>
        </ul>
        <!--pro_list2-->


      </div>
      <!--页码-->
      <div style="margin:20px 0 0 10px;"><?= LinkPager::widget(['pagination' => $page]); ?></div>
    </div>
  </div>
</div>
<div class="clear"></div>

<?php include 'footer.php';?>