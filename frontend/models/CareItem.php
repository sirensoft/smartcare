<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_care_item".
 *
 * @property integer $id
 * @property string $name
 * @property string $category
 * @property string $note
 */
class CareItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_care_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name', 'category', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category' => 'Category',
            'note' => 'Note',
        ];
    }
}
