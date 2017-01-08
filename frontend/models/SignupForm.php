<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $u_cid;
    public $u_prename;
    public $u_name;
    public $u_lname;
    public $office;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'username ถูกใช้แล้ว'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'email ถูกใช้แล้ว'],

            ['password', 'required'],
            ['password', 'string', 'min' => 4],
            
            ['u_prename', 'trim'],
            ['u_prename', 'required'],
            ['u_prename', 'string', 'min' => 2, 'max' => 255],
            
            ['u_name', 'trim'],
            ['u_name', 'required'],
            ['u_name', 'string', 'min' => 2, 'max' => 255],
            
            ['u_lname', 'trim'],
            ['u_lname', 'required'],
            ['u_lname', 'string', 'min' => 2, 'max' => 255],
            
            ['u_cid', 'trim'],
            ['u_cid', 'required'],
            ['u_cid', 'string', 'min' => 13, 'max' => 13],
            ['u_cid', 'unique', 'targetClass' => '\common\models\User', 'message' => 'CID ถูกใช้แล้ว'],
            
            ['office', 'trim'],
            ['office', 'required'],
            ['office', 'string', 'min' => 5, 'max' => 5],
        ];
    }
    
     public function attributeLabels()
    {
        return [
            'u_cid' => 'เลข 13 หลัก',
            'u_prename'=>'คำนำหน้า',
            'u_name'=>'ชื่อ',
            'u_lname'=>'นาสกุล',
            'office'=>'รหัสหน่วยบริการ 5 หลัก'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->u_cid = $this->u_cid;
        $user->u_prename=$this->u_prename;
        $user->u_name=  $this->u_name;
        $user->u_lname=  $this->u_lname;
        $user->office = $this->office;
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
