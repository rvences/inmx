<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "violencia".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $tipo_violencia
 * @property string $modalidad_violencia
 * @property string $lugar_violencia
 * @property string $domicilio_victima
 * @property string $domicilio
 * @property int $colonia_id
 * @property string $fecha_incidente
 * @property string $localidad
 * @property string $municipio
 * @property string $estado
 * @property string $consume_alcohol
 * @property string $penso_suicidarse
 * @property string $intento_suicidarse
 * @property string $hospitalizada_anteriormente
 * @property string $requiere_hospitalizacion
 * @property string $vigilancia_agresor
 * @property string $llamadas_libremente
 * @property string $visitas_libremente
 * @property string $recibio_amenazas
 * @property string $vive_agresor
 * @property string $vive_familia_agresor
 * @property string $vive_cerca_agresor
 * @property string $abandono_casa
 * @property string $lugar_vivir
 * @property string $sintomatologia_emocional
 * @property string $sintomatologia_fisica
 * @property string $creencias
 * @property string $factores_psicosociales
 * @property string $factor_psicosocial_otro
 * @property string $relacion_pareja
 * @property string $relato
 * @property string $relaciones_sociales
 * @property string $tratamiento
 * @property string $tipo_demanda
 * @property string $tipo_demanda_otra
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Cedulas $cedula
 * @property User $createdBy
 */
class Violencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'violencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'colonia_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fecha_incidente', 'tipo_violencia', 'modalidad_violencia', 'lugar_violencia', 'sintomatologia_emocional', 'sintomatologia_fisica', 'creencias', 'factores_psicosociales', 'relacion_pareja', 'relato', 'relaciones_sociales', 'tratamiento', 'tipo_demanda'], 'safe'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['domicilio', 'municipio', 'estado', 'factor_psicosocial_otro', 'tipo_demanda_otra'], 'string', 'max' => 100],
            [['domicilio_victima', 'consume_alcohol', 'penso_suicidarse', 'intento_suicidarse', 'hospitalizada_anteriormente', 'requiere_hospitalizacion', 'vigilancia_agresor', 'llamadas_libremente', 'visitas_libremente', 'recibio_amenazas', 'vive_agresor', 'vive_familia_agresor', 'vive_cerca_agresor', 'abandono_casa', 'lugar_vivir'], 'string', 'max' => 1],
            [['localidad'], 'string', 'max' => 50],

            [['cedula_id'], 'required'],

            [['domicilio', 'localidad', 'municipio', 'estado', 'tipo_demanda_otra'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['domicilio', 'localidad', 'municipio', 'estado', 'tipo_demanda_otra'], 'filter', 'filter' => 'strtoupper'],


            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'tipo_violencia' => 'Tipo de Violencia',
            'modalidad_violencia' => 'Modalidad de Violencia',
            'lugar_violencia' => 'Lugar de Coincidencia con la víctima',
            'domicilio_victima' => '¿ El incidente ocurrió en el mismo domicilio de la víctima ?',
            'domicilio' => 'Domicilio',
            'colonia_id' => 'Colonia',
            'fecha_incidente' => 'Fecha del Incidente',
            'localidad' => 'Localidad',
            'municipio' => 'Municipio',
            'estado' => 'Estado',
            'consume_alcohol' => '¿ Consume Alcohol, drogas y/o medicamentos controlados?',
            'penso_suicidarse' => '¿Ha pensado en suicidarse?',
            'intento_suicidarse' => 'Ha intentado suicidarse?',
            'hospitalizada_anteriormente' => '¿ Ha sido hospitalizado anteriormente por lesiones?',
            'requiere_hospitalizacion' => '¿Requiere Hospitalización?',
            'vigilancia_agresor' => '¿ Esta constantemente bajo la vigilancia de la persona agresora?',
            'llamadas_libremente' => '¿ Puede hacer o recibir llamadas libremente ?',
            'visitas_libremente' => '¿Puede hacer o recibir visitas libremente?',
            'recibio_amenzas' => '¿Ha recibido algún tipo de amenaza?',
            'vive_agresor' => '¿Vive con la persona agresora?',
            'vive_familia_agresor' => '¿Vive con la familia de la persona agresora?',
            'vive_cerca_agresor' => '¿Vive cerca de la persona agresora?',
            'abandono_casa' => '¿Tuvo que abandonar su casa?',
            'lugar_vivir' => '¿Tiene algún lugar donde vivir?',
            'sintomatologia_emocional' => 'Sintomatología Emocional',
            'sintomatologia_fisica' => 'Sintomatología Fisica',
            'creencias' => 'Creencias',
            'factores_psicosociales' => 'Factores Psicosociales',
            'factor_psicosocial_otro' => 'Factor Psicosocial Otro',
            'relacion_pareja' => 'Relación Pareja',
            'relato' => 'Relato',
            'relaciones_sociales' => 'Relaciones Sociales',
            'tratamiento' => 'Tratamiento',
            'tipo_demanda' => 'Tipo Demanda',
            'tipo_demanda_otra' => 'Otro tipo de demanda',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
