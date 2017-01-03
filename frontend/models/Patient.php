<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patient".
 * @property integer $id pk
 * @property string $cid
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $sex 
 * @property string $birth
 * @property string $province
 * @property string $district
 * @property string $subdistrict
 * @property string $village_no
 * @property string $village_name
 * @property string $house_no
 * @property string $lat 
 * @property string $lon
 * @property integer $typearea
 * @property string $nation
 * @property string $region
 * @property string $hospcode
 * @property string $refer_from
 * @property string $disease
 * @property string $discharge
 * @property integer $cm_id
 * @property integer $cg_id
 * @property integer $adl
 * @property string  $tai
 * @property integer $class_id 
 * @property string $class_name Description
 * @property string $dupdate
 */
class Patient extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [

            [['cid', 'prename', 'name', 'lname', 'province', 'district', 'sex', 'subdistrict', 'village_no', 'hospcode'], 'required'],
            [['birth'], 'safe'],
            [['dupdate'], 'safe'],
            [['typearea', 'cm_id', 'cg_id', 'adl', 'class_id'], 'integer'],
            [['cid', 'tai'], 'string', 'max' => 13],
            [['refer_from','class_name', 'prename', 'sex', 'name', 'lname', 'province', 'district', 'subdistrict', 'village_no', 'village_name', 'house_no', 'disease', 'nation', 'region', 'discharge', 'lat', 'lon'], 'string', 'max' => 255],
            ['cid', 'unique', 'targetClass' => '\frontend\models\Patient', 'message' => 'CID มีในระบบแล้ว'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'cid' => 'เลข13หลัก',
            'prename' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'สกุล',
            'sex' => 'เพศ',
            'birth' => 'เกิด',
            'province' => 'จังหวัด',
            'district' => 'อำเภอ',
            'subdistrict' => 'ตำบล',
            'village_no' => 'หมู่ที่',
            'village_name' => 'หมู่บ้าน',
            'house_no' => 'บลท.',
            'lat' => 'พิกัด (LATITUDE)',
            'lon' => 'พิกัด (LONGITUDE)',
            'typearea' => 'ประเภทอยู่อาศัย',
            'nation' => 'สัญชาติ',
            'region' => 'เชื้อชาติ',
            'hospcode' => 'รหัสหน่วยบริการ',
            'refer_from'=>'รับส่งต่อจาก',
            'disease' => 'โรคประจำตัว',
            'discharge' => 'การจำหน่าย',
            'cm_id' => 'CareManager',
            'cg_id' => 'CareGiver',
            'adl' => 'คะแนน ADL',
            'tai' => 'จัดกลุ่ม TAI',
            'class_id' => 'รหัสกลุ่ม',
            'class_name' => 'กลุ่ม',
            'dupdate' => 'วันอัพเดทข้อมูล',
        ];
    }

}
