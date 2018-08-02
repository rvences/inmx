<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csintomatologiasfisicas".
 *
 * @property int $id
 * @property string $sintomatologiafisica Sintomatología Física
 */
class Csintomatologiasfisicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'csintomatologiasfisicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sintomatologiafisica'], 'required'],
            [['sintomatologiafisica'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sintomatologiafisica' => 'Sintomatologiafisica',
        ];
    }
}
