<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\GeneralesusuariasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalesusuarias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apaterno') ?>

    <?= $form->field($model, 'amaterno') ?>

    <?php // echo $form->field($model, 'fnac') ?>

    <?php // echo $form->field($model, 'lugarnac') ?>

    <?php // echo $form->field($model, 'pertenece_grupo_etnico') ?>

    <?php // echo $form->field($model, 'estadocivil_id') ?>

    <?php // echo $form->field($model, 'vive_en_xalapa') ?>

    <?php // echo $form->field($model, 'donde_xalapa') ?>

    <?php // echo $form->field($model, 'domicilio') ?>

    <?php // echo $form->field($model, 'colonia_id') ?>

    <?php // echo $form->field($model, 'colonia_otra') ?>

    <?php // echo $form->field($model, 'telefono_local') ?>

    <?php // echo $form->field($model, 'telefono_celular') ?>

    <?php // echo $form->field($model, 'localidad') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'nacionalidad_id') ?>

    <?php // echo $form->field($model, 'religion_id') ?>

    <?php // echo $form->field($model, 'violencia_pareja') ?>

    <?php // echo $form->field($model, 'responsable_menor') ?>

    <?php // echo $form->field($model, 'responsable_telefono') ?>

    <?php // echo $form->field($model, 'responsable_observaciones') ?>

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
