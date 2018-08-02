<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposdemandas".
 *
 * @property int $id
 * @property string $tipodemanda Tipo Demanda
 */
class Ctiposdemandas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposdemandas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipodemanda'], 'required'],
            [['tipodemanda'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipodemanda' => 'Tipodemanda',
        ];
    }
}
