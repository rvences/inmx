<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposviolencias".
 *
 * @property int $id
 * @property string $tipoviolencia Tipos de Violencia
 */
class Ctiposviolencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposviolencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoviolencia'], 'required'],
            [['tipoviolencia'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoviolencia' => 'Tipoviolencia',
        ];
    }
}
