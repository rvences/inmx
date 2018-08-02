<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cfrecuenciaagresiones".
 *
 * @property int $id
 * @property string $frecuenciaagresion Frecuencia en la Agresión
 */
class Cfrecuenciaagresiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cfrecuenciaagresiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['frecuenciaagresion'], 'required'],
            [['frecuenciaagresion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'frecuenciaagresion' => 'Frecuenciaagresion',
        ];
    }
}
