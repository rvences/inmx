<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\CedulasTelefonicas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cedulas-telefonicas-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-md-4',
                'wrapper' => 'col-md-8'
            ]
        ],

        'type' => ActiveForm::TYPE_HORIZONTAL]); ?>

    <div class="row ">
        <div class="col-md-6 ">
            <?= $form->field($model, 'tel_llamada', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
            ])->textInput(['maxlength' => true]); ?>

            <?php

            echo $form->field($model, 'tipo_llamada_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposllamadas::find()->all(), 'id', 'tipo_llamada'),
                'options' => ['placeholder' => 'Selecciona tipo de llamada ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($model, 'lugar_residencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Clugaresresidencias::find()->all(), 'id', 'lugar_residencia'),
                'options' => ['placeholder' => 'Selecciona Lugar de residencia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);

            ?>
            <?= $form->field($model, 'lugar_residencia_otro_desc')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6 ">
            <?php
            echo $form->field($model, 'tipificacion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctipificaciones::find()->all(), 'id', 'tipificacion'),
                'options' => ['placeholder' => 'Selecciona tipificación ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($model, 'tipo_emergencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposemergencias::find()->all(), 'id', 'tipo_emergencia'),
                'options' => ['placeholder' => 'Selecciona tipo de llamada ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($model, 'coorporacion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccoorporaciones::find()->all(), 'id', 'coorporacion'),
                'options' => ['placeholder' => 'Selecciona coorporación ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

        </div>
    </div>
    <div class="row ">
        <div class = "col-md-12 ">
            <?= $form->field($model, 'institucion_canaliza')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 ">

            <?php
            echo $form->field($model, 'tipoasesorias')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposasesorias::find()->all(), 'id', 'tipoasesoria'),
                'options' => [
                    'placeholder' => 'Selecciona las Asesorías ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6 ">
            <?php
            echo $form->field($model, 'fecha_incidente')->widget(DatePicker::className(), [
                'name' => 'fecha_incidente',
                'value' => date('dd-mm-yyyy', strtotime('+2 days')),
                'language'=> 'es',
                'options' => ['placeholder' => 'Selecciona la fecha ...'],
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ]);
            ?>
        </div>
        <div class = "col-md-12 ">
            <?= $form->field($model, 'demanda')->textarea(['rows' => 3]) ?>
        </div>
        <div class = "col-md-12 ">
            <?= $form->field($model, 'narracion_hechos')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row bg-danger">
        <div class = "col-md-6 ">
            <?= $form->field($model, 'nombre_temporal', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
            ])->textInput(['maxlength' => true]) ?>
        </div>
        <div class = "col-md-6 ">
            <?= $form->field($model, 'emergencia_nombre', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-user"></i>']]
            ])->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 ">
            <?= $form->field($model, 'emergencia_telefono_domicilio', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
            ])->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 ">
            <?= $form->field($model, 'emergencia_telefono_celular', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]

            ])->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row bg-danger">
        <div class="col-md-12"><?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-4"><?= $form->field($model, 'referencia')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-8">
            <?php
            echo $form->field($model, 'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', 'colonia'),
                'options' => ['placeholder' => 'Selecciona Colonia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

         </div>

    </div>


    <div class="row">
        <div class="col-md-6"><?= Html::submitButton('Actualizar y Continuar llamada', ['class' => 'btn btn-success']) ?></div>

    </div>


    <?php
        $model->cedula_id = $modelCedula->id;
        $model->hora_inicio = \Yii::$app->formatter->asTime($modelCedula->updated_at, "php:H:i:s");
    ?>
    <?= $form->field($model, 'cedula_id')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'hora_inicio')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'demanda_historico')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'narracion_hechos_historico')->hiddenInput()->label(false) ?>



    <?php //= $form->field($model, 'hora_termino')->textInput() ?>


    <?php ActiveForm::end(); ?>

</div>
