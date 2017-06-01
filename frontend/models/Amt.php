<?php

namespace frontend\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "amt".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property string $date_serv
 * @property string $amt_text
 * @property string $specialpp_code
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Amt extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'amt';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['amt_text'], 'required'],
            [['id', 'patient_id'], 'integer'],
            [['date_serv', 'created_at', 'updated_at'], 'safe'],
            [['amt_text', 'specialpp_code', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'date_serv' => 'วันที่',
            'amt_text' => 'ผลทดสอบ',
            'specialpp_code' => 'Specialpp',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors() {
        return [
            ['class' => BlameableBehavior::className()],
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()')
            ]
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if ($this->amt_text === 'ปกติ') {
                $this->specialpp_code = '1B1220';
            } else {
                $this->specialpp_code = '1B1221';
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function afterSave($insert, $changedAttributes) {

        parent::afterSave($insert, $changedAttributes);
        
    }

}
