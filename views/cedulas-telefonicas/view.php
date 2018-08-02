<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CedulasTelefonicas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cedulas Telefonicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cedulas-telefonicas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cedula_id',
            'tel_llamada',
            'tipo_llamada_id',
            'lugar_residencia_id',
            'lugar_residencia_otro_desc',
            'tipificacion_id',
            'tipo_emergencia_id',
            'coorporacion_id',
            'institucion_canaliza',
            'fecha_incidente',
            'demanda:ntext',
            'emergencia_nombre',
            'emergencia_telefono_domicilio',
            'emergencia_telefono_celular',
            'direccion',
            'referencia',
            'colonia_id',
            'nombre_temporal',
            'narracion_hechos:ntext',
            'hora_inicio',
            'hora_termino',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
