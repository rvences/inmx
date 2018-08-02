<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccolonias".
 *
 * @property int $id
 * @property string $colonia
 * @property string $cp
 *
 * @property CedulasTelefonicas[] $cedulasTelefonicas
 */
class Ccolonias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ccolonias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['colonia'], 'string', 'max' => 70],
            [['cp'], 'string', 'max' => 5],
            [['colonia'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'colonia' => 'Colonia',
            'cp' => 'Cp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasTelefonicas()
    {
        return $this->hasMany(CedulasTelefonicas::className(), ['colonia_id' => 'id']);
    }
}
