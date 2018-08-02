<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmodalidadesviolencias".
 *
 * @property int $id
 * @property string $modalidadviolencia Modalidad Violenta
 */
class Cmodalidadesviolencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cmodalidadesviolencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modalidadviolencia'], 'required'],
            [['modalidadviolencia'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modalidadviolencia' => 'Modalidadviolencia',
        ];
    }
}
