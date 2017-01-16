<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $role
 * @property string $role_name
 * @property string $u_cid
 * @property string $u_prename
 * @property string $u_name
 * @property string $u_lname
 * @property string $office
 * @property string $officer_type
 * @property string $office_position
 * @property string $register_no
 * @property string $counsil
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'role','office','u_cid','u_name','u_lname'], 'required','message' => ''],
            [['status', 'role' ], 'integer'],
            [['password_reset_token', 'email', 'role_name', 'u_prename', 'u_name', 'u_lname', 'office', 'officer_type', 'office_position'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['register_no','counsil','created_at', 'updated_at'],'safe'],
            [['u_cid'], 'unique'],
            [['username'],'string','min'=>3],
            [['password_hash'],'string'],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            //'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            //'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'role' => 'ประเภท-USER',
            'role_name' => 'ประเภท-USER',
            'u_cid' => 'เลขบัตร 13 หลัก',
            'u_prename' => 'คำนำ',
            'u_name' => 'ชื่อ',
            'u_lname' => 'นามสกุล',
            'office' => 'รหัสหน่วยงาน5หลัก',
            'officer_type' => 'ระบุประเภท(เช่น แพทย์/พยาบาล ...)',
            'office_position' => 'ตำแหน่ง (เช่น แพทย์/พยาบาล ...)',
            'register_no'=>'เลขที่ใบอนญาต',
            'counsil'=>'วิชาชีพ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
