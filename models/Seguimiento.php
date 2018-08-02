<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "seguimiento".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $victima_canalizada
 * @property int $tipocanalizacion_id
 * @property string $banesvim
 * @property string $paimef
 * @property string $tipo_seguimiento
 * @property string $requiere_proteccion
 * @property string $solicita_proteccion
 * @property string $fuero_federal
 * @property string $solicita_informacion
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Cedulas $cedula
 * @property Ctiposcanalizaciones $tipocanalizacion
 * @property User $createdBy
 */
class Seguimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seguimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'tipocanalizacion_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['victima_canalizada', 'requiere_proteccion', 'solicita_proteccion', 'fuero_federal', 'solicita_informacion'], 'string', 'max' => 1],
            [['banesvim', 'paimef'], 'string', 'max' => 100],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['tipocanalizacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposcanalizaciones::className(), 'targetAttribute' => ['tipocanalizacion_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula_id' => 'Cedula ID',
            'victima_canalizada' => 'Victima Canalizada',
            'tipocanalizacion_id' => 'Tipocanalizacion ID',
            'banesvim' => 'Banesvim',
            'paimef' => 'Paimef',
            'tipo_seguimiento' => 'Tipo Seguimiento',
            'requiere_proteccion' => 'Requiere Proteccion',
            'solicita_proteccion' => 'Solicita Proteccion',
            'fuero_federal' => 'Fuero Federal',
            'solicita_informacion' => 'Solicita Informacion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedula()
    {
        return $this->hasOne(Cedulas::className(), ['id' => 'cedula_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipocanalizacion()
    {
        return $this->hasOne(Ctiposcanalizaciones::className(), ['id' => 'tipocanalizacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
