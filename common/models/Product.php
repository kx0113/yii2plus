<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $name
 * @property string $img_list
 * @property string $home_img
 * @property string $info
 * @property string $text
 * @property string $add_time
 * @property string $add_user
  * @property string $type
 * @property string $update_time
 * @property string $token
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','type',], 'required'],
            [['img_list', 'text'], 'string'],
            [['add_time', 'add_user', 'type','update_time', 'token'], 'integer'],
            [['name', 'home_img', 'info'], 'string', 'max' => 255],
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
            'img_list' => '图片列表',
            'home_img' => '封面',
            'info' => '简介',
            'text' => '内容',
            'add_time' => '创建时间',
            'add_user' => '创建人',
            'update_time' => '修改时间',
            'token' => '网站名称',
            'type'=>'产品分类',
        ];
    }
}
