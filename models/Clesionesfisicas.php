<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clesionesfisicas".
 *
 * @property int $id
 * @property string $lesionfisica Lesión Física
 */
class Clesionesfisicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clesionesfisicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesionfisica'], 'required'],
            [['lesionfisica'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesionfisica' => 'Lesionfisica',
        ];
    }
}
