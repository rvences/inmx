<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clugaresviolencias".
 *
 * @property int $id
 * @property string $lugarviolencia Lugar de Violencia
 */
class Clugaresviolencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clugaresviolencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lugarviolencia'], 'required'],
            [['lugarviolencia'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lugarviolencia' => 'Lugarviolencia',
        ];
    }
}
