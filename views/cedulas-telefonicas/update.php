<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $modelCedula app\models\Cedulas */
/* @var $model app\models\CedulasTelefonicas */

?>

<div class="panel-info">

    <div class="row bg-info">
        <div class="col-md-3">Ejecutiva: <b><?=$modelCedula->updatedBy->username?></b> </div>
        <div class="col-md-3">Nombre Usuaria: <b><?=$model->nombre_temporal?></b> </div>
        <div class="col-md-3">Folio: <b><?=$modelCedula->id?></b> </div>
        <div class="col-md-3">Fecha de Inicio: <b><?=\Yii::$app->formatter->asTime($modelCedula->updated_at, "php:d-m-Y H:i:s");?></b> </div>
        <div class="col-md-12">Narración: <b><?=$model->narracion_hechos_historico?></b></div>
        <div class="col-md-12">Demanda: <b><?=$model->demanda_historico?></b></div>


    </div>
    <div class="panel-heading">Datos Básicos Atención Telefónica</div>

    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
            'modelCedula' => $modelCedula,
        ]) ?>
    </div>

</div>
