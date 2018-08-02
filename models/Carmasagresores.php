<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carmasagresores".
 *
 * @property int $id
 * @property string $armasagresor Armas del Agresor
 */
class Carmasagresores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carmasagresores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['armasagresor'], 'required'],
            [['armasagresor'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'armasagresor' => 'Armasagresor',
        ];
    }
}
