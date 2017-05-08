<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Y+后台管理系统';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div style="margin:70px 0 0 0;" class="panel panel-default">
    <div style="width:100%;padding: 10px 40px 10px 40px;">

        <div class="panel-heading"> <h3>欢迎使用</h3></div>


    <div class="row">
        <div class="">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('用户名') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>

                

                <div class="form-group">
                    <?= Html::submitButton('登陆', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div></div>

    </div>
<!--    <div class="footer">-->
<!--        <div class="">Copyright &copy; 2012-2017-->
<!--        </div>-->
<!--    </div>-->
</div>



