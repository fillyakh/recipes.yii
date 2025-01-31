<?php

namespace app\controllers;

use app\models\Recipe;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * PopularController implements the CRUD actions for Recipe model.
 */
class PopularController extends Controller
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
     * Lists all Recipe models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Recipe::find()->where(['popular' => Recipe::IS_POPULAR]),

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChange($recipe_id)
    {
        $recipe = Recipe::findOne(['id' => $recipe_id]);
        // dd($recipe);
        if ($recipe->popular == 0) {
            $recipe->popular = '1';
            Yii::$app->session->setFlash('success', 'Товар успешно добавлен в популярные.');
        } else {
            $recipe->popular = '0';
            Yii::$app->session->setFlash('success', 'Товар успешно убран из популярных.');
        }
        $recipe->save();

        return $this->redirect(['recipe/view', 'id' => $recipe->id]);
    }

    public function actionDelete($id)
    {
        $recipe = $this->findModel($id);

        $recipe->popular = 0;
        $recipe->save();
        Yii::$app->session->setFlash('success', 'Товар успешно убран из популярных.');

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Recipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Recipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipe::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
