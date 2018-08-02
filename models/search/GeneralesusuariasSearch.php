<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Generalesusuarias;

/**
 * GeneralesusuariasSearch represents the model behind the search form of `app\models\Generalesusuarias`.
 */
class GeneralesusuariasSearch extends Generalesusuarias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'estadocivil_id', 'colonia_id', 'nacionalidad_id', 'religion_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nombre', 'apaterno', 'amaterno', 'fnac', 'lugarnac', 'pertenece_grupo_etnico', 'vive_en_xalapa', 'donde_xalapa', 'domicilio', 'colonia_otra', 'telefono_local', 'telefono_celular', 'localidad', 'municipio', 'estado', 'violencia_pareja', 'responsable_menor', 'responsable_telefono', 'responsable_observaciones'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Generalesusuarias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cedula_id' => $this->cedula_id,
            'fnac' => $this->fnac,
            'estadocivil_id' => $this->estadocivil_id,
            'colonia_id' => $this->colonia_id,
            'nacionalidad_id' => $this->nacionalidad_id,
            'religion_id' => $this->religion_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apaterno', $this->apaterno])
            ->andFilterWhere(['like', 'amaterno', $this->amaterno])
            ->andFilterWhere(['like', 'lugarnac', $this->lugarnac])
            ->andFilterWhere(['like', 'pertenece_grupo_etnico', $this->pertenece_grupo_etnico])
            ->andFilterWhere(['like', 'vive_en_xalapa', $this->vive_en_xalapa])
            ->andFilterWhere(['like', 'donde_xalapa', $this->donde_xalapa])
            ->andFilterWhere(['like', 'domicilio', $this->domicilio])
            ->andFilterWhere(['like', 'colonia_otra', $this->colonia_otra])
            ->andFilterWhere(['like', 'telefono_local', $this->telefono_local])
            ->andFilterWhere(['like', 'telefono_celular', $this->telefono_celular])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'violencia_pareja', $this->violencia_pareja])
            ->andFilterWhere(['like', 'responsable_menor', $this->responsable_menor])
            ->andFilterWhere(['like', 'responsable_telefono', $this->responsable_telefono])
            ->andFilterWhere(['like', 'responsable_observaciones', $this->responsable_observaciones]);

        return $dataProvider;
    }
}
