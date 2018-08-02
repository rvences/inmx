<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cpaimef".
 *
 * @property int $id
 * @property string $paimef PAIMEF
 */
class Cpaimef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cpaimef';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paimef'], 'required'],
            [['paimef'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paimef' => 'Paimef',
        ];
    }
}
