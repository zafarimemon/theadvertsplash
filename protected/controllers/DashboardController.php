<?php

class DashboardController extends Controller
{
	public function init()
    {
        $this->checkSession();

    }
	public function actionIndex()
	{
		$userModel = Yii::app()->session->get('userModel');
		if($userModel['user_type']=='webmaster'){
			$sql = "SELECT date,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id WHERE s.user_id = ".$userModel['id']." LIMIT 1";
			$stats = Yii::app()->db->createCommand($sql)->queryAll();
			//echo $sql;exit;
			$data['stats'] = (object) $stats[0];

			$sql = "SELECT SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id WHERE MONTH(date) = ".date('m')." AND s.user_id = ".$userModel['id']." LIMIT 1";
			$stats = Yii::app()->db->createCommand($sql)->queryAll();
			$data['month_stat'] = (object) $stats[0];
		} else{
			$sql = "SELECT date,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM `stat_adunits` LIMIT 1";
			$stats = Yii::app()->db->createCommand($sql)->queryAll();
			$data['stats'] = (object) $stats[0];

			$sql = "SELECT SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM `stat_adunits` WHERE MONTH(date) = ".date('m')." LIMIT 1";
			$stats = Yii::app()->db->createCommand($sql)->queryAll();
			$data['month_stat'] = (object) $stats[0];
		}
		$userr = '';
		if($userModel['user_type']=='webmaster'){
			$userr = " WHERE s.user_id = ".$userModel['id'];
		}
		$sqlData = "SELECT date,SUM(ad_requests) as ad_requests,SUM(views) as views,SUM(clicks) as clicks,AVG(ctr) as ctr,AVG(cpm) as cpm,SUM(profit) as profit FROM stat_adunits sa LEFT JOIN sites s ON s.site_id = sa.site_id $userr GROUP BY `date` ORDER BY `date` DESC";
		$statData = Yii::app()->db->createCommand($sqlData)->queryAll();
		//echo $sqlData;
		$ddd = array_map(function($item) use(&$userModel){
			//echo $item['profit'].'---'.($item['profit']-(($item['profit']*$userModel['percentage'])/100));exit;
			$item['profit'] = ($item['profit']-(($item['profit']*$userModel['percentage'])/100));
			$item['ctr'] = $item['ctr'];
			return $item;
		}, $statData);
		
		$data['statsTotal'] = array_sum(array_column($ddd, 'profit'));
		$data['ctrTotal'] = array_sum(array_column($ddd, 'ctr'));
		//echo '<pre>';print_r($data);exit;
		$this->render('index',$data);
	}
}