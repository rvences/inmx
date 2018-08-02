<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_cedulas".
 *
 * @property int $id
 * @property string $status_cedula
 *
 * @property Cedulas[] $cedulas
 */
class StatusCedulas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_cedulas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_cedula'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_cedula' => 'Status Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedulas()
    {
        return $this->hasMany(Cedulas::className(), ['status_id' => 'id']);
    }
}
