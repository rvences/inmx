<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposcanalizaciones".
 *
 * @property int $id
 * @property string $tipocanalizacion Tipos de Canalizaciones
 *
 * @property Seguimiento[] $seguimientos
 */
class Ctiposcanalizaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposcanalizaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipocanalizacion'], 'required'],
            [['tipocanalizacion'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipocanalizacion' => 'Tipocanalizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientos()
    {
        return $this->hasMany(Seguimiento::className(), ['tipocanalizacion_id' => 'id']);
    }
}
