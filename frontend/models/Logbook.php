<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "logbook".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $cg_id
 * @property integer $cm_id
 * @property string $cc
 * @property string $pi
 * @property string $fh
 * @property string $ph
 * @property string $mh
 * @property string $nu
 * @property string $he
 * @property string $sh
 * @property string $pe
 * @property string $me
 * @property string $pl
 * @property string $pm
 * @property string $co
 * @property string $d_update
 */
class Logbook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logbook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'patient_id', 'cg_id', 'cm_id'], 'integer'],
            [['cc', 'pi', 'fh', 'ph', 'mh', 'nu', 'he', 'sh', 'pe', 'me', 'pl', 'pm', 'co'], 'string'],
            [['d_update'], 'safe'],
            ['patient_id', 'unique', 'targetClass' => '\frontend\models\Logbook', 'message' => 'คนไข้รายนี้มีในระบบแล้ว'],
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
            'cg_id' => 'Cg ID',
            'cm_id' => 'Cm ID',
            'cc' => 'Cc',
            'pi' => 'Pi',
            'fh' => 'Fh',
            'ph' => 'Ph',
            'mh' => 'Mh',
            'nu' => 'Nu',
            'he' => 'He',
            'sh' => 'Sh',
            'pe' => 'Pe',
            'me' => 'Me',
            'pl' => 'Pl',
            'pm' => 'Pm',
            'co' => 'Co',
            'd_update' => 'D Update',
        ];
    }
}
