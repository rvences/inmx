<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cnivelesestudios".
 *
 * @property int $id
 * @property string $nivel_estudio
 *
 * @property Estratosocial[] $estratosocials
 */
class Cnivelesestudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cnivelesestudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nivel_estudio'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nivel_estudio' => 'Nivel Estudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['nivel_estudios_id' => 'id']);
    }
}
