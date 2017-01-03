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
    public $cid;
    public $prename;
    public $name;
    public $lname;
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
            
            ['prename', 'trim'],
            ['prename', 'required'],
            ['prename', 'string', 'min' => 2, 'max' => 255],
            
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            
            ['lname', 'trim'],
            ['lname', 'required'],
            ['lname', 'string', 'min' => 2, 'max' => 255],
            
            ['cid', 'trim'],
            ['cid', 'required'],
            ['cid', 'string', 'min' => 13, 'max' => 13],
            ['cid', 'unique', 'targetClass' => '\common\models\User', 'message' => 'CID ถูกใช้แล้ว'],
            
            ['office', 'trim'],
            ['office', 'required'],
            ['office', 'string', 'min' => 5, 'max' => 5],
        ];
    }
    
     public function attributeLabels()
    {
        return [
            'cid' => 'เลข 13 หลัก',
            'prename'=>'คำนำหน้า',
            'name'=>'ชื่อ',
            'lname'=>'นาสกุล',
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
        $user->cid = $this->cid;
        $user->prename=$this->prename;
        $user->name=  $this->name;
        $user->lname=  $this->lname;
        $user->office = $this->office;
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
