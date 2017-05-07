<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Web */

$this->title = $name.'_网站底部信息' ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins">
        <div class="ibox-content">
            <p>
                <?= Html::encode($this->title) ?>
            </p>

            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">

                            <div id="editor" name="Product[text]" style="width:1024px;height:500px;">
                            </div><br><br><br>
                            <a class="btn btn-success btn_save" href="javascript:void(0);">提交</a>
                        </div></div></div></div></div></div></div>

<script type="text/javascript">
    var ue = UE.getEditor('editor');
    $(".btn_save").click(function(){
        var par={};
        par.footer=UE.getEditor('editor').getContent();
        par.id="<?php echo $data['id']; ?>";

        $.post("index.php?r=web/save-foot",par,function(data){
            if(data.msg=='1'){
                alert('操作成功！');
                location.reload();
                return false;
            }else{
                alert('操作失败！');
                return false;
            }
        },'json');
    });


    function setContent() {
        UE.getEditor('editor').setContent('<?php  if(!empty($data['footer'])) echo $data['footer']; ?>');
    }
    window.onload = function(){
//        alert(1);
        setContent();
    };
    function test(){
        setContent();
    }
    var t1=setTimeout("test()",1000);

</script>