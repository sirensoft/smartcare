<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property string $cid
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $birth
 * @property string $province
 * @property string $district
 * @property string $subdistrict
 * @property string $village_no
 * @property string $village_name
 * @property string $house_no
 * @property integer $typearea
 * @property integer $nation
 * @property integer $region
 * @property integer $discharge
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
            [['cid','prename', 'name', 'lname', 'province', 'district', 'subdistrict', 'village_no',], 'required'],
            [['birth', 'dupdate'], 'safe'],
            [['typearea', 'nation', 'region', 'discharge'], 'integer'],
            [['cid'], 'string', 'max' => 13],
            [['prename', 'name', 'lname', 'province', 'district', 'subdistrict', 'village_no', 'village_name', 'house_no'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'เลข13หลัก',
            'prename' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'สกุล',
            'birth' => 'เกิด',
            'province' => 'จังหวัด',
            'district' => 'อำเภอ',
            'subdistrict' => 'ตำบล',
            'village_no' => 'หมู่ที่',
            'village_name' => 'หมู่บ้าน',
            'house_no' => 'บลท.',
            'typearea' => 'ประเภทอยู่อาศัย',
            'nation' => 'สัญชาติ',
            'region' => 'เชื้อชาติ',
            'discharge' => 'การจำหน่าย',
            'dupdate' => 'วันอัพเดทข้อมูล',
        ];
    }
}
