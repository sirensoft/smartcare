<?php

namespace frontend\models\test;

use Yii;

/**
 * This is the model class for table "assessment_q".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property string $date_serv
 * @property string $q2
 * @property string $q9
 * @property string $q8
 * @property string $note
 * @property string $doc_file
 * @property integer $provider_id
 * @property string $d_update
 */
class AssessmentQ extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assessment_q';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'provider_id'], 'integer'],
            [['date_serv', 'd_update'], 'safe'],
            [['q2', 'q9', 'q8', 'note', 'doc_file'], 'string', 'max' => 255],
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
            'q2' => 'Q2',
            'q9' => 'Q9',
            'q8' => 'Q8',
            'note' => 'Note',
            'doc_file' => 'Doc File',
            'provider_id' => 'Provider ID',
            'd_update' => 'D Update',
        ];
    }
}
