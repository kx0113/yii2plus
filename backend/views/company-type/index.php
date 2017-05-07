<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Web;
use common\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanyTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目分类';
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
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
                                'layout' => '{items}{summary}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            'name',
            'sort',
//            'create_at',
            [
                'attribute' => 'create_at',
                'value'=>
                    function($model){
                        if(!empty($model->create_at)){
                            return Yii::$app->formatter->asDate($model->create_at,"php:Y-m-d H:i:s");
                        }
                    }
            ],
//            'user_id',
            [
                'attribute' => 'user_id',
                'value'=>
                    function($model){
                        return User::get_username($model->user_id);
                    },
            ],
            [
                'attribute' => 'token',
                'value'=>
                    function($model){
                        return Web::GetWebName($model->token);
                    },
            ],
//            'token',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div></div></div></div></div></div></div>
