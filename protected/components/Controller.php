<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public function checkSession() {
        if (!isset(Yii::app()->session['userModel'])) {
            $previousUrl=Yii::app()->request->urlReferrer;
            Yii::app()->session['urlReferer']=$previousUrl;
            //echo "<body onLoad='artificialbody()'></body>";
            //return false;
            //exit();
            Yii::app()->user->setFlash('error','Please Login the get back to the previous page');
            $this->redirect(Yii::app()->params['AppUrl'].'site');
            //$this->redirect(Yii::app()->request->urlReferrer);
        }
	}

	public function superhash($str)
    {
        $pefix_salt  = sha1(md5($str));
        $suffix_salt = md5(sha1($str));

        return sha1($pefix_salt . $str . $suffix_salt);
    }

	public function sendSMS($number,$mesage){
		//$msg = 'https://pk.eocean.us/APIManagement/API/RequestAPI?user=AlMeraj&pwd=AJjKIsbWwrAzV48RDGDsx%2fV9%2b%2f4gt7WCQwG%2b4cANwTe5lzrpGlN1IH2RUeCt%2fZKHLA%3d%3d&sender=AL%20MERAJ&reciever='.$number.'&msg-data='.urldecode($mesage).'&response=string';
		//$number = '03312326877';
		$msg = 'https://pk.eocean.us/APIManagement/API/RequestAPI?user=AlMeraj&pwd=AIJy%2bjXrwE31zratsNWBMJqrg%2faQLcZbZPZDp1Wjn3OBsx%2fDfMjTEwzwjlKsEr8CHQ%3d%3d&sender=AL%20MERAJ&reciever='.$number.'&msg-data='.rawurlencode($mesage).'&response=string';
		
		//Try using %0A in the URL, just like you've used %20 instead of the space character.
		// use key 'http' even if you send the request to https://...
		$options = array(
		  'http' => array(
		    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		    'method'  => 'GET',
		  ),
		);
		//echo $mesage.'</br>';
		// $context  = @stream_context_create($options);
		// $result = @file_get_contents($msg, false, $context);
		// @var_dump($result); 
	}
}