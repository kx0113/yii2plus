<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property integer $type
 * @property integer $add_user
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $sort
 * @property integer $token
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['info'], 'string'],
            [['type', 'add_user', 'create_time', 'update_time', 'sort', 'token'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '标题',
            'info' => '内容',
            'type' => '分类',
            'add_user' => '创建人',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'sort' => '排序',
            'token' => '站点名称',
        ];
    }
}
