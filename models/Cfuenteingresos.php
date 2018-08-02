<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cfuenteingresos".
 *
 * @property int $id
 * @property string $fuente_ingresos
 */
class Cfuenteingresos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cfuenteingresos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fuente_ingresos'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fuente_ingresos' => 'Fuente Ingresos',
        ];
    }
}
