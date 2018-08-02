<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factoresriesgo".
 *
 * @property int $id
 * @property int $cedula_id
 * @property int $agresiondroga_id
 * @property int $frecuenciaagresion_id
 * @property int $armasagresor_id
 * @property string $porta_armas_agresor
 * @property int $lugarviolencia_id
 * @property string $lesion_fisica
 * @property string $lesion_agente
 * @property string $area_lesionada
 * @property string $dano_psicologico
 * @property string $dano_economico
 * @property string $indicador_riesgo
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $updatedBy
 * @property Cagresionesdrogas $agresiondroga
 * @property Carmasagresores $armasagresor
 * @property Cedulas $cedula
 * @property Cfrecuenciaagresiones $frecuenciaagresion
 * @property Clugaresviolencias $lugarviolencia
 * @property User $createdBy
 */
class Factoresriesgo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factoresriesgo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_id', 'agresiondroga_id', 'frecuenciaagresion_id', 'armasagresor_id', 'lugarviolencia_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['porta_armas_agresor'], 'string', 'max' => 1],
            [['lesion_fisica', 'lesion_agente', 'area_lesionada', 'dano_psicologico', 'dano_economico', 'indicador_riesgo'], 'string', 'max' => 100],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['agresiondroga_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cagresionesdrogas::className(), 'targetAttribute' => ['agresiondroga_id' => 'id']],
            [['armasagresor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carmasagresores::className(), 'targetAttribute' => ['armasagresor_id' => 'id']],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cedulas::className(), 'targetAttribute' => ['cedula_id' => 'id']],
            [['frecuenciaagresion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cfrecuenciaagresiones::className(), 'targetAttribute' => ['frecuenciaagresion_id' => 'id']],
            [['lugarviolencia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clugaresviolencias::className(), 'targetAttribute' => ['lugarviolencia_id' => 'id']],
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
            'agresiondroga_id' => 'Efectos de drogas en la agresión',
            'frecuenciaagresion_id' => 'Frecuencia',
            'armasagresor_id' => '¿Posee algún tipo de arma?',
            'porta_armas_agresor' => '¿Porta dichas armas?',
            'lugarviolencia_id' => 'Lugar de coincidencia con la víctima',
            'lesion_fisica' => 'Lesión Física',
            'lesion_agente' => 'Agente',
            'area_lesionada' => 'Área Lesionada',
            'dano_psicologico' => 'Daño Psicológico',
            'dano_economico' => 'Daño Económico',
            'indicador_riesgo' => 'Indicador de Riesgo',
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
    public function getAgresiondroga()
    {
        return $this->hasOne(Cagresionesdrogas::className(), ['id' => 'agresiondroga_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArmasagresor()
    {
        return $this->hasOne(Carmasagresores::className(), ['id' => 'armasagresor_id']);
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
    public function getFrecuenciaagresion()
    {
        return $this->hasOne(Cfrecuenciaagresiones::className(), ['id' => 'frecuenciaagresion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugarviolencia()
    {
        return $this->hasOne(Clugaresviolencias::className(), ['id' => 'lugarviolencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
