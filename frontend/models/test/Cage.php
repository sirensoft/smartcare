<?php

namespace frontend\models\test;

use Yii;

/**
 * This is the model class for table "cage".
 *
 * @property integer $age
 * @property integer $groupcode190
 * @property string $groupname190
 * @property integer $groupcode1560
 * @property string $groupname1560
 * @property integer $groupcode060
 * @property string $groupname060
 * @property integer $groupcode3560
 * @property string $groupname3560
 */
class Cage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cage';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_hdc');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age'], 'required'],
            [['age', 'groupcode190', 'groupcode1560', 'groupcode060', 'groupcode3560'], 'integer'],
            [['groupname190', 'groupname1560', 'groupname060', 'groupname3560'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'age' => 'Age',
            'groupcode190' => 'Groupcode190',
            'groupname190' => 'Groupname190',
            'groupcode1560' => 'Groupcode1560',
            'groupname1560' => 'Groupname1560',
            'groupcode060' => 'Groupcode060',
            'groupname060' => 'Groupname060',
            'groupcode3560' => 'Groupcode3560',
            'groupname3560' => 'Groupname3560',
        ];
    }
}
