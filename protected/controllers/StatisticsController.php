<?php

class StatisticsController extends Controller
{
	public function init()
    {
        $this->checkSession();

    }
	public function actionIndex()
	{
		$data['type'] = $type = isset($_GET['type'])?$_GET['type']:'days';
		$data['daterange'] = isset($_GET['daterange'])?$_GET['daterange']:(date('Y-m-d').' - '.date('Y-m-d'));
		$userModel = Yii::app()->session->get('userModel');
		$userr = "";
		if($userModel['user_type']=='webmaster'){
			$userr = " WHERE s.user_id = ".$userModel['id'];
		}
		switch ($type) {
			case 'days':
				//$sql = "SELECT date,s.domain,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id $userr GROUP BY `date` ORDER BY `date` DESC";
				//echo $sql;exit;
				if($userModel['user_type']=='webmaster'){
					$userr = " AND s.user_id = ".$userModel['id'];
				}
				if(isset($_GET['daterange'])){
					$daterange = explode(' - ', $_GET['daterange']);
					$sql = "SELECT date,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id WHERE sa.date BETWEEN '{$daterange[0]}' AND '{$daterange[1]}' $userr GROUP BY `date` ORDER BY `date` DESC";


				} else{
					if($userModel['user_type']=='webmaster'){
							$userr = " WHERE s.user_id = ".$userModel['id'];
						}
					$sql = "SELECT date,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id $userr GROUP BY `date` ORDER BY `date` DESC";	
				}

				//echo $sql;exit;

				break;
			case 'daterange':
				$daterange = explode(' - ', $_GET['daterange']);
				$sql = "SELECT date,s.domain,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id JOIN users u ON u.id = sa.user_id  AND sa.date BETWEEN '{$daterange[0]}' AND '{$daterange[1]}' $userr GROUP BY sa.date ORDER BY sa.date DESC";
				break;
			default:
				$sql = '';
				$view = 'index-days';
				break;
		}

		//echo $sql;exit;
		$stats = Yii::app()->db->createCommand($sql)->queryAll();
		$data['stats'] = (object) $stats;
		// echo '<pre>';print_r($data);exit;
		$data['filter'] = $this->renderPartial('filter', $data, true);
		$this->render('index-days',$data);
	}

	public function actionStats()
	{
		$data['type'] = 'days';
		$data['filter'] = $this->renderPartial('filter', $data, true);
		$type = $_GET['type'];
		$data['daterange'] = isset($_GET['daterange'])?$_GET['daterange']:(date('Y-m-d').' - '.date('Y-m-d'));
		$sql = '';
		$view = 'index-days';
		$userModel = Yii::app()->session->get('userModel');
		$userr = "";
		if($userModel['user_type']=='webmaster'){
			$userr = " AND s.user_id = ".$userModel['id'];
		}
		switch ($type) {
			case 'days':
				if(isset($_GET['daterange'])){
					$daterange = explode(' - ', $_GET['daterange']);
					$sql = "SELECT date,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa WHERE sa.date BETWEEN '{$daterange[0]}' AND '{$daterange[1]}' GROUP BY `date` ORDER BY `date` DESC";
				} else{
					$sql = "SELECT date,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits GROUP BY `date` ORDER BY `date` DESC";	
				}
				
				$view = 'index-days';
				break;
			case 'wabmaster':
				if($userModel['user_type']=='webmaster'){
					$sql = "SELECT date,u.username,s.domain,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id LEFT JOIN users u ON u.id = s.user_id WHERE u.subrole = 'webmaster' $userr GROUP BY `date` ORDER BY `date` DESC";
					//echo $sql;exit;
				} else{
					$sql = "SELECT date,u.username,s.domain,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id LEFT JOIN users u ON u.id = s.user_id WHERE u.subrole = 'webmaster' GROUP BY s.user_id ORDER BY `date` DESC";
				}
					
				$view = 'index-advertise';
				break;
			case 'sites':
				$userr = '';
				if(isset($_GET['daterange'])){
					$daterange = explode(' - ', $_GET['daterange']);
					if($userModel['user_type']=='webmaster'){
						$userr = " AND s.user_id = ".$userModel['id'];
					}
					$sql = "SELECT date,s.domain,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id LEFT JOIN users u ON u.id = sa.user_id  WHERE sa.date BETWEEN '{$daterange[0]}' AND '{$daterange[1]}' $userr GROUP BY s.domain ORDER BY sa.date DESC";
				} else{
					if($userModel['user_type']=='webmaster'){
						$userr = " WHERE s.user_id = ".$userModel['id'];
					}
					$sql = "SELECT date,s.domain,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id LEFT JOIN users u ON u.id = sa.user_id $userr GROUP BY s.domain ORDER BY sa.date DESC";
					
				}
				$view = 'index-sites';

			break;
			case 'daterange':
				$daterange = explode(' - ', $_GET['daterange']);
				$sql = "SELECT date,s.domain,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id LEFT JOIN users u ON u.id = sa.user_id  WHERE sa.date BETWEEN '{$daterange[0]}' AND '{$daterange[1]}' $userr GROUP BY sa.date ORDER BY sa.date DESC";
				//echo $sql;exit;
				$view = 'index-days';
				break;
			default:
				$sql = '';
				$view = 'index-days';
				break;
		}
		//echo $sql;exit;
		if($sql){
			$stats = Yii::app()->db->createCommand($sql)->queryAll();	
			$data['stats'] = (object) $stats;
		} else{
			$data['stats'] = NULL;
		}
		
		$data['type'] = $type;
		$this->render($view,$data);
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