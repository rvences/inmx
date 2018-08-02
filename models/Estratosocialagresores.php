<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "estratosocialagresores".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $ocupacion
 * @property string $fuente_ingresos
 * @property int $tipo_vivienda_id
 * @property string $servicios_basicos
 * @property string $programas_sociales
 * @property string $servicio_medico
 * @property string $discapacidad
 * @property double $ingreso_mensual
 * @property string $servidor_publico
 * @property string $cargo
 * @property string $institucion
 * @property int $nivel_estudios_id
 * @property int $estatus_estudios
 * @property string $idioma
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Cnivelesestudios $nivelEstudios
 * @property Cedulas $cedula
 * @property User $createdBy
 * @property User $updatedBy
 * @property Ctipoviviendas $tipoVivienda
 */
class Estratosocialagresores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estratosocialagresores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'tipo_vivienda_id', 'nivel_estudios_id', 'estatus_estudios', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['ingreso_mensual'], 'number'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            //[['ocupacion', 'fuente_ingresos', 'servicios_basicos', 'programas_sociales', 'servicio_medico', 'discapacidad', 'cargo', 'institucion', 'idioma'], 'string', 'max' => 100],
            [['cargo', 'institucion', 'idioma'], 'string', 'max' => 100],
            [['servidor_publico'], 'string', 'max' => 1],
            [['nivel_estudios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnivelesestudios::className(), 'targetAttribute' => ['nivel_estudios_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['tipo_vivienda_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ctipoviviendas::className(), 'targetAttribute' => ['tipo_vivienda_id' => 'id']],
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
            'ocupacion' => 'Ocupacion',
            'fuente_ingresos' => 'Fuente Ingresos',
            'tipo_vivienda_id' => 'Tipo de Vivienda',
            'servicios_basicos' => 'Servicios Basicos',
            'programas_sociales' => 'Programas Sociales',
            'servicio_medico' => 'Servicio Medico',
            'discapacidad' => 'Discapacidad',
            'ingreso_mensual' => 'Ingreso Mensual',
            'servidor_publico' => 'Servidor Publico',
            'cargo' => 'Cargo',
            'institucion' => 'Institución',
            'nivel_estudios_id' => 'Nivel Estudios',
            'estatus_estudios' => 'Estatus Estudios',
            'idioma' => 'Idioma',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
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
