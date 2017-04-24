<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "club_attend".
 *
 * @property string $cid
 * @property integer $club_id
 * @property string $date_attend
 * @property string $note
 */
class ClubAttend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'club_attend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'club_id', 'date_attend'], 'required'],
            [['club_id'], 'integer'],
            [['date_attend'], 'safe'],
            [['cid'], 'string', 'max' => 13],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => 'Cid',
            'club_id' => 'Club ID',
            'date_attend' => 'Date Attend',
            'note' => 'Note',
        ];
    }
}
