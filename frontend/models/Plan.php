<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property integer $id
 * @property string $patient_id
 * @property string $title
 * @property string $start_date
 * @property string $start_time
 * @property string $end_date
 * @property string $end_time
 * @property string $color
 * @property string $bg_color
 * @property string $border_color
 * @property string $text_color
 * @property string $provider_id
 * @property string $care_date
 * @property string $care_time
 * @property string $weight
 * @property string $height
 * @property decimal $waist Description
 * @property string $pulse
 * @property string $temp
 * @property string $sbp
 * @property string $dbp
 * @property string $rr
 * @property string $sugar
 * @property string $note
 * @property string $is_done
 * @property string $d_create
 * @property string $d_update
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_care';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id','title','start_date'], 'required'],
            [['start_date'],'safe'],
            [['start_time','waist'],'safe'],
            [['title', 'note','is_done'], 'string'],
            [['end_date', 'end_time', 'care_date', 'care_time', 'd_create', 'd_update'], 'safe'],
            [['patient_id', 'color', 'bg_color', 'border_color', 'text_color', 'provider_id', 'weight', 'height', 'pulse', 'temp', 'sbp', 'dbp', 'rr', 'sugar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'รหัสผู้ป่วย',
            'title' => 'กิจกรรมการดูแล',
            'start_date' => 'วันที่',
            'start_time' => 'เวลา',
            'end_date' => 'End Date',
            'end_time' => 'End Time',
            'color' => 'Color',
            'bg_color' => 'Bg Color',
            'border_color' => 'Border Color',
            'text_color' => 'Text Color',
            'provider_id' => 'ผู้ดูแล',
            'care_date' => 'Care Date',
            'care_time' => 'Care Time',
            'weight' => 'น้ำหนัก(กก)',
            'height' => 'ส่วนสูง(ซม)',
            'waist'=>'รอบเอว(ซม)',
            'pulse' => 'ชีพจร',
            'temp' => 'อุณหภูมิ',
            'sbp' => 'ความดัน(บน)',
            'dbp' => 'ความดัน(ล่าง)',
            'rr' => 'อัตราหายใจ',
            'sugar' => 'ค่าน้ำตาล',
            'note' => 'หมายเหตุ',
            'is_done'=>'ได้รับการดูแล',
            'd_create' => 'D Create',
            'd_update' => 'D Update',
        ];
    }
}
