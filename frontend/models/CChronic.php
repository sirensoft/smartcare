<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_chronic".
 *
 * @property string $id_chronic
 * @property string $echronic
 * @property string $tchronic
 */
class CChronic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_chronic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_chronic', 'echronic', 'tchronic'], 'required'],
            [['id_chronic'], 'string', 'max' => 6],
            [['echronic', 'tchronic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_chronic' => 'Id Chronic',
            'echronic' => 'Echronic',
            'tchronic' => 'Tchronic',
        ];
    }
}
