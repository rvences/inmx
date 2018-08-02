<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "cedulas_telefonicas".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $tel_llamada
 * @property int $tipo_llamada_id
 * @property int $lugar_residencia_id
 * @property string $lugar_residencia_otro_desc
 * @property int $tipificacion_id
 * @property int $tipo_emergencia_id
 * @property int $coorporacion_id
 * @property string $institucion_canaliza
 * @property string $fecha_incidente
 * @property string $demanda
 * @property string $emergencia_nombre
 * @property string $emergencia_telefono_domicilio
 * @property string $emergencia_telefono_celular
 * @property string $tipoasesorias
 * @property string $direccion
 * @property string $referencia
 * @property int $colonia_id
 * @property string $nombre_temporal
 * @property string $narracion_hechos
 * @property string $hora_inicio
 * @property string $hora_termino
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Ccolonias $colonia
 * @property Ccoorporaciones $coorporacion
 * @property Ctipificaciones $tipificacion
 * @property Ctiposllamadas $tipoLlamada
 * @property Ctiposemergencias $tipoEmergencia
 * @property User $createdBy
 * @property User $updatedBy
 * @property Cedulas $cedula
 */
class CedulasTelefonicas extends \yii\db\ActiveRecord
{
    public $demanda_historico;
    public $narracion_hechos_historico;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cedulas_telefonicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'tipo_llamada_id', 'lugar_residencia_id', 'tipificacion_id', 'tipo_emergencia_id', 'coorporacion_id', 'colonia_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fecha_incidente', 'hora_inicio', 'hora_termino'], 'safe'],
            [['demanda', 'narracion_hechos'], 'string'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['tel_llamada', 'emergencia_telefono_domicilio', 'emergencia_telefono_celular'], 'string', 'max' => 10],
            [['lugar_residencia_otro_desc'], 'string', 'max' => 50],
            [['institucion_canaliza', 'emergencia_nombre', 'nombre_temporal'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 250],
            [['referencia'], 'string', 'max' => 200],

            [['tel_llamada', 'tipo_llamada_id', 'cedula_id', 'hora_inicio'], 'required'],

            [['demanda_historico', 'narracion_hechos_historico'], 'safe'],


            [['colonia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccolonias::className(), 'targetAttribute' => ['colonia_id' => 'id']],
            [['coorporacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccoorporaciones::className(), 'targetAttribute' => ['coorporacion_id' => 'id']],
            [['tipificacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctipificaciones::className(), 'targetAttribute' => ['tipificacion_id' => 'id']],
            [['tipo_llamada_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposllamadas::className(), 'targetAttribute' => ['tipo_llamada_id' => 'id']],
            [['tipo_emergencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctiposemergencias::className(), 'targetAttribute' => ['tipo_emergencia_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],

           // [['fecha_incidente'], 'date'],
            [['tel_llamada', 'emergencia_telefono_domicilio', 'emergencia_telefono_celular'], 'double'],


            [['demanda', 'narracion_hechos', 'tel_llamada', 'emergencia_nombre', 'institucion_canaliza', 'direccion', 'referencia', 'emergencia_telefono_celular', 'emergencia_telefono_domicilio', 'lugar_residencia_otro_desc', 'nombre_temporal'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['demanda', 'narracion_hechos', 'emergencia_nombre', 'institucion_canaliza', 'direccion', 'referencia', 'lugar_residencia_otro_desc', 'nombre_temporal'], 'filter', 'filter' => 'strtoupper'],


            [['tel_llamada', 'emergencia_telefono_celular', 'emergencia_telefono_domicilio'], 'string', 'length' => [8, 10]],

            [['lugar_residencia_otro_desc'], 'required', 'when' => function ($model) {
                return (($model->lugar_residencia_id == 1) || ($model->lugar_residencia_id == 2) || ($model->lugar_residencia_id == 3));
            },
                    'whenClient' => "function (attribute, value) {
                    return ($('#cedulastelefonicas-lugar_residencia_id').val() == 1 || $('#cedulastelefonicas-lugar_residencia_id').val() == 2 || $('#cedulastelefonicas-lugar_residencia_id').val() == 3);
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
            'cedula_id' => 'Folio Cédula',
            'tel_llamada' => 'Teléfono de Llamada',
            'tipo_llamada_id' => 'Tipo de Llamada',
            'lugar_residencia_id' => 'Lugar de Residencia',
            'lugar_residencia_otro_desc' => 'Otro Lugar de Residencia',
            'tipificacion_id' => 'Tipificacion',
            'tipo_emergencia_id' => 'Tipo Emergencia',
            'coorporacion_id' => 'Coorporacion',
            'institucion_canaliza' => 'Institucion a Canalizar',
            'fecha_incidente' => 'Fecha Incidente',
            'demanda' => 'Demanda o situación desencadenante',
            'emergencia_nombre' => 'Emergencia Nombre',
            'emergencia_telefono_domicilio' => 'Emergencia Telefono Domicilio',
            'emergencia_telefono_celular' => 'Emergencia Telefono Celular',
            'direccion' => 'Direccion',
            'referencia' => 'Referencia',
            'colonia_id' => 'Colonia',
            'nombre_temporal' => 'Nombre Usuaria',
            'narracion_hechos' => 'Narracion Hechos',
            'hora_inicio' => 'Hora Inicio',
            'hora_termino' => 'Hora Termino',
            'created_at' => 'Fecha de Atención',
            'updated_at' => 'Fecha de Actualización',
            'created_by' => 'Creado por',
            'updated_by' => 'Actualizado por',
            'tipoasesorias' => 'Tipo de Asesorías',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoorporacion()
    {
        return $this->hasOne(Ccoorporaciones::className(), ['id' => 'coorporacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipificacion()
    {
        return $this->hasOne(Ctipificaciones::className(), ['id' => 'tipificacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLlamada()
    {
        return $this->hasOne(Ctiposllamadas::className(), ['id' => 'tipo_llamada_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEmergencia()
    {
        return $this->hasOne(Ctiposemergencias::className(), ['id' => 'tipo_emergencia_id']);
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
    public function getColonia()
    {
        return $this->hasOne(Ccolonias::className(), ['id' => 'colonia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedula()
    {
        return $this->hasOne(Cedulas::className(), ['id' => 'cedula_id']);
    }
}
