<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "estratosocial".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $ocupacion
 * @property string $fuente_ingresos
 * @property int $tipo_vivienda_id
 * @property string $servicios_basicos
 * @property string $programas_sociales
 * @property string $servicio_medico
 * @property double $ingreso_mensual
 * @property string $servidor_publico
 * @property string $cargo
 * @property string $institucion
 * @property int $nivel_estudios_id
 * @property int status_estudio_id
 * @property string $idioma
 * @property string $discapacidad
 * @property string $enfermedad
 * @property string $embarazada
 * @property string $embarazo_observaciones
 * @property int $meses_embarazo
 * @property string $violencia_obstetrica
 * @property int $violencia_meses
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Cnivelesestudios $nivelEstudios
 * @property Cstatusestudios $statusEstudio
 * @property Cedulas $cedula
 * @property User $createdBy
 * @property User $updatedBy
 * @property Ctipoviviendas $tipoVivienda
 */
class Estratosocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estratosocial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'tipo_vivienda_id', 'nivel_estudios_id', 'status_estudio_id', 'meses_embarazo', 'violencia_meses', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['ingreso_mensual'], 'number'],
            [['embarazo_observaciones'], 'string'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['cargo', 'institucion', 'idioma'], 'string', 'max' => 100],
            [['servidor_publico', 'embarazada', 'violencia_obstetrica'], 'string', 'max' => 1],
            [['nivel_estudios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnivelesestudios::className(), 'targetAttribute' => ['nivel_estudios_id' => 'id']],
            [['status_estudio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cstatusestudios::className(), 'targetAttribute' => ['status_estudio_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['tipo_vivienda_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctipoviviendas::className(), 'targetAttribute' => ['tipo_vivienda_id' => 'id']],


            [['ingreso_mensual', 'cargo', 'institucion', 'idioma', 'embarazo_observaciones', 'violencia_meses'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['ingreso_mensual', 'cargo', 'institucion', 'idioma', 'embarazo_observaciones', 'violencia_meses'], 'filter', 'filter' => 'strtoupper'],


            [['meses_embarazo'], 'required', 'when' => function ($model) {
                return (($model->embarazada == 'S'));
            },
                'whenClient' => "function (attribute, value) {
                    return ($('#estratosocial-embarazada').val() == 'S' );
                    }"
            ],

            [['violencia_meses'], 'required', 'when' => function ($model) {
                return (($model->violencia_obstetrica == 'S'));
            },
                'whenClient' => "function (attribute, value) {
                    return ($('#estratosocial-violencia_obstetrica').val() == 'S' );
                    }"
            ]

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
            'ocupacion' => 'Ocupación',
            'fuente_ingresos' => 'Fuente de Ingresos',
            'tipo_vivienda_id' => 'Tipo de Vivienda',
            'servicios_basicos' => 'Servicios Básicos',
            'programas_sociales' => 'Programas Sociales',
            'servicio_medico' => '¿ Servicio Médico ?',
            'ingreso_mensual' => 'Ingreso Mensual',
            'servidor_publico' => '¿ Servidor Público ?',
            'cargo' => 'Cargo',
            'institucion' => 'Institución',
            'nivel_estudios_id' => 'Nivel de Estudios',
            'status_estudio_id' => 'Status Estudio',
            'idioma' => 'Idioma ( Indigena y Extranjero )',
            'discapacidad' => '¿ Padece Discapacidad ?',
            'enfermedad' => '¿ Padece alguna enfermedad ?',
            'embarazada' => '¿ Se encuentra embarazada ?',
            'meses_embarazo' => '¿ Cuántos Meses ?',
            'violencia_obstetrica' => 'Violencia Obstetrica en embarazo o parto',
            'violencia_meses' => 'Violencia Meses',
            'embarazo_observaciones' => 'Observaciones en el embarazo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusEstudio()
    {
        return $this->hasOne(Cstatusestudios::className(), ['id' => 'status_estudio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelEstudios()
    {
        return $this->hasOne(Cnivelesestudios::className(), ['id' => 'nivel_estudios_id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
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
    public function getTipoVivienda()
    {
        return $this->hasOne(Ctipoviviendas::className(), ['id' => 'tipo_vivienda_id']);
    }
}
