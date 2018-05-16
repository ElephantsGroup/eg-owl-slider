<?php

namespace elephantsGroup\owlSlider\controllers;

use Yii;
use elephantsGroup\owlSlider\models\OwlSlideCategory;
use elephantsGroup\owlSlider\models\OwlSlideCategorySearch;
//use yii\web\Controller;
//use app\modules\news\components\Controller;
use elephantsGroup\base\EGController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OwlSliderCategoryController implements the CRUD actions for NewsCategory model.
 */
class CategoryAdminController extends EGController
{
    public function behaviors()
    {
		$behaviors = [];
		$behaviors['verbs'] = [
			'class' => VerbFilter::className(),
			'actions' => [
				'delete' => ['post'],
			],
		];
        /*$auth = Yii::$app->getAuthManager();
        if ($auth)
		{
			$behaviors['access'] = [
				'class' => \yii\filters\AccessControl::className(),
				'only' => ['index', 'view', 'create', 'update', 'delete'],
				'rules' => [
					[
						'actions' => ['create'],
						'allow'   => true,
						'roles'   => ['news_publisher', 'admin'],
					],
					[
						'actions' => ['index', 'view', 'update'],
						'allow'   => true,
						'roles'   => ['news_editor', 'admin'],
					],
					[
						'actions' => ['index', 'view', 'create', 'update', 'delete'],
						'allow'   => true,
						'roles'   => ['news_admin', 'admin'],
					],
				],
			];
		}
		else
		{
			$behaviors['access'] = [
				'class' => \yii\filters\AccessControl::className(),
				'only' => ['index', 'view', 'create', 'update', 'delete'],
				'rules' => [
					[
						'actions' => ['index', 'view', 'create', 'update', 'delete'],
						'allow'   => true,
						'roles'   => ['@'],
					],
				],
			];
		}*/
		return $behaviors;
    }

    /**
     * Lists all NewsCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
		$searchModel = new OwlSlideCategorySearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OwlSlideCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OwlSlideCategory();
        
        if ($model->load(Yii::$app->request->post())){
			if($model->save())
					return $this->redirect(['view', 'id' => $model->id]);
		}
	    return $this->render('create', [
                'model' => $model,
		]);
    }

    /**
     * Updates an existing OwlSlideCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
			if($model->save())
				return $this->redirect(['view', 'id' => $model->id]);					
		}
		return $this->render('update', [
                'model' => $model,
		]);
    }

    /**
     * Deletes an existing OwlSlideCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OwlslideCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OwlSlideCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OwlSlideCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
