<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "c_role_cant_do".
 *
 * @property integer $id
 * @property integer $role_id
 * @property string $route
 */
class CRoleCantDo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_role_cant_do';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'role_id'], 'integer'],
            [['route'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'route' => 'Route',
        ];
    }
}
