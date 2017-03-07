<?php

namespace frontend\models\test;

use Yii;

/**
 * This is the model class for table "test_person".
 *
 * @property string $hospcode
 * @property string $pid
 * @property string $name
 * @property string $lname
 */
class TestPerson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'pid'], 'required'],
            [['hospcode'], 'string', 'max' => 5],
            [['pid', 'name', 'lname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'Hospcode',
            'pid' => 'Pid',
            'name' => 'Name',
            'lname' => 'Lname',
        ];
    }
}
