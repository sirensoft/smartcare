<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_version".
 *
 * @property integer $id
 * @property string $version
 * @property string $note1
 * @property string $note2
 * @property string $note3
 * @property string $dupdate
 */
class Version extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_version';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dupdate'], 'safe'],
            [['version', 'note1', 'note2', 'note3'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'version' => 'Version',
            'note1' => 'Note1',
            'note2' => 'Note2',
            'note3' => 'Note3',
            'dupdate' => 'Dupdate',
        ];
    }
}
