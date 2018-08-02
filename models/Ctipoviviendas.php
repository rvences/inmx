<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipoviviendas".
 *
 * @property int $id
 * @property string $tipo_vivienda
 *
 * @property Estratosocial[] $estratosocials
 */
class Ctipoviviendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipoviviendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_vivienda'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_vivienda' => 'Tipo Vivienda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['tipo_vivienda_id' => 'id']);
    }
}
