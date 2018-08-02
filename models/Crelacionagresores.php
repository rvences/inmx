<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crelacionagresores".
 *
 * @property int $id
 * @property string $relacionagresores Relación con Agresores
 *
 * @property Generalesagresores[] $generalesagresores
 */
class Crelacionagresores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'crelacionagresores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['relacionagresores'], 'required'],
            [['relacionagresores'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'relacionagresores' => 'Relacionagresores',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralesagresores()
    {
        return $this->hasMany(Generalesagresores::className(), ['relacionagresor_id' => 'id']);
    }
}
