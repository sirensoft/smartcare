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
 * @property string $disease
 * @property string $discharge
 * @property integer $cm_id
 * @property integer $cg_id
 * @property string $dupdate
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid','prename', 'name', 'lname', 'province', 'district','sex', 'subdistrict', 'village_no','hospcode'], 'required'],
            [['birth', 'dupdate'], 'safe'],
            [['typearea', 'cm_id','cg_id'], 'integer'],
            [['cid'], 'string', 'max' => 13],
            [['prename','sex' ,'name', 'lname', 'province', 'district', 'subdistrict', 'village_no', 'village_name', 'house_no','disease','nation', 'region', 'discharge','lat','lon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'เลข13หลัก',
            'prename' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'สกุล',
            'sex'=>'เพศ',
            'birth' => 'เกิด',
            'province' => 'จังหวัด',
            'district' => 'อำเภอ',
            'subdistrict' => 'ตำบล',
            'village_no' => 'หมู่ที่',
            'village_name' => 'หมู่บ้าน',
            'house_no' => 'บลท.',
            'lat'=>'พิกัด (LATITUDE)',
            'lon'=>'พิกัด (LONGITUDE)',
            'typearea' => 'ประเภทอยู่อาศัย',
            'nation' => 'สัญชาติ',
            'region' => 'เชื้อชาติ',
            'hospcode'=>'หน่วยบริการ',
            'disease'=>'โรคประจำตัว',
            'discharge' => 'การจำหน่าย',
            'cm_id'=>'รหัส CM',
            'cg_id'=>'รหัส CG',
            'dupdate' => 'วันอัพเดทข้อมูล',
        ];
    }
}
