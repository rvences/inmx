<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cindicadoresriesgos".
 *
 * @property int $id
 * @property string $indicadorriesgo Indicador de Riesgo
 */
class Cindicadoresriesgos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cindicadoresriesgos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indicadorriesgo'], 'required'],
            [['indicadorriesgo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'indicadorriesgo' => 'Indicadorriesgo',
        ];
    }
}
