<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctipificaciones".
 *
 * @property int $id
 * @property string $tipificacion
 *
 * @property CedulasTelefonicas[] $cedulasTelefonicas
 */
class Ctipificaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctipificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipificacion'], 'required'],
            [['tipificacion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipificacion' => 'Tipificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasTelefonicas()
    {
        return $this->hasMany(CedulasTelefonicas::className(), ['tipificacion_id' => 'id']);
    }
}
