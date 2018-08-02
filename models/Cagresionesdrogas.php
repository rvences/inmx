<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cagresionesdrogas".
 *
 * @property int $id
 * @property string $agresiondroga Drogas en la Agresión
 */
class Cagresionesdrogas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cagresionesdrogas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agresiondroga'], 'required'],
            [['agresiondroga'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'agresiondroga' => 'Agresiondroga',
        ];
    }
}
