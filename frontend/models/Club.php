<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "club".
 *
 * @property integer $id
 * @property string $name
 * @property string $addr
 * @property string $date_begin
 * @property string $date_end
 * @property integer $member
 * @property string $status
 * @property string $register_no
 * @property string $budget
 * @property string $hospcode
 * @property string $note
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hospcode'], 'required'],
            [['addr', 'status', 'note'], 'string'],
            [['date_begin', 'date_end'], 'safe'],
            [['member'], 'integer'],
            [['budget'], 'number'],
            [['name', 'register_no'], 'string', 'max' => 255],
            [['hospcode'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อชมรม',
            'addr' => 'ที่ทำการ',
            'date_begin' => 'วันเริ่มก่อตั้ง',
            'date_end' => 'วันยุติ',
            'member' => 'สมาชิก',
            'status' => 'สถานะ',
            'register_no' => 'ทะเบียนเลขที่',
            'budget' => 'งบประมาณ',
            'hospcode' => 'Hospcode',
            'note' => 'หมายเหตุ',
        ];
    }
}
