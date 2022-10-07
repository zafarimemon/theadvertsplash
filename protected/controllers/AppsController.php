<?php

class AppsController extends Controller
{
	public function init()
    {
        $this->checkSession();

    }
	public function actionAdd()
	{
		$data['users'] = Users::model()->findAll();
		$this->render('add',$data);
	}

	public function actionEdit($id)
	{
		$data['site'] = Sites::model()->findByPk($id);
		$data['users'] = Users::model()->findAll();
		$this->render('edit',$data);
	}

	public function actionUpdate()
	{
		if($_POST['domain']){
			$model = Sites::model()->findByPk($_POST['site_id']);
			$model->user_id = $_POST['user_id'];
			$model->domain = $_POST['domain'];
			$model->updated_at = date('Y-m-d H:i:s');
			$model->save(false);
			Yii::app()->user->setFlash('success','App updated successfully.');
            $this->redirect(Yii::app()->baseUrl.'/apps');
		}
	}

	public function actionSave()
	{
		if($_POST['domain']){
			$model = new Sites;
			$model->user_id = $_POST['user_id'];
			$model->isolated = 2;
			$model->status = 1;
			$model->status_message = 'Active';
			$model->domain = $_POST['domain'];
			$model->theme = $_POST['theme'];
			$model->allowed_camp_themes = '';
			$model->stat_url = $_POST['stat_url'];
			$model->stat_login = '';
			$model->stat_password = '';
			$model->created_at = date('Y-m-d H:i:s');
			$model->updated_at = date('Y-m-d H:i:s');
			$model->save(false);
			Yii::app()->user->setFlash('success','App saved successfully.');
            $this->redirect(Yii::app()->baseUrl.'/apps');
		}
	}

	public function actionIndex()
	{
		$userModel = Yii::app()->session->get('userModel');
		if($userModel['user_type']=='webmaster'){
			$data['sites'] = Sites::model()->findAll('isolated = 2 AND user_id = '.$userModel['id']);
		} else{
			$data['sites'] = Sites::model()->findAll('isolated = 2');	
		}
		
		$this->render('index',$data);
	}


	public function actionRemoveuser($id)
	{
		$site= Sites::model()->findByPk($id);
		$user = Users::model()->findByPk(1);

		if($site){
			$site->user_id = $user->id;
			$site->save(false);
			Yii::app()->user->setFlash('success','App updated successfully.');
            $this->redirect(Yii::app()->baseUrl.'/apps');
		} else{
			Yii::app()->user->setFlash('error','Something went wrong.');
            $this->redirect(Yii::app()->baseUrl.'/apps');
		}
	}

	public function actionRemoveapp($id)
	{
		$site= Sites::model()->findByPk($id);
		$user = Users::model()->findByPk(1);

		if($site){
			if($site->status == 1){
				$site->status = 0;
			} else{
				$site->status = 1;
			}
			$site->save(false);
			Yii::app()->user->setFlash('success','App updated successfully.');
            $this->redirect(Yii::app()->baseUrl.'/apps');
		} else{
			Yii::app()->user->setFlash('error','Something went wrong.');
            $this->redirect(Yii::app()->baseUrl.'/apps');
		}
	}



	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}