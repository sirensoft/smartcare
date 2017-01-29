<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "logbook".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $cg_id
 * @property integer $cm_id
 * @property string $pp
 * @property string $cc
 * @property string $pi
 * @property string $fh
 * @property string $ph
 * @property string $mh
 * @property string $nu
 * @property string $he
 * @property string $sh
 * @property string $pe
 * @property string $me
 * @property string $pl
 * @property string $pm
 * @property string $co
 * @property string $d_update
 */
class Logbook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logbook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['id'], 'required'],
            [['id', 'patient_id', 'cg_id', 'cm_id'], 'integer'],
            [['pp','cc', 'pi', 'fh', 'ph', 'mh', 'nu', 'he', 'sh', 'pe', 'me', 'pl', 'pm', 'co'], 'string'],
            [['d_update'], 'safe'],
            ['patient_id', 'unique', 'targetClass' => '\frontend\models\Logbook', 'message' => 'คนไข้รายนี้มีในระบบแล้ว'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'cg_id' => 'Cg ID',
            'cm_id' => 'Cm ID',
            'pp' => '1. Patient Profile :',
            'cc' => '2. Chief Complaint : อาการสำคัญที่พบ / สภาพปัญหาของผู้ป่วย',
            'pi' => '3. Present Illness : ประวัติการเจ็บป่วย',
            'fh' => '4. Family History : ประวัติการเจ็บป่วย/โรคประจำตัวในครอบครัว',
            'ph' => '5. Personal History (and usual habits) : ประวัติส่วนตัวและอุปนิสัยของผู้ป่วย',
            'mh' => '6. Medical History :',
            'nu' => '7. Nutrition : ภาวะโภชนาการ',
            'he' => '8. Home Environment : สภาพแวดล้อมในบ้าน/รอบบ้าน',
            'sh' => '9. Socioeconomic History : ประวัติทางสังคมและเศรษฐานะ',
            'pe' => '10. Physical Examination : ผลการตรวจร่างกาย',
            'me' => '11. Mental Status Examination : ผลการตรวจสภาพจิตใจ (ถ้าประเมินได้ โปรดระบุ)',
            'pl' => '12. Problem Lists : สรุปปัญหา/ความต้องการ ของผู้ปุวยและครอบครัว',
            'pm' => '13. Plan Management : วางแผนการช่วยเหลือดูแลผู้ปุวย',
            'co' => '14. Conclusion : สรุปผลการติดตามช่วยเหลือดูแลผู้ปุวยที่มีภาวะพึ่งพิง (เขียนเมื่อสรุปผลรายปี/หรือเมื่อสิ้นสุดการช่วยเหลือดูแลไม่ว่าเหตุผลใดก็ตาม)',
            'd_update' => 'D Update',
        ];
    }
}
