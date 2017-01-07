<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "assessment".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property string $date_serv
 * @property integer $adl_score
 * @property string $pp_code
 * @property integer $tai_score
 * @property string $tai_class
 * @property string $group_text
 * @property string $q2 
 * @property string $q9 
 * @property string $note
 * @property string $doc_file
 * @property integer $provider_id
 * @property string $d_update
 */
class Assessment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assessment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'adl_score', 'tai_score', 'provider_id'], 'integer'],
            [['date_serv', 'd_update'], 'safe'],
            [['q9','q2','pp_code','tai_class', 'note', 'doc_file','group_text'], 'string', 'max' => 255],
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
            'date_serv' => 'Date Serv',
            'adl_score' => 'Adl Score',
            'pp_code'=>'ผลคัดกรอง(สนย.)',
            'tai_score' => 'Tai Score',
            'tai_class' => 'Tai Class',
            'group_text'=>'กลุ่ม',
            'note' => 'Note',
            'doc_file' => 'Doc File',
            'provider_id' => 'Provider ID',
            'd_update' => 'D Update',
        ];
    }
}
