<div class="top">
    <div class="head">
        <div class="logo"><a href="#"><img src="images/wew.png" align="top" height="114" border="0" width="364"></a></div>
        <div style="    width:365px;" class="search">
           <p style="padding:15px 0 0 0;float:right;font-size: 18px;">免费服务热线：
               <span style="color:#F00;font-size: 20px;"><?php echo $proclass[1]['web_tel']; ?></span>
           </p>
        </div>
    </div>
    <div class="menu">
        <ul>
            <?php foreach($menu as $k=>$v){?>
                <li><a href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a></li>
            <?}?>

        </ul>
    </div>
</div>
<!--banner-->
