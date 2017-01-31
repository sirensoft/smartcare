<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property integer $id
 * @property integer $plan_week_id
 * @property integer $patient_id
 * @property integer $provider_id
 * @property string $hospcode
 * @property string $date_visit
 * @property string $start_time
 * @property string $end_time
 * @property string $subjective
 * @property double $obj_weight
 * @property double $obj_heigh
 * @property double $obj_bmi
 * @property double $obj_temperature
 * @property integer $obj_pulse
 * @property integer $obj_rr
 * @property string $obj_bp
 * @property integer $obj_adl
 * @property string $asses_1
 * @property string $asses_2
 * @property string $asses_3
 * @property string $asses_4
 * @property string $asses_5
 * @property string $asses_6
 * @property string $asses_7
 * @property string $asses_8
 * @property string $asses_9
 * @property string $job_result
 * @property string $problem
 * @property string $next_plan
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_week_id', 'patient_id', 'provider_id', 'obj_pulse', 'obj_rr', 'obj_adl'], 'integer'],
            [['date_visit', 'start_time', 'end_time'], 'safe'],
            [['subjective', 'asses_1', 'asses_2', 'asses_3', 'asses_4', 'asses_5', 'asses_6', 'asses_7', 'asses_8', 'asses_9'], 'string'],
            [['obj_weight', 'obj_heigh', 'obj_bmi', 'obj_temperature'], 'number','message' => ''],
            [['hospcode'], 'string', 'max' => 5],
            [['obj_bp', 'job_result', 'problem', 'next_plan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_week_id' => 'Plan Week ID',
            'patient_id' => 'Patient ID',
            'provider_id' => 'ผู้เยี่ยมดูแล',
            'hospcode' => 'Hospcode',
            'date_visit' => 'วันเยี่ยม',
            'start_time' => 'เวลาเริ่มเยี่ยม',
            'end_time' => 'เวลาสิ้นสุดเยี่ยม',
            'subjective' => 'ปัญหา/ความต้องการ ของผู้ป่วยและครอบครัว',
            'obj_weight' => 'หนัก (กก)',
            'obj_heigh' => 'สูง (ซม)',
            'obj_bmi' => 'ดัชนีมวลกาย',
            'obj_temperature' => 'อุณหภูมิร่างกาย(C)',
            'obj_pulse' => 'ชีพจร',
            'obj_rr' => 'หายใจ',
            'obj_bp' => 'ความดัน',
            'obj_adl' => 'คะแนน ADL',
            'asses_1' => '1.การดูแลกิจวัตรประจำวันพื้นฐาน',
            'asses_2' => '2. การดูแลผู้มีอุปกรณ์การแพทย์',
            'asses_3' => '3. การให้ยา',
            'asses_4' => '4. การทำแผล และการเช็ดตัวลดไข้',
            'asses_5' => '5. การดูแลโภชนาการ',
            'asses_6' => '6. การดูแลสุขภาพจิต',
            'asses_7' => '7. การดูแลสภาพแวดล้อม',
            'asses_8' => '8. การจัดกิจกรรมออกกำลังกาย/นันทนาการ',
            'asses_9' => '9. การเฝ้าสังเกตและการส่งต่อ',
            'job_result' => 'ผลการปฏิบัติงาน',
            'problem' => 'ปํญหาที่เกิดขึ้นระหว่างปฏิบัติงาน',
            'next_plan' => 'แผนการช่วยเหลือดูแลในครั้งต่อไป',
        ];
    }
}
