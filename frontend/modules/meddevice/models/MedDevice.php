<?php

namespace frontend\modules\meddevice\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "med_device".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property string $device_name
 * @property string $device_from
 * @property string $get_date
 * @property string $send_date
 * @property string $device_status
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property string $updated_by
 */
class MedDevice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id'], 'integer'],
            [['patient_id','device_name','device_from'],'required'],
            [['get_date', 'send_date', 'created_at', 'updated_at'], 'safe'],
            [['device_status'], 'string'],
            [['device_name', 'device_from', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'ชื่อ-สกุล',
            'device_name' => 'ชื่ออุปกรณ์',
            'device_from' => 'ยืมจากหน่วยงาน',
            'get_date' => 'วดป.ที่ยืม',
            'send_date' => 'วดป.ที่ส่งคืน',
            'device_status' => 'สถานะการยืม',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    public function behaviors() {
        return [
        [
          'class' => TimestampBehavior::className(),
           'value'=>new Expression("NOW()")
         ],
        BlameableBehavior::className()
        ];
    }
}
