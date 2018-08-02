<?php

namespace app\controllers;

use app\models\Cedulas;
use app\models\CedulasTelefonicas;
use app\models\Estratosocial;
use app\models\Estratosocialagresores;
use app\models\Factoresriesgo;
use app\models\Generalesagresores;
use app\models\Seguimiento;
use app\models\Violencia;
use app\models\ViolenciaTextos;
use Yii;
use app\models\Generalesusuarias;
use app\models\search\GeneralesusuariasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;
use yii\base\Model;

/**
 * GeneralesusuariasController implements the CRUD actions for Generalesusuarias model.
 */
class GeneralesusuariasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // Acciones para el Controlador
                'only' => ['index', 'view', 'create', 'delete', 'update'],
                'rules' => [
                    [
                        // Establece que tiene permisos los vendedores
                        'allow' => true,
                        // El usuario se le asignan permisos en las siguientes acciones
                        'actions' => ['create', 'view'],
                        // Todos los usuarios autenticados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un vendedor
                            return User::isUserTelefonico(Yii::$app->user->identity->id);
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Generalesusuarias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GeneralesusuariasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Generalesusuarias model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Generalesusuarias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // Verificar como se va a obtener este dato
        // NO SE ESTA USANDO COMO VALOR UNICO EL CEDULA_ID Corroborar como utilizarlo
        $valor_cedula = 43;

        $model = new Generalesusuarias();
        //$cedula = Cedulas::find()->where(['id' => $valor_cedula])->one();
        $cedula = Cedulas::find()->where(['tipoatencion_id' => 2])->one();
        if ($cedula->tipoatencion_id == 2) {
            //$cedula_inicial = CedulasTelefonicas::find()->where(['cedula_id' => $cedula->id])->one();
            $cedula_inicial = CedulasTelefonicas::find()->where(['cedula_id > 0' ])->one();

            $model->cedula_id = $cedula_inicial->cedula_id;
            $model->nombre = $cedula_inicial->nombre_temporal;
            $model->colonia_id = $cedula_inicial->colonia_id;
            $model->domicilio = $cedula_inicial->direccion;
        }

        $model_estrato_social = new Estratosocial();
        $model_violencia = new Violencia();
        $model_violencia_textos = new ViolenciaTextos();
        $model_general_agresor = new Generalesagresores();
        $model_estrato_social_agresor = new Estratosocialagresores();
        $model_factor_riesgo = new Factoresriesgo();
        $model_seguimiento = new Seguimiento();

        if (
            $model->load(Yii::$app->request->post()) &&
            $model_estrato_social->load(Yii::$app->request->post()) &&
            $model_violencia->load(Yii::$app->request->post()) &&
            $model_violencia_textos->load(Yii::$app->request->post()) &&
            Model::validateMultiple([$model, $model_estrato_social, $model_violencia, $model_violencia_textos])
        ) {
            $model->save(false);
            $model_estrato_social->cedula_id = $model->cedula_id;
            $model_estrato_social->save(false);

            $model_violencia->cedula_id = $model->cedula_id;
            $model_violencia->save(false);

            $model_violencia_textos->cedula_id = $model->cedula_id;
            $model_violencia_textos->save(false);

            return $this->redirect(['view', 'id' => $model->id]);


        } else {

            return $this->render('create', [
                'model' => $model,
                'model_estrato_social' => $model_estrato_social,
                'model_violencia' => $model_violencia,
                'model_violencia_textos' => $model_violencia_textos,
                'model_general_agresor' => $model_general_agresor,
                'model_estrato_social_agresor' => $model_estrato_social_agresor,
                'model_factor_riesgo' => $model_factor_riesgo,
                'model_seguimiento' => $model_seguimiento
            ]);

        }


        /*

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'cedula_inicial' => $cedula_inicial,
            'model' => $model,
            'model_estrato_social' => $model_estrato_social,
            'model_violencia' => $model_violencia,
            'model_violencia_textos' => $model_violencia_textos,
            'model_general_agresor' => $model_general_agresor,
            'model_estrato_social_agresor' => $model_estrato_social_agresor,
            'model_factor_riesgo' => $model_factor_riesgo,
            'model_seguimiento' => $model_seguimiento
        ]);

        */
    }

    /**
     * Updates an existing Generalesusuarias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Generalesusuarias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Generalesusuarias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Generalesusuarias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Generalesusuarias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
