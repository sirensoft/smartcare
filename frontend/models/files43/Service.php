<?php

namespace frontend\models\files43;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property string $HOSPCODE
 * @property string $PID
 * @property string $HN
 * @property string $SEQ
 * @property string $DATE_SERV
 * @property string $TIME_SERV
 * @property string $LOCATION
 * @property string $INTIME
 * @property string $INSTYPE
 * @property string $INSID
 * @property string $MAIN
 * @property string $TYPEIN
 * @property string $REFERINHOSP
 * @property string $CAUSEIN
 * @property string $CHIEFCOMP
 * @property string $SERVPLACE
 * @property double $BTEMP
 * @property integer $SBP
 * @property integer $DBP
 * @property integer $PR
 * @property integer $RR
 * @property string $TYPEOUT
 * @property string $REFEROUTHOSP
 * @property string $CAUSEOUT
 * @property string $COST
 * @property string $PRICE
 * @property double $PAYPRICE
 * @property string $ACTUALPAY
 * @property string $D_UPDATE
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service';
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
            [['HOSPCODE', 'PID', 'SEQ', 'DATE_SERV', 'INSTYPE', 'TYPEIN', 'SERVPLACE', 'TYPEOUT', 'PRICE', 'PAYPRICE', 'ACTUALPAY', 'D_UPDATE'], 'required'],
            [['DATE_SERV', 'D_UPDATE'], 'safe'],
            [['CHIEFCOMP'], 'string'],
            [['BTEMP', 'COST', 'PRICE', 'PAYPRICE', 'ACTUALPAY'], 'number'],
            [['SBP', 'DBP', 'PR', 'RR'], 'integer'],
            [['HOSPCODE', 'MAIN', 'REFERINHOSP', 'REFEROUTHOSP'], 'string', 'max' => 5],
            [['PID', 'HN'], 'string', 'max' => 15],
            [['SEQ'], 'string', 'max' => 16],
            [['TIME_SERV'], 'string', 'max' => 6],
            [['LOCATION', 'INTIME', 'TYPEIN', 'CAUSEIN', 'SERVPLACE', 'TYPEOUT', 'CAUSEOUT'], 'string', 'max' => 1],
            [['INSTYPE'], 'string', 'max' => 4],
            [['INSID'], 'string', 'max' => 18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOSPCODE' => 'Hospcode',
            'PID' => 'Pid',
            'HN' => 'Hn',
            'SEQ' => 'Seq',
            'DATE_SERV' => 'Date  Serv',
            'TIME_SERV' => 'Time  Serv',
            'LOCATION' => 'Location',
            'INTIME' => 'Intime',
            'INSTYPE' => 'Instype',
            'INSID' => 'Insid',
            'MAIN' => 'Main',
            'TYPEIN' => 'Typein',
            'REFERINHOSP' => 'Referinhosp',
            'CAUSEIN' => 'Causein',
            'CHIEFCOMP' => 'Chiefcomp',
            'SERVPLACE' => 'Servplace',
            'BTEMP' => 'Btemp',
            'SBP' => 'Sbp',
            'DBP' => 'Dbp',
            'PR' => 'Pr',
            'RR' => 'Rr',
            'TYPEOUT' => 'Typeout',
            'REFEROUTHOSP' => 'Referouthosp',
            'CAUSEOUT' => 'Causeout',
            'COST' => 'Cost',
            'PRICE' => 'Price',
            'PAYPRICE' => 'Payprice',
            'ACTUALPAY' => 'Actualpay',
            'D_UPDATE' => 'D  Update',
        ];
    }
}
