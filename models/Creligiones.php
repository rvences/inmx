<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "creligiones".
 *
 * @property int $id
 * @property string $religion Religión
 *
 * @property Generalesusuarias[] $generalesusuarias
 */
class Creligiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'creligiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['religion'], 'required'],
            [['religion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'religion' => 'Religion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralesusuarias()
    {
        return $this->hasMany(Generalesusuarias::className(), ['religion_id' => 'id']);
    }
}
