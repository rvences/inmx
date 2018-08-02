<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "generalesusuarias".
 *
 * @property int $id
 * @property int $cedula_id
 * @property string $nombre
 * @property string $apaterno
 * @property string $amaterno
 * @property string $fnac
 * @property string $lugarnac
 * @property string $pertenece_grupo_etnico
 * @property int $estadocivil_id
 * @property string $vive_en_xalapa
 * @property string $donde_xalapa
 * @property string $domicilio
 * @property int $colonia_id
 * @property string $colonia_otra
 * @property string $telefono_local
 * @property string $telefono_celular
 * @property string $localidad
 * @property string $municipio
 * @property string $estado
 * @property int $nacionalidad_id
 * @property int $religion_id
 * @property string $violencia_pareja
 * @property string $responsable_menor
 * @property string $responsable_telefono
 * @property string $responsable_observaciones
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Cedulas $cedula
 * @property Cestadosciviles $estadocivil
 * @property Ccolonias $colonia
 * @property Cnacionalidades $nacionalidad
 * @property Creligiones $religion
 * @property User $createdBy
 */
class Generalesusuarias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generalesusuarias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'estadocivil_id', 'colonia_id', 'nacionalidad_id', 'religion_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['fnac'], 'safe'],
            [['responsable_observaciones'], 'string'],
            //[['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['nombre', 'apaterno', 'amaterno', 'localidad'], 'string', 'max' => 50],
            [['lugarnac'], 'string', 'max' => 30],
            [['pertenece_grupo_etnico', 'vive_en_xalapa', 'violencia_pareja'], 'string', 'max' => 1],
            [['donde_xalapa', 'telefono_local', 'telefono_celular', 'responsable_telefono'], 'string', 'max' => 10],
            [['domicilio', 'colonia_otra', 'municipio', 'estado', 'responsable_menor'], 'string', 'max' => 100],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['estadocivil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cestadosciviles::className(), 'targetAttribute' => ['estadocivil_id' => 'id']],
            [['colonia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ccolonias::className(), 'targetAttribute' => ['colonia_id' => 'id']],
            [['nacionalidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cnacionalidades::className(), 'targetAttribute' => ['nacionalidad_id' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Creligiones::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],

            [['cedula_id', 'nombre', 'apaterno'], 'required'],

            [['responsable_observaciones', 'nombre', 'apaterno', 'amaterno', 'localidad', 'domicilio', 'colonia_otra', 'municipio', 'estado', 'responsable_menor'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['responsable_observaciones', 'nombre', 'apaterno', 'amaterno', 'localidad', 'domicilio', 'colonia_otra', 'municipio', 'estado', 'responsable_menor'], 'filter', 'filter' => 'strtoupper'],
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
            'nombre' => 'Nombre',
            'apaterno' => 'Apellido Paterno',
            'amaterno' => 'Apellido Materno',
            'fnac' => 'Fecha de Nacimiento',
            'lugarnac' => 'Lugar de Nacimiento',
            'pertenece_grupo_etnico' => 'Pertenece Grupo Etnico',
            'estadocivil_id' => 'Estado civil',
            'vive_en_xalapa' => 'Vive En Xalapa',
            'donde_xalapa' => 'Donde Xalapa',
            'domicilio' => 'Domicilio',
            'colonia_id' => 'Colonia',
            'colonia_otra' => 'Colonia Otra',
            'telefono_local' => 'Telefono Local',
            'telefono_celular' => 'Telefono Celular',
            'localidad' => 'Localidad',
            'municipio' => 'Municipio',
            'estado' => 'Estado',
            'nacionalidad_id' => 'Nacionalidad',
            'religion_id' => 'Religión',
            'violencia_pareja' => 'Violencia Pareja',
            'responsable_menor' => 'Responsable Menor',
            'responsable_telefono' => 'Responsable Telefono',
            'responsable_observaciones' => 'Responsable Observaciones',
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
    public function getEstadocivil()
    {
        return $this->hasOne(Cestadosciviles::className(), ['id' => 'estadocivil_id']);
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
    public function getNacionalidad()
    {
        return $this->hasOne(Cnacionalidades::className(), ['id' => 'nacionalidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReligion()
    {
        return $this->hasOne(Creligiones::className(), ['id' => 'religion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
