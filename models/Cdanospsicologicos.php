<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdanospsicologicos".
 *
 * @property int $id
 * @property string $danopsicologico Dano Psicologico
 */
class Cdanospsicologicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdanospsicologicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['danopsicologico'], 'required'],
            [['danopsicologico'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'danopsicologico' => 'Danopsicologico',
        ];
    }
}
