<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "provider".
 *
 * @property string $HOSPCODE
 * @property string $PROVIDER
 * @property string $REGISTERNO
 * @property string $COUNCIL
 * @property string $CID
 * @property string $PRENAME
 * @property string $NAME
 * @property string $LNAME
 * @property string $SEX
 * @property string $BIRTH
 * @property string $PROVIDERTYPE
 * @property string $STARTDATE
 * @property string $OUTDATE
 * @property string $MOVEFROM
 * @property string $MOVETO
 * @property string $D_UPDATE
 */
class Provider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provider';
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
            [['HOSPCODE', 'PROVIDER', 'CID', 'PRENAME', 'NAME', 'LNAME', 'SEX', 'BIRTH', 'PROVIDERTYPE', 'STARTDATE', 'D_UPDATE'], 'required'],
            [['BIRTH', 'STARTDATE', 'OUTDATE', 'D_UPDATE'], 'safe'],
            [['HOSPCODE', 'MOVEFROM', 'MOVETO'], 'string', 'max' => 5],
            [['PROVIDER', 'REGISTERNO'], 'string', 'max' => 15],
            [['COUNCIL', 'PROVIDERTYPE'], 'string', 'max' => 2],
            [['CID'], 'string', 'max' => 13],
            [['PRENAME'], 'string', 'max' => 20],
            [['NAME', 'LNAME'], 'string', 'max' => 50],
            [['SEX'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOSPCODE' => 'Hospcode',
            'PROVIDER' => 'Provider',
            'REGISTERNO' => 'Registerno',
            'COUNCIL' => 'Council',
            'CID' => 'Cid',
            'PRENAME' => 'Prename',
            'NAME' => 'Name',
            'LNAME' => 'Lname',
            'SEX' => 'Sex',
            'BIRTH' => 'Birth',
            'PROVIDERTYPE' => 'Providertype',
            'STARTDATE' => 'Startdate',
            'OUTDATE' => 'Outdate',
            'MOVEFROM' => 'Movefrom',
            'MOVETO' => 'Moveto',
            'D_UPDATE' => 'DUpdate',
        ];
    }
}
