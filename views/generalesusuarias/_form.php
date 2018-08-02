<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Generalesusuarias */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="generalesusuarias-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-md-4',
                'wrapper' => 'col-md-8'
            ]
        ],

        'type' => ActiveForm::TYPE_HORIZONTAL]); ?>


    <?php

    echo $form->errorSummary([$model, $modeles, $modelv]);
    echo 'model'; print_r($model->errors);
    echo 'modeles'; print_r($modeles->errors);
    echo 'modelv'; print_r($modelv->errors);
    echo 'modelvt'; print_r($modelvt->errors);
    echo 'modelga'; print_r($modelga->errors);




    ?>

    <div class="row ">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeHolder'=>'Nombre(s)']) ?>
            <?= $form->field($model, 'apaterno')->textInput(['maxlength' => true, 'placeHolder'=>'Apellido Paterno']) ?>
            <?= $form->field($model, 'amaterno')->textInput(['maxlength' => true, 'placeHolder'=>'Apellido Materno']) ?>

            <?php
            echo $form->field($model, 'fnac')->widget(DatePicker::className(), [
                'name' => 'Fecha de Nacimiento',
                'language'=> 'es',
                'options' => ['placeholder' => 'Selecciona la fecha dd-mm-aaaa...'],
                'pluginOptions' => [
                    'orientation' => 'bottom left',

                    'format' => 'dd-mm-yyyy',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ]);
            ?>


            <?= $form->field($model, 'lugarnac')->textInput(['maxlength' => true, 'placeHolder'=>'Lugar de Nacimiento']) ?>

            <?php
            echo $form->field($model, 'nacionalidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnacionalidades::find()->all(), 'id', 'nacionalidad'),
                'options' => ['placeholder' => 'Selecciona Nacionalidad ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($model, 'religion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Creligiones::find()->all(), 'id', 'religion'),
                'options' => ['placeholder' => 'Selecciona Religión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($model, 'pertenece_grupo_etnico')->radioButtonGroup($data);
            ?>

            <?= $form->field($model, 'telefono_local', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
            ])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'telefono_celular', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
            ])->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'estadocivil_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cestadosciviles::find()->all(), 'id', 'estadocivil'),
                'options' => ['placeholder' => 'Selecciona Estado Civil ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($model, 'violencia_pareja')->radioButtonGroup($data)->hint('Ha vivido violencia de su actual o última pareja');
            ?>

            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($model, 'vive_en_xalapa')->radioButtonGroup($data);
            ?>


            <?php $data = ['URBANO' => 'Urbano', 'RURAL' => 'Rural'];
            echo $form->field($model, 'donde_xalapa')->radioButtonGroup($data);
            ?>


            <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
            <?php
            echo $form->field($model, 'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', 'colonia'),
                'options' => ['placeholder' => 'Selecciona Colonia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            <?= $form->field($model, 'colonia_otra')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'localidad')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'municipio')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="row">

        <div class="col-md-6"><?= $form->field($model, 'responsable_menor')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'responsable_telefono', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
            ])->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-12"><?= $form->field($model, 'responsable_observaciones')->textarea(['rows' => 3]) ?></div>

    </div>



    <div class="panel">Estrato Social</div>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($modeles, 'ocupacion')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cocupaciones::find()->all(), 'id', 'ocupacion'),
                'options' => [
                    'placeholder' => 'Selecciona las Ocupaciones ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
            <?php
            echo $form->field($modeles, 'fuente_ingresos')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cfuenteingresos::find()->all(), 'id', 'fuente_ingresos'),
                'options' => [
                    'placeholder' => 'Selecciona las Fuentes de Ingresos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
            <?php
            echo $form->field($modeles, 'tipo_vivienda_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctipoviviendas::find()->all(), 'id', 'tipo_vivienda'),
                'options' => [
                    'placeholder' => 'Selecciona Tipo de Vivienda ...',
                ],
            ]);
            ?>
            <?php
            echo $form->field($modeles, 'servicios_basicos')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cserviciosbasicos::find()->all(), 'id', 'servicio_basico'),
                'options' => [
                    'placeholder' => 'Selecciona los Servicios ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modeles, 'programas_sociales')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cprogramassociales::find()->all(), 'id', 'programa_social'),
                'options' => [
                    'placeholder' => 'Selecciona Programa Social ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modeles, 'servicio_medico')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cserviciosmedicos::find()->all(), 'id', 'servicio_medico'),
                'options' => [
                    'placeholder' => 'Selecciona los Servicios ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?= $form->field($modeles, 'ingreso_mensual')->textInput(['maxlength' => true]) ?>

            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modeles, 'servidor_publico')->radioButtonGroup($data);
            ?>

            <?= $form->field($modeles, 'cargo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modeles, 'institucion')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">



            <?php
            echo $form->field($modeles, 'nivel_estudios_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnivelesestudios::find()->all(), 'id', 'nivel_estudio'),
                'options' => [
                    'placeholder' => 'Selecciona Estudios ...',
                ],
            ]);
            ?>

            <?php
            echo $form->field($modeles, 'status_estudio_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cstatusestudios::find()->all(), 'id', 'status_estudio'),
                'options' => [
                    'placeholder' => 'Selecciona Status ...',
                ],
            ]);
            ?>

            <?= $form->field($modeles, 'idioma')->textInput(['maxlength' => true]) ?>

            <?php
            echo $form->field($modeles, 'discapacidad')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cdiscapacidades::find()->all(), 'id', 'discapacidad'),
                'options' => [
                    'placeholder' => 'Selecciona la Discapacidad ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modeles, 'enfermedad')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cenfermedades::find()->all(), 'id', 'enfermedad'),
                'options' => [
                    'placeholder' => 'Selecciona la Enfermedad ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modeles, 'embarazada')->radioButtonGroup($data);
            ?>

            <?= $form->field($modeles, 'meses_embarazo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modeles, 'embarazo_observaciones')->textarea(['rows' => 3])?>


            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modeles, 'violencia_obstetrica')->radioButtonGroup($data);
            ?>

            <?= $form->field($modeles, 'violencia_meses')->textInput(['maxlength' => true]) ?>




        </div>

    </div>

    <div class="panel">Situación de la Violencia</div>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($modelv, 'tipo_violencia')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposviolencias::find()->all(), 'id', 'tipoviolencia'),
                'options' => [
                    'placeholder' => 'Selecciona Tipo de Violencias ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'modalidad_violencia')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cmodalidadesviolencias::find()->all(), 'id', 'modalidadviolencia'),
                'options' => [
                    'placeholder' => 'Selecciona Modalidad Violencia ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'lugar_violencia')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Clugaresviolencias::find()->all(), 'id', 'lugarviolencia'),
                'options' => [
                    'placeholder' => 'Selecciona Lugar Violencia ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelv, 'domicilio_victima')->radioButtonGroup($data);
            ?>
            <?php
            echo $form->field($modelv, 'fecha_incidente')->widget(DatePicker::className(), [
                'name' => 'Fecha del Incidente',
                'language'=> 'es',
                'options' => ['placeholder' => 'Selecciona la fecha dd-mm-aaaa...'],
                'pluginOptions' => [
                    'orientation' => 'bottom left',

                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-md-6">

            <?= $form->field($modelv, 'domicilio')->textInput(['maxlength' => true]) ?>
            <?php
            echo $form->field($modelv, 'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', 'colonia'),
                'options' => ['placeholder' => 'Selecciona Colonia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            <?= $form->field($modelv, 'localidad')->textInput(['maxlength' => true]) ?>
            <?= $form->field($modelv, 'municipio')->textInput(['maxlength' => true]) ?>
            <?= $form->field($modelv, 'estado')->textInput(['maxlength' => true]) ?>







        </div>
        <div class="col-md-6"></div>

    </div>

    <div class="panel">Indicador de Riegos</div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelv, 'consume_alcohol')->radioButtonGroup($data);
            echo $form->field($modelv, 'penso_suicidarse')->radioButtonGroup($data);
            echo $form->field($modelv, 'intento_suicidarse')->radioButtonGroup($data);
            echo $form->field($modelv, 'hospitalizada_anteriormente')->radioButtonGroup($data);
            echo $form->field($modelv, 'requiere_hospitalizacion')->radioButtonGroup($data);
            echo $form->field($modelv, 'vigilancia_agresor')->radioButtonGroup($data);
            echo $form->field($modelv, 'llamadas_libremente')->radioButtonGroup($data);
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $form->field($modelv, 'visitas_libremente')->radioButtonGroup($data);
            echo $form->field($modelv, 'recibio_amenazas')->radioButtonGroup($data);
            echo $form->field($modelv, 'vive_agresor')->radioButtonGroup($data);
            echo $form->field($modelv, 'vive_familia_agresor')->radioButtonGroup($data);
            echo $form->field($modelv, 'vive_cerca_agresor')->radioButtonGroup($data);
            echo $form->field($modelv, 'abandono_casa')->radioButtonGroup($data);
            echo $form->field($modelv, 'lugar_vivir')->radioButtonGroup($data);
            ?>
        </div>
    </div>

    <div class="panel">Valoración</div>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($modelv, 'sintomatologia_emocional')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csintomatologiasemocionales::find()->all(), 'id', 'sintomatologiaemocional'),
                'options' => [
                    'placeholder' => 'Selecciona Sintomatología ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'sintomatologia_fisica')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csintomatologiasfisicas::find()->all(), 'id', 'sintomatologiafisica'),
                'options' => [
                    'placeholder' => 'Selecciona Sintomatología ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'creencias')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccreencias::find()->all(), 'id', 'creencia'),
                'options' => [
                    'placeholder' => 'Selecciona Creencia ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'factores_psicosociales')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cfactorespsicosociales::find()->all(), 'id', 'factorpsicosocial'),
                'options' => [
                    'placeholder' => 'Selecciona Sintomatología ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?= $form->field($modelv, 'factor_psicosocial_otro')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">
            <?php
            echo $form->field($modelv, 'relacion_pareja')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelacionesparejas::find()->all(), 'id', 'relacionpareja'),
                'options' => [
                    'placeholder' => 'Selecciona Relación Pareja ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'relato')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelatos::find()->all(), 'id', 'relato'),
                'options' => [
                    'placeholder' => 'Selecciona Relato ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'relaciones_sociales')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelacionessociales::find()->all(), 'id', 'relacionsocial'),
                'options' => [
                    'placeholder' => 'Selecciona Relación Social ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelv, 'tratamiento')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctratamientos::find()->all(), 'id', 'tratamiento'),
                'options' => [
                    'placeholder' => 'Selecciona Tratamiento ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

        </div>
        <div class="col-md-12">
            <div class="col-md-12"><?= $form->field($modelvt, 'evaluacion_psicologica')->textarea(['rows' => 3]) ?></div>
        </div>
    </div>

    <div class="panel">Relevancia Atribuida</div>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($modelv, 'tipo_demanda')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposdemandas::find()->all(), 'id', 'tipodemanda'),
                'options' => [
                    'placeholder' => 'Selecciona tipo Demanda ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($modelv, 'tipo_demanda_otra')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-12"><?= $form->field($modelvt, 'relato_juridico')->textarea(['rows' => 3]) ?></div>

        <div class="col-md-6"><?= $form->field($modelvt, 'situacion_legal')->textarea(['rows' => 3]) ?></div>
        <div class="col-md-6"><?= $form->field($modelvt, 'procedimiento_legal')->textarea(['rows' => 3]) ?></div>
    </div>

    <div class="panel agresor">Datos Generales Agresor</div>

    <div class="row ">
        <div class="col-md-6">
            <?= $form->field($modelga, 'nombre')->textInput(['maxlength' => true, 'placeHolder'=>'Nombre(s)']) ?>
            <?= $form->field($modelga, 'apaterno')->textInput(['maxlength' => true, 'placeHolder'=>'Apellido Paterno']) ?>
            <?= $form->field($modelga, 'amaterno')->textInput(['maxlength' => true, 'placeHolder'=>'Apellido Materno']) ?>

            <?php
            echo $form->field($modelga, 'sexo_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Csexos::find()->all(), 'id', 'sexo'),
                'options' => ['placeholder' => 'Selecciona Sexo ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?= $form->field($modelga, 'alias')->textInput(['maxlength' => true, 'placeHolder'=>'Alias del Agresor']) ?>


            <?php
            echo $form->field($modelga, 'fnac')->widget(DatePicker::className(), [
                'name' => 'Fecha de Nacimiento',
                'language'=> 'es',
                'options' => ['placeholder' => 'Selecciona la fecha dd-mm-aaaa...'],
                'pluginOptions' => [
                    'orientation' => 'bottom left',
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                    'autoclose' => true
                ]
            ]);
            ?>

            <?php
            echo $form->field($modelga, 'relacionagresor_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Crelacionagresores::find()->all(), 'id', 'relacionagresores'),
                'options' => ['placeholder' => 'Selecciona Relación Agresor ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelga, 'estadocivil_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cestadosciviles::find()->all(), 'id', 'estadocivil'),
                'options' => ['placeholder' => 'Selecciona Estado Civil ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?= $form->field($modelga, 'telefono_local', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
            ])->textInput(['maxlength' => true]) ?>
            <?= $form->field($modelga, 'telefono_celular', [
                'addon' => ['prepend' => ['content'=>'<i class="glyphicon glyphicon-phone"></i>']]
            ])->textInput(['maxlength' => true]) ?>




        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($modelga, 'vive_en_xalapa')->radioButtonGroup($data);
            ?>

            <?= $form->field($modelga, 'domicilio')->textInput(['maxlength' => true]) ?>
            <?php
            echo $form->field($modelga, 'colonia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ccolonias::find()->all(), 'id', 'colonia'),
                'options' => ['placeholder' => 'Selecciona Colonia ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            <?= $form->field($modelga, 'colonia_otra')->textInput(['maxlength' => true]) ?>
            <?= $form->field($modelga, 'localidad')->textInput(['maxlength' => true]) ?>
            <?= $form->field($modelga, 'municipio')->textInput(['maxlength' => true]) ?>
            <?= $form->field($modelga, 'estado')->textInput(['maxlength' => true]) ?>

            <?php
            echo $form->field($modelga, 'nacionalidad_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnacionalidades::find()->all(), 'id', 'nacionalidad'),
                'options' => ['placeholder' => 'Selecciona Nacionalidad ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelga, 'religion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Creligiones::find()->all(), 'id', 'religion'),
                'options' => ['placeholder' => 'Selecciona Religión ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
            <?= $form->field($modelga, 'lugarnac')->textInput(['maxlength' => true, 'placeHolder'=>'Lugar de Nacimiento']) ?>





        </div>
    </div>

    <div class="panel agresor">Estrato Social del Agresor</div>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($modelesa, 'ocupacion')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cocupaciones::find()->all(), 'id', 'ocupacion'),
                'options' => [
                    'placeholder' => 'Selecciona las Ocupaciones ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
            <?php
            echo $form->field($modelesa, 'fuente_ingresos')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cfuenteingresos::find()->all(), 'id', 'fuente_ingresos'),
                'options' => [
                    'placeholder' => 'Selecciona las Fuentes de Ingresos ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
            <?php
            echo $form->field($modelesa, 'tipo_vivienda_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctipoviviendas::find()->all(), 'id', 'tipo_vivienda'),
                'options' => [
                    'placeholder' => 'Selecciona Tipo de Vivienda ...',
                ],
            ]);
            ?>
            <?php
            echo $form->field($modelesa, 'servicios_basicos')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cserviciosbasicos::find()->all(), 'id', 'servicio_basico'),
                'options' => [
                    'placeholder' => 'Selecciona los Servicios ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelesa, 'programas_sociales')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cprogramassociales::find()->all(), 'id', 'programa_social'),
                'options' => [
                    'placeholder' => 'Selecciona Programa Social ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelesa, 'servicio_medico')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cserviciosmedicos::find()->all(), 'id', 'servicio_medico'),
                'options' => [
                    'placeholder' => 'Selecciona los Servicios ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelesa, 'discapacidad')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cdiscapacidades::find()->all(), 'id', 'discapacidad'),
                'options' => [
                    'placeholder' => 'Selecciona la Discapacidad ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($modelesa, 'ingreso_mensual')->textInput(['maxlength' => true]) ?>

            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelesa, 'servidor_publico')->radioButtonGroup($data);
            ?>

            <?= $form->field($modelesa, 'cargo')->textInput(['maxlength' => true]) ?>

            <?= $form->field($modelesa, 'institucion')->textInput(['maxlength' => true]) ?>


            <?php
            echo $form->field($modelesa, 'nivel_estudios_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cnivelesestudios::find()->all(), 'id', 'nivel_estudio'),
                'options' => [
                    'placeholder' => 'Selecciona Estudios ...',
                ],
            ]);
            ?>

            <?= $form->field($modelesa, 'idioma')->textInput(['maxlength' => true]) ?>


        </div>

    </div>

    <div class="panel agresor">Factores de Riesgo</div>

    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($modelfr, 'agresiondroga_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cagresionesdrogas::find()->all(), 'id', 'agresiondroga'),
                'options' => [
                    'placeholder' => 'Selecciona Efectos de drogas ...',
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelfr, 'frecuenciaagresion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cfrecuenciaagresiones::find()->all(), 'id', 'frecuenciaagresion'),
                'options' => [
                    'placeholder' => 'Selecciona Frecuencia Agresión ...',
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelfr, 'armasagresor_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Carmasagresores::find()->all(), 'id', 'armasagresor'),
                'options' => [
                    'placeholder' => 'Selecciona Arma del Agresor ...',
                ],
            ]);
            ?>

            <?php $data = ['S' => 'Si', 'N' => 'No', 'X' => 'Se Desconoce'];
            echo $form->field($modelfr, 'porta_armas_agresor')->radioButtonGroup($data);
            ?>

            <?php
            echo $form->field($modelfr, 'lugarviolencia_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Clugaresviolencias::find()->all(), 'id', 'lugarviolencia'),
                'options' => [
                    'placeholder' => 'Selecciona Lugar de Violencia ...',
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelfr, 'lesion_fisica')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Clesionesfisicas::find()->all(), 'id', 'lesionfisica'),
                'options' => [
                    'placeholder' => 'Selecciona tipo de Lesión ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">

            <?php
            echo $form->field($modelfr, 'lesion_agente')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Clesionesagentes::find()->all(), 'id', 'lesionagente'),
                'options' => [
                    'placeholder' => 'Selecciona tipo de Agente ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelfr, 'area_lesionada')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Careaslesionadas::find()->all(), 'id', 'arealesionada'),
                'options' => [
                    'placeholder' => 'Selecciona Area Lesionada ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelfr, 'dano_psicologico')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cdanospsicologicos::find()->all(), 'id', 'danopsicologico'),
                'options' => [
                    'placeholder' => 'Selecciona tipo de Daño ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelfr, 'dano_economico')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cdanoseconomicos::find()->all(), 'id', 'danoeconomico'),
                'options' => [
                    'placeholder' => 'Selecciona tipo de Daño ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>

            <?php
            echo $form->field($modelfr, 'indicador_riesgo')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cindicadoresriesgos::find()->all(), 'id', 'indicadorriesgo'),
                'options' => [
                    'placeholder' => 'Selecciona indicador de riesgo ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
    </div>

    <div class="panel agresor">Seguimiento</div>

    <div class="row">
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($models, 'victima_canalizada')->radioButtonGroup($data);
            ?>

            <?php
            echo $form->field($models, 'tipocanalizacion_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposcanalizaciones::find()->all(), 'id', 'tipocanalizacion'),
                'options' => [
                    'placeholder' => 'Selecciona tipo de Canalización ...',
                ],
            ]);
            ?>

            <?php
            echo $form->field($models, 'banesvim')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cbanesvim::find()->all(), 'id', 'banesvim'),
                'options' => [
                    'placeholder' => 'Selecciona banesvim ...',
                ],
            ]);
            ?>


            <?php
            echo $form->field($models, 'paimef')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Cpaimef::find()->all(), 'id', 'paimef'),
                'options' => [
                    'placeholder' => 'Selecciona paimef ...',
                ],
            ]);
            ?>

            <?php
            echo $form->field($models, 'tipo_seguimiento')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Ctiposseguimientos::find()->all(), 'id', 'tiposeguimiento'),
                'options' => [
                    'placeholder' => 'Selecciona tipo de seguimiento ...',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'tags' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?php $data = ['S' => 'Si', 'N' => 'No'];
            echo $form->field($models, 'requiere_proteccion')->radioButtonGroup($data);
            echo $form->field($models, 'solicita_proteccion')->radioButtonGroup($data);
            echo $form->field($models, 'fuero_federal')->radioButtonGroup($data);
            echo $form->field($models, 'solicita_informacion')->radioButtonGroup($data);
            ?>
        </div>
    </div>





</div>



<div class="form-group">
    <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
</div>

<?= $form->field($model, 'cedula_id')->textInput()->label(false) ?>



<?php ActiveForm::end(); ?>
