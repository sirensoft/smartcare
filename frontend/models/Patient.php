<?php

namespace frontend\models;
use backend\models\User;
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
 * @property integer $age_y
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
 * @property string $race
 * @property string $mstatus
 * @property string $hospcode
 * @property string $pid
 * @property string $refer_from
 * @property string $disease
 * @property string $discharge
 * @property integer $cm_id
 * @property integer $cg_id
 * @property integer $adl
 * @property string  $tai
 * @property integer $class_id 
 * @property string $class_name
 * @property string $color 
 * @property string $cousin
 * @property string $tel
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

            [['cg_id','house_no','cid', 'prename', 'name', 'lname', 'province', 'district', 'sex', 'subdistrict', 'village_no', 'hospcode'], 'required','message' => ''],
            [['birth'], 'safe'],
            [['dupdate','cousin','tel'], 'safe'],
            [['age_y','typearea', 'cm_id', 'cg_id', 'adl', 'class_id'], 'integer'],
            [['cid', 'tai'], 'string', 'max' => 13],
            [['mstatus','religion','color','pid','refer_from','class_name', 'prename', 'sex', 'name', 'lname', 'province', 'district', 'subdistrict', 'village_no', 'village_name', 'house_no', 'disease', 'nation', 'race', 'discharge', 'lat', 'lon'], 'string', 'max' => 255],
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
            'prename' => 'คำนำ',
            'name' => 'ชื่อ',
            'lname' => 'สกุล',
            'sex' => 'เพศ',
            'birth' => 'เกิด',
            'age_y'=>'อายุ(ปี)',
            'province' => 'จังหวัด',
            'district' => 'อำเภอ',
            'subdistrict' => 'ตำบล',
            'village_no' => 'หมู่ที่',
            'village_name' => 'หมู่บ้าน',
            'house_no' => 'บ้านเลขที่',
            'lat' => 'พิกัด(LAT)',
            'lon' => 'พิกัด(LON)',
            'typearea' => 'ประเภทอยู่อาศัย',
            'nation' => 'สัญชาติ',
            'race' => 'เชื้อชาติ',
            'religion'=>'ศาสนา',
            'mstatus'=>'สมรส',
            'hospcode' => 'รหัสหน่วยบริการ',
            'pid'=>'PID',
            'refer_from'=>'รับส่งต่อจาก',
            'disease' => 'โรคประจำตัว',
            'discharge' => 'การจำหน่าย',
            'cm_id' => 'CareManager',
            'cg_id' => 'CG',
            'adl' => 'คะแนน ADL',
            'tai' => 'จัดกลุ่ม TAI',
            'class_id' => 'รหัสกลุ่ม',
            'class_name' => 'กลุ่ม',
            'color'=>'เร่งด่วน',
            'cousin'=>'ชื่อญาติ/คนดูแล',
            'tel'=>'เบอร์ติดต่อ',
            'dupdate' => 'วันอัพเดทข้อมูล',
        ];
    }
    
     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'cg_id']);
    }

}
