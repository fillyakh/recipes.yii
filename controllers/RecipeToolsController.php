<?php

namespace app\controllers;

use app\models\RecipeTools;
use app\models\RecipeToolsSearch;
use app\models\Recipe;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * RecipeToolsController implements the CRUD actions for RecipeTools model.
 */
class RecipeToolsController extends Controller
{
    public $layout = 'admin';
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all RecipeTools models.
     *
     * @return string
     */
    public function actionIndex($recipe_id)
    {
        $searchModel = new RecipeToolsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $recipe = Recipe::findOne($recipe_id);
        // dd($recipe);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'recipe' => $recipe,
        ]);
    }

    /**
     * Creates a new RecipeTools model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($recipe_id)
    {
        $model = new RecipeTools();

        $model->recipe_id = $recipe_id;

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $data = RecipeTools::find()->where(['tool_id' => $model->tool_id, 'recipe_id'=>$model->recipe_id])->one();
            if ($data) {
                Yii::$app->session->setFlash('error', 'Такой инструмент уже добавлен.');
                return $this->redirect(['create', 'recipe_id' => $model->recipe_id]);
            }
            // dd($data);
            if ($model->save()) {
                return $this->redirect(['index', 'recipe_id' => $model->recipe_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RecipeTools model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index', 'recipe_id' => $model->recipe_id]);
    }

    protected function findModel($id)
    {
        if (($model = RecipeTools::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
