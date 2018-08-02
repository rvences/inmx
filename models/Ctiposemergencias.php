<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposemergencias".
 *
 * @property int $id
 * @property string $tipo_emergencia
 *
 * @property CedulasTelefonicas[] $cedulasTelefonicas
 */
class Ctiposemergencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposemergencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_emergencia'], 'required'],
            [['tipo_emergencia'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_emergencia' => 'Tipo Emergencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasTelefonicas()
    {
        return $this->hasMany(CedulasTelefonicas::className(), ['tipo_emergencia_id' => 'id']);
    }
}
