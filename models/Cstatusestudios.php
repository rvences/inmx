<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cstatusestudios".
 *
 * @property int $id
 * @property string $status_estudio
 *
 * @property Estratosocial[] $estratosocials
 */
class Cstatusestudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cstatusestudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_estudio'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_estudio' => 'Status Estudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstratosocials()
    {
        return $this->hasMany(Estratosocial::className(), ['status_estudio_id' => 'id']);
    }
}
