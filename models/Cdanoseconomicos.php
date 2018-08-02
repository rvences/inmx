<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdanoseconomicos".
 *
 * @property int $id
 * @property string $danoeconomico Dano Economico
 */
class Cdanoseconomicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cdanoseconomicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['danoeconomico'], 'required'],
            [['danoeconomico'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'danoeconomico' => 'Danoeconomico',
        ];
    }
}
