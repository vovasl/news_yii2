<?php

namespace frontend\controllers;

use common\components\RandomWord;
use common\models\Blog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class BlogController extends Controller
{

    /**
     * Lists all Blog models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $sort = [
            'viewed_time' => SORT_DESC,
        ];
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find(),
            'sort' => [
                'defaultOrder' => $sort
            ],
            'pagination' => [
                'pageSize' => 5,
                'pageSizeParam' => false,
            ],
        ]);

        $this->view->params['firstModel'] = ($model = Blog::find()->orderBy($sort)->one());
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->updateViewedTime();
        $model->save();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Blog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws \Exception
     */
    public function actionCreate()
    {
        $model = new Blog();
        $model->text = RandomWord::init([
            'number' => '10',
        ]);

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Blog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Blog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blog::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
