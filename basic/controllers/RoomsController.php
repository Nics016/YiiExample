<?php 
	namespace app\controllers;

	use Yii;
	use yii\web\Controller;
	use app\models\Room;
	use yii\web\UploadedFile;


	class RoomsController extends Controller{

		public function actionCreate(){
			$model = new Room();
			$modelCanSave = false;

			// takes form name from the model->formName()
			if ($model->load(Yii::$app->request->post()) && $model->validate()){
				// fileImage proccessing:
				$model->fileImage = UploadedFile::getInstance($model, 'fileImage');

				if ($model->fileImage){
					$model->fileImage->saveAs(Yii::getAlias('@uploadedfilesdir/'.$model->fileImage->baseName.'.'.$model->fileImage->extension));
				}

				$modelCanSave = true;
			}

			return $this->render('create', [
				'model' => $model,
				'modelSaved' => $modelCanSave,
			]);
		}

	}
 ?>