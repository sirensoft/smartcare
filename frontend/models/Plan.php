<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property integer $id
 * @property string $patient_id
 * @property string $title
 * @property string $care_plan_start
 * @property string $care_plan_end
 * @property string $color
 * @property string $bg_color
 * @property string $border_color
 * @property string $text_color
 * @property string $care_provider_id
 * @property string $care_datetime
 * @property string $weight
 * @property string $height
 * @property string $pulse
 * @property string $temp
 * @property string $sbp
 * @property string $dbp
 * @property string $rr
 * @property string $sugar
 * @property string $note
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'care_plan_start'], 'required'],
            [['title', 'note'], 'string'],
            [['care_plan_start', 'care_plan_end', 'care_datetime'], 'safe'],
            [['patient_id'], 'string', 'max' => 255],
            [['color', 'bg_color', 'border_color', 'text_color', 'care_provider_id', 'weight', 'height', 'pulse', 'temp', 'sbp', 'dbp', 'rr', 'sugar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient id',
            'title' => 'Title',
            'care_plan_start' => 'Care Plan Start',
            'care_plan_end' => 'Care Plan End',
            'color' => 'Color',
            'bg_color' => 'Bg Color',
            'border_color' => 'Border Color',
            'text_color' => 'Text Color',
            'care_provider_id' => 'Care Provider ID',
            'care_datetime' => 'Care Datetime',
            'weight' => 'Weight',
            'height' => 'Height',
            'pulse' => 'Pulse',
            'temp' => 'Temp',
            'sbp' => 'Sbp',
            'dbp' => 'Dbp',
            'rr' => 'Rr',
            'sugar' => 'Sugar',
            'note' => 'Note',
        ];
    }
}
