<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_line".
 *
 * @property integer $id
 * @property string $line_name
 * @property string $line_token
 * @property string $status
 * @property string $dupdate
 */
class CLine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_line';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['line_token'], 'string'],
            [['dupdate'], 'safe'],
            [['line_name', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_name' => 'Line Name',
            'line_token' => 'Line Token',
            'status' => 'Status',
            'dupdate' => 'Dupdate',
        ];
    }
}
