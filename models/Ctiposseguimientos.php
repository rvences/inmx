<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctiposseguimientos".
 *
 * @property int $id
 * @property string $tiposeguimiento Tipos de Seguimiento
 */
class Ctiposseguimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctiposseguimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tiposeguimiento'], 'required'],
            [['tiposeguimiento'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tiposeguimiento' => 'Tiposeguimiento',
        ];
    }
}
