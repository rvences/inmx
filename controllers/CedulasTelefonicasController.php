<?php

namespace app\controllers;

use app\models\Cedulas;
use Yii;
use app\models\CedulasTelefonicas;
use app\models\search\CedulasTelefonicasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\User;


/**
 * CedulasTelefonicasController implements the CRUD actions for CedulasTelefonicas model.
 */
class CedulasTelefonicasController extends Controller
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
                        'actions' => ['create', 'view', 'update'],
                        // Todos los usuarios autenticados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un vendedor
                            return User::isUserTelefonico(Yii::$app->user->identity->id)  ;
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
     * Lists all CedulasTelefonicas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CedulasTelefonicasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CedulasTelefonicas model.
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
     * Creates a new CedulasTelefonicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CedulasTelefonicas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //$model->institucion_canaliza = implode (", ",$model->institucion_canaliza);
            $model->tipoasesorias = json_encode(Yii::$app->request->post( 'CedulasTelefonicas' )['tipoasesorias']); //Pasando de Array a Cadena
            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);

            //return $this->redirect(['view', 'id' => $model->id]);
        }

        // Se genera la cedula inicial
        $cedula = new Cedulas();
        $cedula->status_id = 1;  // Creada sin utilizar
        $cedula->tipoatencion_id = 2;  // Telefónica
        $cedula->save();

        return $this->render('create', [
            'model' => $model,
            'modelCedula' => $cedula
        ]);
    }

    /**
     * Updates an existing CedulasTelefonicas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelCedula = Cedulas::find()->where(['id' => $model->cedula_id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->demanda = $model->demanda_historico . ' -- ' . $model->demanda;
            $model->narracion_hechos = $model->narracion_hechos_historico . ' -- ' . $model->narracion_hechos;
            $model->tipoasesorias = json_encode(Yii::$app->request->post( 'CedulasTelefonicas' )['tipoasesorias']); //Pasando de Array a Cadena
            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);
        }

        $model->tipoasesorias =  json_decode($model->tipoasesorias);
        $model->demanda_historico = $model->demanda;
        $model->demanda = '';
        $model->narracion_hechos_historico = $model->narracion_hechos;
        $model->narracion_hechos = '';

        return $this->render('update', [
            'model' => $model,
            'modelCedula' => $modelCedula
        ]);
    }

    /**
     * Deletes an existing CedulasTelefonicas model.
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
     * Finds the CedulasTelefonicas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CedulasTelefonicas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CedulasTelefonicas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
