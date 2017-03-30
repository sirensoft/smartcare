<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_right".
 *
 * @property string $rightcode
 * @property string $mapright
 * @property string $rightname
 * @property string $rightgroup
 * @property string $rightcodedrg
 * @property string $rightgroupname
 */
class CRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rightcode', 'mapright'], 'required'],
            [['rightcode'], 'string', 'max' => 4],
            [['mapright'], 'string', 'max' => 40],
            [['rightname', 'rightgroupname'], 'string', 'max' => 255],
            [['rightgroup'], 'string', 'max' => 1],
            [['rightcodedrg'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rightcode' => 'Rightcode',
            'mapright' => 'รหัส',
            'rightname' => 'สิทธิรักษา',
            'rightgroup' => 'Rightgroup',
            'rightcodedrg' => 'Rightcodedrg',
            'rightgroupname' => 'กลุ่มสิทธิ',
        ];
    }
}
