<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CedulasTelefonicas;

/**
 * CedulasTelefonicasSearch represents the model behind the search form of `app\models\CedulasTelefonicas`.
 */
class CedulasTelefonicasSearch extends CedulasTelefonicas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cedula_id', 'tipo_llamada_id', 'lugar_residencia_id', 'tipificacion_id', 'tipo_emergencia_id', 'coorporacion_id', 'colonia_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['tel_llamada', 'lugar_residencia_otro_desc', 'institucion_canaliza', 'fecha_incidente', 'demanda', 'emergencia_nombre', 'emergencia_telefono_domicilio', 'emergencia_telefono_celular', 'direccion', 'referencia', 'nombre_temporal', 'narracion_hechos', 'hora_inicio', 'hora_termino'], 'safe'],
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
        $query = CedulasTelefonicas::find();

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
            'tipo_llamada_id' => $this->tipo_llamada_id,
            'lugar_residencia_id' => $this->lugar_residencia_id,
            'tipificacion_id' => $this->tipificacion_id,
            'tipo_emergencia_id' => $this->tipo_emergencia_id,
            'coorporacion_id' => $this->coorporacion_id,
            'fecha_incidente' => $this->fecha_incidente,
            'colonia_id' => $this->colonia_id,
            'hora_inicio' => $this->hora_inicio,
            'hora_termino' => $this->hora_termino,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'tel_llamada', $this->tel_llamada])
            ->andFilterWhere(['like', 'lugar_residencia_otro_desc', $this->lugar_residencia_otro_desc])
            ->andFilterWhere(['like', 'institucion_canaliza', $this->institucion_canaliza])
            ->andFilterWhere(['like', 'demanda', $this->demanda])
            ->andFilterWhere(['like', 'emergencia_nombre', $this->emergencia_nombre])
            ->andFilterWhere(['like', 'emergencia_telefono_domicilio', $this->emergencia_telefono_domicilio])
            ->andFilterWhere(['like', 'emergencia_telefono_celular', $this->emergencia_telefono_celular])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['like', 'nombre_temporal', $this->nombre_temporal])
            ->andFilterWhere(['like', 'narracion_hechos', $this->narracion_hechos]);

        return $dataProvider;
    }
}
