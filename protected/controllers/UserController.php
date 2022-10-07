<?php

class UserController extends Controller
{
	public function init()
    {
        $this->checkSession();

    }
	public function actionAdd()
	{
		$this->render('add');
	}

	public function actionEdit($id)
	{
		$data['user'] = Users::model()->findByPk($id);
		$this->render('edit',$data);
	}

	public function actionIndex()
	{
		$userModel = Yii::app()->session->get('userModel');
		if($userModel['user_type']!='webmaster'){
			$data['users'] = Users::model()->findAll("subrole = 'webmaster'");
			$this->render('index',$data);	
		} else{
			Yii::app()->user->setFlash('danger','You are not authorize to view this page');
            $this->redirect(Yii::app()->baseUrl.'/dashboard');
		}	 
	}



	public function actionChangepassword()
	{
		$userModel = Yii::app()->session->get('userModel');
		$data['user'] = Users::model()->findByPk($userModel['id']);
		$this->render('changepassword',$data);
	}


	public function actionSavepassword()
	{
		$userModel = Yii::app()->session->get('userModel');
		$user = Users::model()->findByPk($userModel['id']);
		if($_POST['username'] == $user->username && $this->superhash($_POST['old_password']) == $user->password){
			$user->password = $this->superhash($_POST['password']);
			$user->confirmpassword = $this->superhash($_POST['password']);
			$user->save(false);
			Yii::app()->user->setFlash('success','User update successfully.');
            $this->redirect(Yii::app()->baseUrl.'/user/changepassword');
		} else{
			Yii::app()->user->setFlash('danger','Username or password not matched.');
            $this->redirect(Yii::app()->baseUrl.'/user/changepassword');
		}
	}

	public function actionUpdate()
	{
		if($_POST['name']){
			$Users = Users::model()->findByPk($_POST['id']);
			if($_POST['password'] != ''){
				$Users->attributes = $_POST;
				$Users->password = $this->superhash($_POST['password']);
				$Users->confirmpassword = $this->superhash($_POST['password']);	
			} else{
				unset($_POST['password']);
				$Users->attributes = $_POST;
			}
			$Users->status = 1;
			$Users->save(false);
			Yii::app()->user->setFlash('success','User update successfully.');
            $this->redirect(Yii::app()->baseUrl.'/user');
		}
	}

	public function actionSave(){
		if($_POST['name']){
			$Users = new Users;
			$Users->attributes = $_POST;
			$Users->password = $this->superhash($_POST['password']);
			$Users->confirmpassword = $this->superhash($_POST['password']);
			$Users->status = 1;
			$Users->role = 'user';
			$Users->subrole = 'webmaster';
			$Users->save(false);
			Yii::app()->user->setFlash('success','User add successfully.');
            $this->redirect(Yii::app()->baseUrl.'/user');
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