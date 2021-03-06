<?php

namespace frontend\models;
use backend\models\User;
use frontend\models\CDischarge;
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
 * @property string $discharge_date
 * @property string $discharge_time
 * @property string $discharge_note
 * @property string $cright 
 * @property string $cright_group
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
 * @property string $fullname
 * @property string $next_visit_date
 * @property string $note 
 */
class Patient extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    //public $fullname;
    public static function tableName() {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [

            [['birth','cg_id','house_no','cid', 'prename', 'name', 'lname', 'province', 'district', 'sex', 'subdistrict', 'village_no', 'hospcode','discharge'], 'required','message' => ''],
            [['next_visit_date','birth'], 'safe'],
            [['cright','cright_group','note','discharge_time','discharge_date','discharge_note','dupdate','cousin','tel'], 'safe'],
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
             'discharge_date' => 'วันจำหน่าย',
             'discharge_time' => 'เวลา',
            'discharge_note'=>'รายละเอียดการจำหน่าย',
            'cright'=>'สิทธิรักษา',
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
            'fullname'=>'ชื่อ-สกุล',
            'fulladdr'=>'ที่อยู่ปัจจุบัน',
            'next_visit_date'=>'เยี่ยมถัดไป',
            'note'=>'ข้อมูลอื่นๆ เช่น อุปกรณ์การแพทย์/อาชีพ/รายได้'
        ];
    }
    
     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'cg_id']);
    }
    
     public function getCdischarge()
    {
        return $this->hasOne(CDischarge::className(), ['dischargecode' => 'discharge']);
    }
    
    function getFullname() {
        return $this->prename . $this->name.' '.$this->lname;
    }
    
    function getFulladdr(){
        return $this->house_no.' หมู่ที่ '.$this->village_no.' '.$this->village_name
                .' ต.'.$this->subdistrict.' อ.'.$this->district.' จ.'.$this->province;
    }

}
