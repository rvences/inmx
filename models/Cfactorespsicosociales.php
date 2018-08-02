<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cfactorespsicosociales".
 *
 * @property int $id
 * @property string $factorpsicosocial Factor Psicosocial
 */
class Cfactorespsicosociales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cfactorespsicosociales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['factorpsicosocial'], 'required'],
            [['factorpsicosocial'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'factorpsicosocial' => 'Factorpsicosocial',
        ];
    }
}
