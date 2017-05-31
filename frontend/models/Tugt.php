<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tugt".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property string $date_serv
 * @property integer $walk_time
 * @property string $tugt_text
 * @property string $note
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Tugt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tugt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
             [['patient_id', 'walk_time'], 'required'],
            [['patient_id', 'walk_time'], 'integer'],
            [['date_serv','tugt_text', 'created_at', 'updated_at'], 'safe'],
            [['note', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'date_serv' => 'วันที่',
            'walk_time' => 'เวลาเดิน(วินาที)',
            'tugt_text'=>'ผลคัดกรอง',
            'note' => 'หมายเหตุ',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function beforeSave($insert) {
        if(parent::beforeSave($insert)){
            if($this->walk_time <30){
                $this->note = '1B1200';
            }else{
                $this->note = '1B1201';
            }            
            return TRUE;
        }  else {
            return FALSE;
        }
    }
   
}
