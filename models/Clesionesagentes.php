<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clesionesagentes".
 *
 * @property int $id
 * @property string $lesionagente Agente
 */
class Clesionesagentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clesionesagentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesionagente'], 'required'],
            [['lesionagente'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesionagente' => 'Lesionagente',
        ];
    }
}
