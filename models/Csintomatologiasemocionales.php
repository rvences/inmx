<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csintomatologiasemocionales".
 *
 * @property int $id
 * @property string $sintomatologiaemocional Sintomatología Emocional
 */
class Csintomatologiasemocionales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'csintomatologiasemocionales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sintomatologiaemocional'], 'required'],
            [['sintomatologiaemocional'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sintomatologiaemocional' => 'Sintomatologiaemocional',
        ];
    }
}
