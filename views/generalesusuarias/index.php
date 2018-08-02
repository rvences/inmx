<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\GeneralesusuariasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Generalesusuarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalesusuarias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Generalesusuarias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula_id',
            'nombre',
            'apaterno',
            'amaterno',
            //'fnac',
            //'lugarnac',
            //'pertenece_grupo_etnico',
            //'estadocivil_id',
            //'vive_en_xalapa',
            //'donde_xalapa',
            //'domicilio',
            //'colonia_id',
            //'colonia_otra',
            //'telefono_local',
            //'telefono_celular',
            //'localidad',
            //'municipio',
            //'estado',
            //'nacionalidad_id',
            //'religion_id',
            //'violencia_pareja',
            //'responsable_menor',
            //'responsable_telefono',
            //'responsable_observaciones:ntext',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
