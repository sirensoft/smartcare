<?php

namespace frontend\models\test;

use Yii;
use frontend\models\Plan;

/**
 * This is the model class for table "plan_week".
 *
 * @property integer $id
 * @property integer $plan_id
 * @property string $patient_id
 * @property string $title
 * @property string $start_date
 * @property string $start_time
 * @property string $end_date
 * @property string $end_time
 * @property string $color
 * @property string $bg_color
 * @property string $border_color
 * @property string $text_color
 * @property string $provider_id
 * @property string $care_date
 * @property string $care_time
 * @property string $weight
 * @property string $height
 * @property string $waist
 * @property string $pulse
 * @property string $temp
 * @property string $sbp
 * @property string $dbp
 * @property string $rr
 * @property string $sugar
 * @property string $note
 * @property string $is_done
 * @property string $d_create
 * @property string $d_update
 *
 * @property Plan $plan
 */
class PlanWeek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_week';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_id'], 'integer'],
            [['patient_id'], 'required'],
            [['title', 'note'], 'string'],
            [['start_date', 'start_time', 'end_date', 'end_time', 'care_date', 'care_time', 'd_create', 'd_update'], 'safe'],
            [['waist'], 'number'],
            [['patient_id', 'color', 'bg_color', 'border_color', 'text_color', 'provider_id', 'weight', 'height', 'pulse', 'temp', 'sbp', 'dbp', 'rr', 'sugar'], 'string', 'max' => 255],
            [['is_done'], 'string', 'max' => 1],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_id' => 'Plan ID',
            'patient_id' => 'Patient ID',
            'title' => 'Title',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_date' => 'End Date',
            'end_time' => 'End Time',
            'color' => 'Color',
            'bg_color' => 'Bg Color',
            'border_color' => 'Border Color',
            'text_color' => 'Text Color',
            'provider_id' => 'Provider ID',
            'care_date' => 'Care Date',
            'care_time' => 'Care Time',
            'weight' => 'Weight',
            'height' => 'Height',
            'waist' => 'Waist',
            'pulse' => 'Pulse',
            'temp' => 'Temp',
            'sbp' => 'Sbp',
            'dbp' => 'Dbp',
            'rr' => 'Rr',
            'sugar' => 'Sugar',
            'note' => 'Note',
            'is_done' => 'Is Done',
            'd_create' => 'D Create',
            'd_update' => 'D Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::className(), ['id' => 'plan_id']);
    }
}
