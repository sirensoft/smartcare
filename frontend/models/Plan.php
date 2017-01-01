<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property integer $id
 * @property string $patient_cid
 * @property string $title
 * @property string $start_datetime
 * @property string $end_datetime
 * @property string $color
 * @property string $bg_color
 * @property string $border_color
 * @property string $text_color
 * @property string $provider_id
 * @property string $care_datetime
 * @property string $care_note
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
            [['patient_cid', 'start_datetime'], 'required'],
            [['title', 'care_note'], 'string'],
            [['start_datetime', 'end_datetime', 'care_datetime'], 'safe'],
            [['patient_cid'], 'string', 'max' => 13],
            [['color', 'bg_color', 'border_color', 'text_color', 'provider_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_cid' => 'Patient Cid',
            'title' => 'Title',
            'start_datetime' => 'Start Datetime',
            'end_datetime' => 'End Datetime',
            'color' => 'Color',
            'bg_color' => 'Bg Color',
            'border_color' => 'Border Color',
            'text_color' => 'Text Color',
            'provider_id' => 'Provider ID',
            'care_datetime' => 'Care Datetime',
            'care_note' => 'Care Note',
        ];
    }
}
