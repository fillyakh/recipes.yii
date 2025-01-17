<?php

namespace app\controllers;

use app\models\RecipeTags;
use app\models\RecipeTagsSearch;
use app\models\Recipe;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * RecipeTagsController implements the CRUD actions for RecipeTags model.
 */
class RecipeTagsController extends Controller
{
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
     * Lists all RecipeTags models.
     *
     * @return string
     */
    public function actionIndex($recipe_id)
    {
        $searchModel = new RecipeTagsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $recipe = Recipe::findOne($recipe_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'recipe' => $recipe,
        ]);
    }


    /**
     * Creates a new RecipeTags model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($recipe_id)
    {
        $model = new RecipeTags();

        $model->recipe_id = $recipe_id;

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $data = RecipeTags::find()->where(['tag_id' => $model->tag_id, 'recipe_id'=>$model->recipe_id])->one();
            if ($data) {
                Yii::$app->session->setFlash('error', 'Такой тег уже добавлен.');
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
     * Deletes an existing RecipeTags model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Тег успешно удалён.');

        return $this->redirect(['index', 'recipe_id' => $model->recipe_id]);
    }

    /**
     * Finds the RecipeTags model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return RecipeTags the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RecipeTags::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
