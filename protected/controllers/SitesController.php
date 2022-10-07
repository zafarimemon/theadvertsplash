<?php

class SitesController extends Controller
{
	public function actionAdd()
	{
		$data['users'] = Users::model()->findAll('id != 1');
		$this->render('add',$data);
	}

	public function actionEdit($id)
	{
		$data['site'] = Sites::model()->findByPk($id);
		$data['users'] = Users::model()->findAll('id != 1');
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
			Yii::app()->user->setFlash('success','Site updated successfully.');
            $this->redirect(Yii::app()->baseUrl.'/sites');
		}
	}

	public function actionSave()
	{
		if($_POST['domain']){
			$model = new Sites;
			$model->user_id = $_POST['user_id'];
			$model->isolated = 1;
			$model->status = 1;
			$model->status_message = 'Active';
			$model->domain = $_POST['domain'];
			$model->theme = $_POST['theme'];
			$model->allowed_camp_themes = '';
			$model->stat_url = $_POST['domain'];
			$model->stat_login = '';
			$model->stat_password = '';
			$model->created_at = date('Y-m-d H:i:s');
			$model->updated_at = date('Y-m-d H:i:s');
			$model->save(false);
			Yii::app()->user->setFlash('success','Site saved successfully.');
            $this->redirect(Yii::app()->baseUrl.'/sites');
		}
	}

	public function actionIndex()
	{
		$userModel = Yii::app()->session->get('userModel');
		if($userModel['user_type']=='webmaster'){
			$data['sites'] = Sites::model()->findAll('isolated != 2 AND user_id = '.$userModel['id']);
		} else{
			$data['sites'] = Sites::model()->findAll('isolated != 2');	
		}
		
		$this->render('index',$data);
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