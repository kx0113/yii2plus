<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property integer $add_time
 * @property integer $add_user
 * @property integer $token
 */
class ProductType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['add_time', 'add_user', 'token'], 'integer'],
            [['name', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'info' => '简介',
            'add_time' => '创建时间',
            'add_user' => '创建人',
            'token' => '网站名称',
        ];
    }
    public function get_type_list(){
        $session=Yii::$app->session;
        $new_list=ProductType::find()->where(['token'=>$session->get('web_id')])->all();
        $result = ArrayHelper::map(array_merge(array(array('id'=>'','name'=>'- 请选择 -')),$new_list), 'id', 'name');
        return $result;
    }
    public static function get_type_name($id){
        $session=Yii::$app->session;
        $res=ProductType::find()->select('name')->where(['id'=>$id,'token'=>$session->get('web_id')])->asArray()->one();
        return $res['name'];
    }
}
