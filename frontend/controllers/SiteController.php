<?php
namespace frontend\controllers;

//use Faker\Provider\zh_CN\Company;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\FrontMenu;
use common\models\WebCommon;
use common\models\Product;
use common\models\News;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use common\models\Company;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $session_web_id;
    public $company_type_model;
    public function init(){
        parent::init();
        Yii::$app->session->set('web_id',1);
        $this->session_web_id=Yii::$app->session->get('web_id');
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionMains(){
        return $this->render('main',[

        ]);
    }

    /**
     * 联系我们
     */
    public function actionAbout()
    {
        return $this->render('content',[
            'tit'=>'联系我们',
            'cont'=>$this->project(1217),
            'menu'=>$this->common_nav(),
        ]);
    }

    /**
     * 关于我们
     */
    public function actionIntro(){
        return $this->render('content',[
            'tit'=>'关于我们',
            'cont'=>$this->project(1220),
            'menu'=>$this->common_nav(),
        ]);
    }
    /**
     * 上门维修
     */
    public function actionMaintain(){
        return $this->render('content',[
            'tit'=>'上门维修',
            'cont'=>$this->project(1218),
            'menu'=>$this->common_nav(),
        ]);
    }

    /**
     * 服务中心
     */
    public function actionProject(){
        return $this->render('content',[
            'tit'=>'服务中心',
            'cont'=>$this->project(1219),
            'menu'=>$this->common_nav(),
        ]);
    }
    /**
     * 项目
     */
    public function project($id){
        $cont=Company::find()->where(['id'=>$id,'token'=>$this->session_web_id])->asArray()->one();
        return $cont;
    }
    /**
     * 新闻中心列表
     */
    public function actionNews(){
        $id=Yii::$app->request->get('id');
        $data = News::find()->andWhere(['type'=>$id,'token'=>$this->session_web_id]);
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '10']);
        $news = $data->offset($pages->offset)->limit($pages->limit)
           ->orderBy(['create_time' => SORT_DESC])->all();
        return $this->render('news',[
            'news'=>$news,
            'page'=>$pages,
            'tit'=>Yii::$app->request->get('par'),
            'menu'=>$this->common_nav(),
        ]);
    }
    /**
     * 新闻详情
     */
    public function actionNewCon(){
        $id=Yii::$app->request->get('id');
        $new=new News();
        $news=$new->find()->where(['id'=>$id,'token'=>$this->session_web_id])->one();
        return $this->render('news_con',[
            'news'=>$news,
            'tit'=>Yii::$app->request->get('par'),
            'menu'=>$this->common_nav(),
        ]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     * 公共导航
     */
    public function common_nav(){
        //nav
        $menu_list=new FrontMenu();
        $menu_list_s=$menu_list->find()->where(['token'=>$this->session_web_id])
            ->orderBy(['sort' => SORT_DESC])->asArray()->all();
        return $menu_list_s;
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        //banner
        $WebCommon=WebCommon::find()->where(['token'=>$this->session_web_id])->asArray()->one();
        $banner=$WebCommon['banner'];
        $banner_list=explode(',',$banner);
        //logo
        //news
        $new_m=new News();
        $news=$new_m->find()->where(['type'=>1,'token'=>$this->session_web_id])->asArray()->limit(8)->all();
        //product
        $pro_m=new Product();
        $product=$pro_m->find()->where(['token'=>$this->session_web_id])->limit(10)->asArray()->all();
        return $this->render('index',[
            'menu'=>$this->common_nav(),
            'banner'=>$banner_list,
            'product'=>$product,
            'news'=>$news,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
         $model->load($_POST);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return \yii\bootstrap\ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
