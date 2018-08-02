<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Generalesusuarias */


?>
<div class="panel-info">

    <div class="panel-heading">Datos Generales de la Usuaria</div>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modeles' => $model_estrato_social,
        'modelv' => $model_violencia,
        'modelvt' => $model_violencia_textos,
        'modelga' => $model_general_agresor,
        'modelesa' => $model_estrato_social_agresor,
        'modelfr' => $model_factor_riesgo,
        'models' => $model_seguimiento
    ]) ?>

</div>
