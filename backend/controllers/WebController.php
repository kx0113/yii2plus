<?php

namespace backend\controllers;

use Yii;
use common\models\Web;
use common\models\WebSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\WebCommon;
use yii\helpers\Json;

/**
 * WebController implements the CRUD actions for Web model.
 */
class WebController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    /**
     * @return array|int|null|\yii\db\ActiveRecord
     * 判断当前站点是否在webcommon表中已创建数据
     */
    public function get_web_common_info(){
        $model=new WebCommon();
        $web_id=Yii::$app->session->get('web_id');
        $web_info=$model->find()->where(['token'=>$web_id])->asArray()->one();
        if(!empty($web_info)){
            return $web_info;
        }else{
            return 0;
        }
    }
    /**
     * 上传logo跟banner
     */
    public function actionImg(){
        $model=new WebCommon();
        $id=Yii::$app->request->get('id');
        $mf=$model->findOne($id);
        //单张上传
        if(Yii::$app->request->get('par')=='1'){
            $img = Yii::$app->imgload->UploadPhoto($model,'uploads/','logo');
            $mf->logo=$img;
        }elseif(Yii::$app->request->get('par')=='2'){
            //多张上传
            $img = Yii::$app->imgload->UploadPhoto($model,'uploads/','banner');
            $mf1=$model->find()->where(['id'=>$id])->asArray()->one();
            if(!empty($mf1['banner'])){
                $mf->banner=$mf1['banner'].','.$img;
            }else{
                $mf->banner=$img;
            }
        }else{
            echo json::encode(array('msg'=>'0'));
        }
        $res=$mf->save();
        if($res){
            echo json::encode(array('msg'=>'1'));
        }else{
            echo json::encode(array('msg'=>'0'));
        }
    }
    /**
     * 删除产品列表单张照片
     */
    public function actionProductDelImg(){
        $model=new WebCommon();
        $id=Yii::$app->request->get('id');
        $key=Yii::$app->request->get('key');
        $mf1=$model->find()->where(['id'=>$id])->asArray()->one();
        $img_list=explode(',',$mf1['banner']);
        unset($img_list[$key]);
        $new_str=implode(',',$img_list);
        $mf=$model->findOne($id);
        $mf->banner=$new_str;
        $res=$mf->save();
        if($res){
            echo json_encode(array('msg'=>'success'));
        }else{
            echo json_encode(array('msg'=>'error'));
        }
    }
    /**
     * logo and banner upload
     */
    public function actionLogoBanner(){
        $model=new WebCommon();
        $wi=$this->get_web_common_info();
        if(!empty($wi)){
           $data=$wi;
        }else{
            $model->token=Yii::$app->session->get('web_id');
            $model->save();
            $wi=$this->get_web_common_info();
            $data=$wi;
        }
        return $this->render('img', [
            'data'=>$data,
            'name' => $this->web_name(),
        ]);
    }

    /**
     * 保存网站底部信息
     */
    public function actionSaveFoot(){
        $model=new WebCommon();
        $id=Yii::$app->request->post('id');
        $str= serialize($_POST);
        $models = $model->findOne($id);
        $models->footer=$str;
        $res=$models->save();
        if ($res) {
            echo json_encode(array('msg'=>'1'));
        }else{
            echo json_encode(array('msg'=>'2'));
        }
    }
    /**
     * 网站底部
     */
    public function actionWebFooter(){
        $model=new WebCommon();
        $wi=$this->get_web_common_info();
        $info=unserialize($wi['footer']);
//        var_dump();exit;
        if(!empty($wi)){
            $data=$info;
        }else{
            $model->token=Yii::$app->session->get('web_id');
            $model->save();
            $wi=$this->get_web_common_info();
            $data=$info;
        }
        return $this->render('footer', [
            'data'=>$data,
            'name' => $this->web_name(),
        ]);
    }

    /**
     * @return mixed
     * 获取当前站点名称
     */
    public function web_name(){
        $web_id=Yii::$app->session->get('web_id');
        $res=Web::find()->where(['id'=>$web_id])->asArray()->one();
        return $res['name'];
    }
    /**
     * 网站电话
     */
    public function actionWebTel(){
        return $this->render('tel', [
            'name' => $this->web_name(),
        ]);
    }
    /**
     * Lists all Web models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WebSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Web model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Web model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Web();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * post提交web id
     */
    public function actionAjaxWebSession(){
        $session=Yii::$app->session;
        $web_id=$session->get('web_id');
        if(!empty($web_id)){
            $session->set('web_id',$_POST['id']);
            echo json_encode(array('msg'=>1));
        }
    }
    /**
     * Updates an existing Web model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Web model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Web model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Web the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Web::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
