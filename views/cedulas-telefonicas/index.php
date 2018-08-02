<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CedulasTelefonicasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cedulas Telefonicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-telefonicas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cedulas Telefonicas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'tel_llamada',
            'tipo_llamada_id',
            'lugar_residencia_id',
            //'lugar_residencia_otro_desc',
            //'tipificacion_id',
            //'tipo_emergencia_id',
            //'coorporacion_id',
            //'institucion_canaliza',
            //'fecha_incidente',
            //'demanda:ntext',
            //'emergencia_nombre',
            //'emergencia_telefono_domicilio',
            //'emergencia_telefono_celular',
            //'direccion',
            //'referencia',
            //'colonia_id',
            //'nombre_temporal',
            //'narracion_hechos:ntext',
            //'hora_inicio',
            //'hora_termino',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
