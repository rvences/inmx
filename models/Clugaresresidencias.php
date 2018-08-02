<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clugaresresidencias".
 *
 * @property int $id
 * @property string $lugar_residencia
 */
class Clugaresresidencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clugaresresidencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lugar_residencia'], 'required'],
            [['lugar_residencia'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lugar_residencia' => 'Lugar Residencia',
        ];
    }
}
