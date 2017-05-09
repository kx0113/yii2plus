<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Web */

$this->title = '【'.$name.'】基础信息' ;
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
                            <form method="get" id="form_info_str" class="form-horizontal">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否开启网站</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" id="start" >
                                            <option
                                                <?php
                                                if(!empty($data['start'])){
                                                if($data['start']=='1'){
                                                    echo 'selected = "selected"';
                                                }elseif($data['start']==''){
                                                    echo 'selected = "selected"';
                                                }
                                                }
                                                ?>
                                                value="1">开启</option>
                                            <option
                                                <?php
                                                if(!empty($data['start'])){
                                                if($data['start']=='2'){
                                                    echo 'selected = "selected"';
                                                }}
                                                ?>
                                                value="2">关闭</option>
                                        </select>
                                        <span class="help-block m-b-none" style="color:#f00;">请谨慎操作此项！</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站关闭显示文字</label>
                                    <div class="col-sm-10">
                                        <textarea id="webexitmsg" rows="6"  class="form-control" required aria-required="true"><?php if(!empty($data['webexitmsg'])) echo $data['webexitmsg']; ?></textarea>
                                        <span class="help-block m-b-none">如开启网站关闭功能，展示给访问用户的信息</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站标题</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="title" value="<?php if(!empty($data['title'])) echo $data['title']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="webname" value="<?php if(!empty($data['webname'])) echo $data['webname']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="weburl" value="<?php if(!empty($data['weburl'])) echo $data['weburl']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站关键词</label>
                                    <div class="col-sm-10">
                                        <textarea id="keywords" rows="6"  class="form-control" required aria-required="true"><?php if(!empty($data['keywords'])) echo $data['keywords']; ?></textarea>
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站描述</label>
                                    <div class="col-sm-10">
                                        <textarea id="description" rows="6"  class="form-control" required aria-required="true"><?php if(!empty($data['description'])) echo $data['description']; ?></textarea>
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">服务电话</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="service_tel" value="<?php if(!empty($data['service_tel'])) echo $data['service_tel']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">公司电话</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="company_tel" value="<?php if(!empty($data['company_tel'])) echo $data['company_tel'];  ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">传真</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="fax" value="<?php if(!empty($data['fax'])) echo $data['fax']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">手机</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="mobile"
                                               value="<?php if(!empty($data['mobile'])) echo $data['mobile']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">联系人</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="webcontacts"
                                               value="<?php if(!empty($data['webcontacts'])) echo $data['webcontacts']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">邮编</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="postcode"
                                               value="<?php if(!empty($data['postcode'])) echo $data['postcode']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">公司邮箱</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="email"
                                               value="<?php if(!empty($data['email'])) echo $data['email']; ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">公司全称</label>
                                    <div class="col-sm-10">
                                        <input value="<?php if(!empty($data['company_name'])) echo $data['company_name']; ?>"
                                               type="text" id="company_name" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">公司地址</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="address" value="<?php if(!empty($data['address'])) echo $data['address']; ?>"
                                               class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">首页关于我们</label>
                                    <div class="col-sm-10">
                                        <textarea id="indexabout" rows="6"  class="form-control" required aria-required="true"><?php if(!empty($data['indexabout'])) echo $data['indexabout']; ?></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">首页公司简介</label>
                                    <div class="col-sm-10">
                                        <textarea id="indexcompany" rows="6"  class="form-control" required aria-required="true"><?php if(!empty($data['indexcompany'])) echo $data['indexcompany']; ?></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">首页联系我们</label>
                                    <div class="col-sm-10">
                                        <textarea id="indexcontact" rows="6"  class="form-control" required aria-required="true"><?php if(!empty($data['indexcontact'])) echo $data['indexcontact']; ?></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">备案号</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="records" value="<?php  if(!empty($data['records'])) echo $data['records'];  ?>" class="form-control">
                                        <span class="help-block m-b-none"></span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站底部</label>
                                    <div class="col-sm-10">
                                        <div id="editor"  style="width:100%;height:300px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">

                                        <a class="btn btn-success btn_save" href="javascript:void(0);">提交</a>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                            </form>


                        </div></div></div></div></div></div></div>

<script type="text/javascript">

    var ue = UE.getEditor('editor');
    $(".btn_save").click(function(){
        var company_name=company_name=$("#company_name").val();
        var service_tel=$("#service_tel").val();
        var par={};
        par.footer=UE.getEditor('editor').getContent();
        par.id="<?php echo $data['id']; ?>";
        par.start=$("#start option:selected").val();
        par.service_tel=service_tel;
        par.company_tel=$("#company_tel").val();
        par.fax=$("#fax").val();
        par.webexitmsg=$("#webexitmsg").val();
        par.records=$("#records").val();
        par.title=$("#title").val();
        par.indexabout=$("#indexabout").val();
        par.indexcompany=$("#indexcompany").val();
        par.description=$("#description").val();
        par.keywords=$("#keywords").val();
        par.webcontacts=$("#webcontacts").val();
        par.mobile=$("#mobile").val();
        par.postcode=$("#postcode").val();
        par.email=$("#email").val();
        par.webname=$("#webname").val();
        par.weburl=$("#weburl").val();
        par.indexcontact=$("#indexcontact").val();
        par.company_name=company_name;
        par.address=$("#address").val();
        //console.log(par);return false;
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