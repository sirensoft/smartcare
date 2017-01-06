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
 * @property string $cid
 * @property string $prename
 * @property string $name
 * @property string $lname
 * @property string $office
 * @property string $officer_type
 * @property string $office_position
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
            [['username', 'auth_key', 'password_hash', 'email', 'role', 'created_at', 'updated_at'], 'required'],
            [['status', 'role', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'role_name', 'prename', 'name', 'lname', 'office', 'officer_type', 'office_position'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['cid'], 'string', 'max' => 13],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
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
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'role' => 'Role',
            'role_name' => 'Role Name',
            'cid' => 'Cid',
            'prename' => 'Prename',
            'name' => 'Name',
            'lname' => 'Lname',
            'office' => 'Office',
            'officer_type' => 'Officer Type',
            'office_position' => 'Office Position',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
