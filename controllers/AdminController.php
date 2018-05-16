<?php

namespace elephantsGroup\owlSlider\controllers;

use Yii;
use elephantsGroup\owlSlider\models\OwlSlide;
use elephantsGroup\owlSlider\models\OwlSlideSearch;
//use yii\web\Controller;
use elephantsGroup\base\EGController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * OwlSliderController implements the CRUD actions for OwlSlider model.
 */
class AdminController extends EGController
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
						'actions' => ['index', 'view', 'create', 'update', 'delete'],
						'allow'   => true,
						'roles'   => ['slider_admin', 'admin'],
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
     * Lists all OwlSlider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OwlSlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OwlSlider model.
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
     * Creates a new OwlSlider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OwlSlide();

        if ($model->load(Yii::$app->request->post()))
		{
			$model->image_file = UploadedFile::getInstance($model, 'image_file');
			$model->text1_image_file = UploadedFile::getInstance($model, 'text1_image_file');
			$model->text2_image_file = UploadedFile::getInstance($model, 'text2_image_file');
			$model->text3_image_file = UploadedFile::getInstance($model, 'text3_image_file');
			if($model->save())
				return $this->redirect(['view', 'id' => $model->id]);
        }
		else
		{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OwlSlider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
		{
			$model->image_file = UploadedFile::getInstance($model, 'image_file');
			$model->text1_image_file = UploadedFile::getInstance($model, 'text1_image_file');
			$model->text2_image_file = UploadedFile::getInstance($model, 'text2_image_file');
			$model->text3_image_file = UploadedFile::getInstance($model, 'text3_image_file');
			if($model->save())
				return $this->redirect(['view', 'id' => $model->id]);
        }
		else
		{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OwlSlider model.
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
     * Finds the OwlSlider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OwlSlider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OwlSlide::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
