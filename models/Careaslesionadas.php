<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "careaslesionadas".
 *
 * @property int $id
 * @property string $arealesionada Area lesionada
 */
class Careaslesionadas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'careaslesionadas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['arealesionada'], 'required'],
            [['arealesionada'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'arealesionada' => 'Arealesionada',
        ];
    }
}
