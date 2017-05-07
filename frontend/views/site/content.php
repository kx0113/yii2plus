
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
      <div>
        <div>
          <div>
            <p> <span> </span></p>
            <div>
              <div>
                <div>
                 <?php echo $cont['content']; ?>
                </div>
                <div> </div>
              </div>
            </div>
            <p></p>
            <p> <span></span> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
<?php include 'footer.php';?>
