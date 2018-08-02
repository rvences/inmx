<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccoorporaciones".
 *
 * @property int $id
 * @property string $coorporacion
 *
 * @property CedulasTelefonicas[] $cedulasTelefonicas
 */
class Ccoorporaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ccoorporaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coorporacion'], 'required'],
            [['coorporacion'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'coorporacion' => 'Coorporacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulasTelefonicas()
    {
        return $this->hasMany(CedulasTelefonicas::className(), ['coorporacion_id' => 'id']);
    }
}
