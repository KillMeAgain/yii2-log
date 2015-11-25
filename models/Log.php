<?php

namespace bigm\log\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "log".
 *
 * @property integer $id
 * @property string $level
 * @property integer $ip
 * @property string $data
 * @property string $tag
 * @property integer $created_at
 * @property integer $updated_at
 */
class Log extends \yii\db\ActiveRecord
{
    public function behaviors(){
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data'], 'string'],
            [['level', 'tag'], 'string', 'max' => 128],
            ['tag' , 'default' ,'value' => 'INFO']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'LEVEL',
            'ip' => 'IP',
            'data' => 'DATA',
            'tag' => 'TAG',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
        ];
    }
}
