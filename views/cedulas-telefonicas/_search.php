<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CedulasTelefonicasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-telefonicas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'tel_llamada') ?>

    <?= $form->field($model, 'tipo_llamada_id') ?>

    <?= $form->field($model, 'lugar_residencia_id') ?>

    <?php // echo $form->field($model, 'lugar_residencia_otro_desc') ?>

    <?php // echo $form->field($model, 'tipificacion_id') ?>

    <?php // echo $form->field($model, 'tipo_emergencia_id') ?>

    <?php // echo $form->field($model, 'coorporacion_id') ?>

    <?php // echo $form->field($model, 'institucion_canaliza') ?>

    <?php // echo $form->field($model, 'fecha_incidente') ?>

    <?php // echo $form->field($model, 'demanda') ?>

    <?php // echo $form->field($model, 'emergencia_nombre') ?>

    <?php // echo $form->field($model, 'emergencia_telefono_domicilio') ?>

    <?php // echo $form->field($model, 'emergencia_telefono_celular') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'referencia') ?>

    <?php // echo $form->field($model, 'colonia_id') ?>

    <?php // echo $form->field($model, 'nombre_temporal') ?>

    <?php // echo $form->field($model, 'narracion_hechos') ?>

    <?php // echo $form->field($model, 'hora_inicio') ?>

    <?php // echo $form->field($model, 'hora_termino') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
