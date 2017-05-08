<div class="paging_L">
    <div class="L_title">服务类型</div>
    <div class="L_fl">
        <ul>
            <?php foreach($proclass[0] as $k151=>$v151){?>
            <li><a href="index.php?r=site/product&id=<?php echo $v151['id']; ?>">
                    <?php echo mb_substr($v151['name'],0,10,'utf-8'); ?>
                </a></li>
            <?}?>
        </ul>
    </div>
    <div class="paging_lxwm">
<!--        'tel'=>'123321',-->
<!--        'telr'=>'121212eee',-->
<!--        'email'=>'12112@qq.com',-->
<!--        'com'=>'fdfdfdfdf',-->
<!--        'are'=>'sdfsdfs-->
        <div class="liubai167"></div>
        <div class="paging_lxwm_con"><?php echo $proclass[1]['company_tel']; ?><br>
            <?php echo $proclass[1]['fax']; ?><br>
            <p> <?php echo $proclass[1]['email']; ?> </p>
            <p> <?php echo $proclass[1]['company_name']; ?>&nbsp; &nbsp;&nbsp; </p>
            <?php echo $proclass[1]['address']; ?><br>
        </div>
    </div>
</div>
<style>
    .L_fl li:hover a{
        color:#FFF;
    }
</style>