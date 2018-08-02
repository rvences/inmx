<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cestadosciviles".
 *
 * @property int $id
 * @property string $estadocivil Estado Civil
 *
 * @property Generalesusuarias[] $generalesusuarias
 */
class Cestadosciviles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cestadosciviles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estadocivil'], 'required'],
            [['estadocivil'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estadocivil' => 'Estadocivil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralesusuarias()
    {
        return $this->hasMany(Generalesusuarias::className(), ['estadocivil_id' => 'id']);
    }
}
