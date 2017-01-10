<?php

namespace frontend\models;

use Yii;
use frontend\models\Patient;

/**
 * This is the model class for table "plan".
 *
 * @property integer $id
 * @property string $hospcode
 * @property integer $patient_id
 * @property string $date_create
 * @property string $rapid_code
 * @property integer $adl
 * @property string $adl_text
 * @property string $tai
 * @property string $tai_text
 * @property string $budget_need
 * @property string $dx1
 * @property string $dx2
 * @property string $drug
 * @property string $note_before_plan
 * @property string $fct_care_time
 * @property string $cg_care_time
 * @property string $update_plan
 * @property string $patient_mind
 * @property string $live_problem
 * @property string $long_goal
 * @property string $short_goal
 * @property string $extra_service
 * @property string $careful
 * @property string $d_update
 */
class Plan extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['date_create'], 'required'],
            [['patient_id', 'adl'], 'integer'],
            [['d_update'], 'safe'],
            [['drug', 'note_before_plan', 'fct_care_time', 'cg_care_time', 'update_plan', 'patient_mind', 'live_problem', 'long_goal', 'short_goal', 'careful'], 'string'],
            [['hospcode'], 'string', 'max' => 5],
            [['extra_service', 'rapid_code', 'adl_text', 'tai', 'tai_text', 'budget_need', 'dx1', 'dx2'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'hospcode' => 'Hospcode',
            'patient_id' => 'Patient ID',
            'date_create' => 'วันที่จัดทำ',
            'rapid_code' => 'รหัสความเร่งด่วน',
            'adl' => 'Adl Score',
            'adl_text' => 'Adl Text',
            'tai' => 'Tai Class',
            'tai_text' => 'Tai Text',
            'budget_need' => 'งบประมาณขอสนับสนุน(บาท)',
            'dx1' => 'วินิจฉัยโรคหลัก',
            'dx2' => 'โรคร่วม',
            'drug' => 'ยารักษาโรคประจำตัว(ถ้ามี)',
            'note_before_plan' => 'ประเมินก่อนให้บริการ วางแผน CP',
            'fct_care_time' => 'ความถี่ดูแลโดย FCT',
            'cg_care_time' => 'ความถี่ดูแลโดย Care Giver',
            'update_plan' => 'ความถี่ประเมินผล-ปรับแผน',
            'patient_mind' => 'แนวคิดของผู้ใช้บริการและครอบครัวที่มีต่อการดำรงชีวิต',
            'live_problem' => 'ประเด็นปัญหาในการดำรงชีวิต',
            'long_goal' => 'แนวนโยบายการให้ความช่วยเหลือ (เป้าหมายระยะยาว)',
            'short_goal' => 'เป้าหมายการดำรงชีวิต (เป้าหมายระยะสั้น)',
            'extra_service' => 'บริการที่นอกเหนือ',
            'careful' => 'ข้อควรระวังในการให้บริการ',
            'd_update' => 'D Update',
        ];
    }

 

}
