<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Web;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品分类';
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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'info',
//            'add_time:datetime',
            [
                'attribute' => 'add_time',
                'value'=>
                    function($model){
                        if(!empty($model->add_time)){
                            return Yii::$app->formatter->asDate($model->add_time,"php:Y-m-d H:i:s");
                        }
                    }
            ],
            [
                'attribute' => 'add_user',
                'value'=>
                    function($model){
                        return User::get_username($model->add_user);
                    },
            ],
//            'add_user',
            // 'token',
            [
                'attribute' => 'token',
                'value'=>
                    function($model){
                        return Web::GetWebName($model->token);
                    },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
                        </div></div></div></div></div></div></div>
