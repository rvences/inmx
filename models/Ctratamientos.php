<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ctratamientos".
 *
 * @property int $id
 * @property string $tratamiento Tratamiento
 */
class Ctratamientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ctratamientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tratamiento'], 'required'],
            [['tratamiento'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tratamiento' => 'Tratamiento',
        ];
    }
}
