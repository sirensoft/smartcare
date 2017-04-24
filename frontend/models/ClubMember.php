<?php

namespace frontend\models;

use Yii;
use frontend\models\Club;
/**
 * This is the model class for table "club_member".
 *
 * @property string $cid
 * @property integer $club_id
 * @property string $date_begin
 * @property string $date_end
 * @property string $note
 */
class ClubMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'club_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'club_id'], 'required'],
            [['club_id'], 'integer'],
            [['date_begin', 'date_end'], 'safe'],
            [['note'], 'string'],
            [['cid'], 'string', 'max' => 13],
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
            'date_begin' => 'Date Begin',
            'date_end' => 'Date End',
            'note' => 'Note',
        ];
    }
     public function getClub()
    {
        return $this->hasOne(Club::className(), ['id' => 'club_id']);
    }
}
