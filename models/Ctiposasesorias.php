<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposasesorias".
 *
 * @property int $id
 * @property string $tipoasesoria Tipo de Asesoría
 */
class Ctiposasesorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposasesorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoasesoria'], 'required'],
            [['tipoasesoria'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoasesoria' => 'Tipoasesoria',
        ];
    }
}
