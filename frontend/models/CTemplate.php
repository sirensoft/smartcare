<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "c_template".
 *
 * @property integer $id
 * @property string $template_name
 * @property string $templat_text
 */
class CTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'c_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['templat_text'], 'string'],
            [['template_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'template_name' => 'Template Name',
            'templat_text' => 'Templat Text',
        ];
    }
}
