<?php

class ReportsController extends Controller
{
    public function init()
    {
        $this->checkSession();

    }
	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionUpload()
	{
		$this->render('upload');
	}


    public function actionUploadapp()
    {
        $this->render('upload-app');
    }

	public function GetBetween($content,$start,$end)
    {
        $r = explode($start, $content);
        if (isset($r[1])){
            $r = explode($end, $r[1]);
            return $r[0];
        }
        return '';
    }

	public function actionUploadreport()
	{
		$uploadFolder = getcwd() . '/reports/';
        $fileName = 'report.csv';
        $orig_fileName = $_FILES['report']['name'];
        move_uploaded_file($_FILES['report']['tmp_name'], $uploadFolder.$fileName);
        $result = [];
        if (($handle = fopen($uploadFolder.$fileName, 'r')) !== FALSE) {
            $index = 0;
            while (($row = fgetcsv($handle, 100000, ',')) !== FALSE) {

                if (empty($header)) {
                    $header = $row;
                } else {
                    $result[] = $row;
                }
                $index++;
            }
            fclose($handle);
        }
        
        if(!empty($result)){
            //echo '<pre>';
            array_pop($result);
            //print_r($result);
            //exit;
            $camp = array_map('trim', explode('»', $result[0][1]));
            $camp_params = [
                'user_id'          => Yii::app()->session['userModel']['id'],
                'isolated'         => 1,
                'status'           => 1,
                'name'             =>'Campaign - '.$camp[0],
                'type' =>   $_POST['type'],
                'theme' => 'auto_moto',
                'allowed_site_themes' => 'auto_moto,business_finance,house_family,health_fitness,games,career_work,cinema,beauty_cosmetics,cookery,fashion_clothes,music,the_property,news,society,entertainment,sport,science,goods,tourism,adult,other',
                // 'start_date' => date('Y-m-d', strtotime($date[0])),
                // 'end_date' => date('Y-m-d', strtotime($date[1])),
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'days' => '1,2,3,4,5,6,7',
                'hours' => '00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23',
                'geos' => 'AF,AX,AL,DZ,AS,AD,AO,AI,AQ,AG,AR,AM,AW,AU,AT,AZ,BS,BH,BD,BB,BY,BE,BZ,BJ,BM,BT,BO,BQ,BA,BW,BV,BR,IO,BN,BG,BF,BI,KH,CM,CA,CV,KY,CF,TD,CL,CN,CX,CC,CO,KM,CG,CD,CK,CR,CI,HR,CU,CW,CY,CZ,DK,DJ,DM,DO,EC,EG,SV,GQ,ER,EE,ET,FK,FO,FJ,FI,FR,GF,PF,TF,GA,GM,GE,DE,GH,GI,GR,GL,GD,GP,GU,GT,GG,GN,GW,GY,HT,HM,VA,HN,HK,HU,IS,IN,ID,IR,IQ,IE,IM,IL,IT,JM,JP,JE,JO,KZ,KE,KI,KP,KR,KW,KG,LA,LV,LB,LS,LR,LY,LI,LT,LU,MO,MK,MG,MW,MY,MV,ML,MT,MH,MQ,MR,MU,YT,MX,FM,MD,MC,MN,ME,MS,MA,MZ,MM,NA,NR,NP,NL,NC,NZ,NI,NE,NG,NU,NF,MP,NO,OM,PK,PW,PS,PA,PG,PY,PE,PH,PN,PL,PT,PR,QA,RE,RO,RU,RW,BL,SH,KN,LC,MF,PM,VC,WS,SM,ST,SA,SN,RS,SC,SL,SG,SX,SK,SI,SB,SO,ZA,GS,SS,ES,LK,SD,SR,SJ,SZ,SE,CH,SY,TW,TJ,TZ,TH,TL,TG,TK,TO,TT,TN,TR,TM,TC,TV,UG,UA,AE,GB,US,UM,UY,UZ,VU,VE,VN,VG,VI,WF,EH,YE,ZM,ZW',
                'devs' => 'Computer,Tablet,Mobile',
                'platforms' => 'Windows_10,Windows_8_1,Windows_8,Windows_7,Windows_Vista,Windows_XP,Mac_OS,Ubuntu,Linux,unknown_desktop_os,iOS,Android,Windows_Phone,Symbian,Black_Berry,Windows_Mobile,unknown_mobile_os',
                'browsers' => 'Chrome_d,Firefox_d,Opera_d,IE_d,Edge_d,Maxthon_d,Safari_d,unknown_desktop_browser,Chrome_m,Android_m,Opera_m,Dolphin_m,Firefox_m,UCBrowser_m,Puffin_m,Safari_m,Edge_m,IE_m,unknown_mobile_browser',
                'updated_at' => gmdate('Y-m-d H:i:s'),
                'created_at' => gmdate('Y-m-d H:i:s'),
            ];
            
            $camps = new Camps;
            $camps->attributes = $camp_params;
            $camps->save(false);

            $newCampId = $camps->id;

            foreach ($result as $value) {
                //$site = $userdata = $this->Settings2->getSite(['domain'=>$value[0]],'sites');
                $site = Sites::model()->find('domain=:domain',array(':domain'=>$value[2]));

                if(!$site){
                	$siteData = [
					    'domain'      => $value[2],
					    'status'   => 1,
					    'user_id'   => Yii::app()->session['userModel']['id'],
					    'theme'   => '',
					    'stat_url'   => '',
					    'allowed_camp_themes'=> '',
					    'created_at'=> gmdate('Y-m-d H:i:s'),
					    'updated_at'=> gmdate('Y-m-d H:i:s'),
					    'isolated' => 1,
					];
					$site = new Sites;
					$site->attributes = $siteData;
					$site->save(false);
                    //$site = $this->Settings2->addSite($value,'sites');
                } 
                $unit_params = [
                    'hash_id'          => 'b' . md5(uniqid('', true)),
                    'user_id'          => $site->user_id,
                    'site_id'          => $site->site_id,
                    'name'             => 'Ad Unit',
                    'status'           => 1,
                    'type'             => 'banner',
                    'banner_size'      => 'test',
                    'min_cpc'          => 0.01,
                    'min_cpv'          => 1.00,
                    'params'           => json_encode([]),
                    'allowed_payments' => 'cpc,cpv',
                    'created_at'       => $_POST['start_date'],
                ];
                $adUnits = new Adunits;
                $adUnits->attributes = $unit_params;
                $adUnits->save(false);
                //$this->db->insert('adunits', $unit_params);
                

                $addUnitId = $adUnits->unit_id;
                $dateApp = explode('/', $value[0]);
                if(count($dateApp) > 1){
                    $unit_state_params = [
                        'unit_id'          => $addUnitId,
                        'user_id'          => $site->user_id,
                        'site_id'          => $site->site_id,
                        'ad_requests'      => str_replace(',', '', $value[3]),
                        'matched_requests'      => str_replace(',', '', $value[4]),
                        'views'           => str_replace(',', '', $value[9]),
                        'clicks'             => str_replace(',', '', $value[5]),
                        'ctr'      => str_replace('%', '', $value[6]),
                        'cpm'          => str_replace('US$', '', $value[10]),
                        'profit'          => $value[8],
                        //'date'       => isset($dateApp[2])?($dateApp[2].'-'.$dateApp[0].'-'.$dateApp[1]):$value[0],
                        'date'       => isset($dateApp[2])?($dateApp[2].'-'.$dateApp[1].'-'.$dateApp[0]):$value[0],
                    ];

                    $statAdunits = new StatAdunits;
                    $statAdunits->attributes = $unit_state_params;
                    $statAdunits->save(false);    
                }
                // $addUnitId = $adUnits->unit_id;//$this->db->insert_id();
                // $unit_state_params = [
                //     'unit_id'          => $addUnitId,
                //     'user_id'          => $site->user_id,
                //     'site_id'          => $site->site_id,
                //     'ad_requests'      => $value[2],
                //     'matched_requests'      => $value[3],
                //     'views'           => $value[8],
                //     'clicks'             => $value[5],
                //     'ctr'      => str_replace('%', '', $value[6]),
                //     'cpm'          => $value[9],
                //     'profit'          => $value[7],
                //     'date'       => $_POST['start_date'],
                // ];

                // $statAdunits = new StatAdunits;
                // $statAdunits->attributes = $unit_state_params;
                // $statAdunits->save(false);

                //$this->db->insert('stat_adunits', $unit_state_params);
            }
        }


        //$query = $this->db->query('SELECT site_id,user_id,u.subrole,SUM(`views`) as views,SUM(clicks) as clicks,SUM(ctr) as ctr,SUM(cpm) as cpm,SUM(profit) as profit,COUNT(*) AS CNT FROM stat_adunits sa JOIN users u ON u.id = sa.user_id GROUP BY site_id');
        //Yii::app()->db->createCommand("DELETE FROM stat_adunits WHERE date = '0000-00-00'")->queryAll();
        $sql = 'SELECT site_id,user_id,u.subrole,SUM(`views`) as views,SUM(clicks) as clicks,SUM(ctr) as ctr,SUM(cpm) as cpm,SUM(profit) as profit,COUNT(*) AS CNT FROM stat_adunits sa JOIN users u ON u.id = sa.user_id GROUP BY site_id';
		$query = Yii::app()->db->createCommand($sql)->queryAll();
        

		$views = 0;
        $clicks = 0;
        $ctr = 0;
        $cpm = 0;
        $profit = 0;
        foreach ($query as $row){
            if($row['subrole']=='webmaster'){
                $stat_webmaster_params = [
                    'user_id'          => $row['user_id'],
                    'views'           => $row['views'],
                    'clicks'             => $row['clicks'],
                    'ctr'      => $row['ctr'],
                    'cpm'          => $row['cpm'],
                    'profit'          => $row['profit'],
                    'date'       => $_POST['start_date'],
                ];
                //$this->db->insert('stat_webmasters', $stat_webmaster_params);    
                $statWebmasters = new StatWebmasters;
                $statWebmasters->attributes = $stat_webmaster_params;
                $statWebmasters->save(false);
            }
            $stat_sites_params = [
                'user_id'          => $row['user_id'],
                'site_id'          => $row['site_id'],
                'views'           => $row['views'],
                'clicks'             => $row['clicks'],
                'ctr'      => $row['ctr'],
                'cpm'          => $row['cpm'],
                'profit'          => $row['profit'],
                'date'       => $_POST['start_date'],
            ];
            $views = $views + $row['views'];
            $clicks = $clicks + $row['clicks'];
            $ctr = $ctr + $row['ctr'];
            $cpm = $cpm + $row['cpm'];
            $profit = $profit + $row['profit'];
            //$this->db->insert('stat_sites', $stat_sites_params);
            $statSites = new StatSites;
            $statSites->attributes = $stat_sites_params;
            $statSites->save(false);
        }

        //stat_advertisers
        // $query = $this->db->query('SELECT site_id,SUM(`views`) as views,SUM(clicks) as clicks,SUM(ctr) as ctr,SUM(cpm) as cpm,SUM(profit) as profit,COUNT(*) AS CNT FROM stat_adunits GROUP BY user_id');
        //foreach ($query->result_array() as $row){
        $stat_user_params = [
            'user_id'          => Yii::app()->session['userModel']['id'],
            'views'           => $views,
            'clicks'             => $clicks,
            'ctr'      => $ctr,
            'cpm'          => $cpm,
            'costs'          => $profit,
            'date'       => $_POST['start_date'],
        ];
        //$this->db->insert('stat_advertisers', $stat_user_params);
        $statAdvertisers = new StatAdvertisers;
        $statAdvertisers->attributes = $stat_user_params;
        $statAdvertisers->save(false);

        $stat_camp_params = [
            'camp_id'          => $newCampId,
            'user_id'          => Yii::app()->session['userModel']['id'],
            'views'           => $views,
            'clicks'             => $clicks,
            'ctr'      => $ctr,
            'cpm'          => $cpm,
            'costs'          => $profit,
            'date'       => $_POST['start_date'],
        ];
        //$this->db->insert('stat_camps', $stat_camp_params);
        $statCamps = new StatCamps;
        $statCamps->attributes = $stat_camp_params;
        $statCamps->save(false);

        Yii::app()->user->setFlash('success','Report uploaded successfully.');
        $this->redirect(Yii::app()->baseUrl.'/reports/upload');

	}

    public function actionUploadreportapp()
    {
        $uploadFolder = getcwd() . '/reports/';
        $fileName = 'report.csv';
        $orig_fileName = $_FILES['report']['name'];
        move_uploaded_file($_FILES['report']['tmp_name'], $uploadFolder.$fileName);
        $result = [];
        if (($handle = fopen($uploadFolder.$fileName, 'r')) !== FALSE) {
            $index = 0;
            while (($row = fgetcsv($handle, 100000, ',')) !== FALSE) {

                if (empty($header)) {
                    $header = $row;
                } else {
                    $result[] = $row;
                }
                $index++;
            }
            fclose($handle);
        }
        
        if(!empty($result)){
            $camp = array_map('trim', explode('_', $result[0][2]));
            array_pop($result);
            // echo '<pre>';print_r($camp);
            // print_r($result);
            // exit;
            $camp_params = [
                'user_id'          => Yii::app()->session['userModel']['id'],
                'isolated'         => 1,
                'status'           => 1,
                'name'             =>'Campaign - '.$camp[0],
                'type' =>   $_POST['type'],
                'theme' => 'auto_moto',
                'allowed_site_themes' => 'auto_moto,business_finance,house_family,health_fitness,games,career_work,cinema,beauty_cosmetics,cookery,fashion_clothes,music,the_property,news,society,entertainment,sport,science,goods,tourism,adult,other',
                // 'start_date' => date('Y-m-d', strtotime($date[0])),
                // 'end_date' => date('Y-m-d', strtotime($date[1])),
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'days' => '1,2,3,4,5,6,7',
                'hours' => '00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23',
                'geos' => 'AF,AX,AL,DZ,AS,AD,AO,AI,AQ,AG,AR,AM,AW,AU,AT,AZ,BS,BH,BD,BB,BY,BE,BZ,BJ,BM,BT,BO,BQ,BA,BW,BV,BR,IO,BN,BG,BF,BI,KH,CM,CA,CV,KY,CF,TD,CL,CN,CX,CC,CO,KM,CG,CD,CK,CR,CI,HR,CU,CW,CY,CZ,DK,DJ,DM,DO,EC,EG,SV,GQ,ER,EE,ET,FK,FO,FJ,FI,FR,GF,PF,TF,GA,GM,GE,DE,GH,GI,GR,GL,GD,GP,GU,GT,GG,GN,GW,GY,HT,HM,VA,HN,HK,HU,IS,IN,ID,IR,IQ,IE,IM,IL,IT,JM,JP,JE,JO,KZ,KE,KI,KP,KR,KW,KG,LA,LV,LB,LS,LR,LY,LI,LT,LU,MO,MK,MG,MW,MY,MV,ML,MT,MH,MQ,MR,MU,YT,MX,FM,MD,MC,MN,ME,MS,MA,MZ,MM,NA,NR,NP,NL,NC,NZ,NI,NE,NG,NU,NF,MP,NO,OM,PK,PW,PS,PA,PG,PY,PE,PH,PN,PL,PT,PR,QA,RE,RO,RU,RW,BL,SH,KN,LC,MF,PM,VC,WS,SM,ST,SA,SN,RS,SC,SL,SG,SX,SK,SI,SB,SO,ZA,GS,SS,ES,LK,SD,SR,SJ,SZ,SE,CH,SY,TW,TJ,TZ,TH,TL,TG,TK,TO,TT,TN,TR,TM,TC,TV,UG,UA,AE,GB,US,UM,UY,UZ,VU,VE,VN,VG,VI,WF,EH,YE,ZM,ZW',
                'devs' => 'Computer,Tablet,Mobile',
                'platforms' => 'Windows_10,Windows_8_1,Windows_8,Windows_7,Windows_Vista,Windows_XP,Mac_OS,Ubuntu,Linux,unknown_desktop_os,iOS,Android,Windows_Phone,Symbian,Black_Berry,Windows_Mobile,unknown_mobile_os',
                'browsers' => 'Chrome_d,Firefox_d,Opera_d,IE_d,Edge_d,Maxthon_d,Safari_d,unknown_desktop_browser,Chrome_m,Android_m,Opera_m,Dolphin_m,Firefox_m,UCBrowser_m,Puffin_m,Safari_m,Edge_m,IE_m,unknown_mobile_browser',
                'updated_at' => gmdate('Y-m-d H:i:s'),
                'created_at' => gmdate('Y-m-d H:i:s'),
            ];
            
            $camps = new Camps;
            $camps->attributes = $camp_params;
            $camps->save(false);

            $newCampId = $camps->id;

            foreach ($result as $value) {
                $camp = array_map('trim', explode('_', $value[2]));
                //$site = $userdata = $this->Settings2->getSite(['domain'=>$value[0]],'sites');
                $site = Sites::model()->find('domain=:domain',array(':domain'=>$value[1]));

                if(!$site){
                    $siteData = [
                        'domain'      => $value[1],
                        'status'   => 1,
                        'user_id'   => Yii::app()->session['userModel']['id'],
                        'theme'   => '',
                        'stat_url'   => '',
                        'allowed_camp_themes'=> '',
                        'created_at'=> gmdate('Y-m-d H:i:s'),
                        'updated_at'=> gmdate('Y-m-d H:i:s'),
                        'isolated' => 2,
                    ];
                    $site = new Sites;
                    $site->attributes = $siteData;
                    $site->save(false);
                    //$site = $this->Settings2->addSite($value,'sites');
                } 
                $unit_params = [
                    'hash_id'          => 'b' . md5(uniqid('', true)),
                    'user_id'          => $site->user_id,
                    'site_id'          => $site->site_id,
                    'name'             => 'Ad Unit',
                    'status'           => 1,
                    'type'             => 'App '.@$camp[2],
                    'banner_size'      => 'test',
                    'min_cpc'          => 0.01,
                    'min_cpv'          => 1.00,
                    'params'           => json_encode([]),
                    'allowed_payments' => 'cpc,cpv',
                    'created_at'       => $_POST['start_date'],
                ];
                $adUnits = new Adunits;
                $adUnits->attributes = $unit_params;
                $adUnits->save(false);
                //$this->db->insert('adunits', $unit_params);
                

                $addUnitId = $adUnits->unit_id;//$this->db->insert_id();
                $dateApp = explode('/', $value[0]);
                if(count($dateApp) > 1){
                    $unit_state_params = [
                        'unit_id'          => $addUnitId,
                        'user_id'          => $site->user_id,
                        'site_id'          => $site->site_id,
                        'ad_requests'      => str_replace(',', '', $value[3]),
                        'matched_requests'      => str_replace(',', '', $value[4]),
                        'views'           => str_replace(',', '', $value[15]),
                        'clicks'             => str_replace(',', '', $value[6]),
                        'ctr'      => str_replace('%', '', $value[8]),
                        'cpm'          => str_replace('US$', '', $value[16]),
                        'profit'          => str_replace('US$', '', $value[14]),
                        //'date'       => isset($dateApp[2])?($dateApp[2].'-'.$dateApp[0].'-'.$dateApp[1]):$value[0],
                        'date'       => isset($dateApp[2])?($dateApp[2].'-'.$dateApp[1].'-'.$dateApp[0]):$value[0],
                    ];

                    $statAdunits = new StatAdunits;
                    $statAdunits->attributes = $unit_state_params;
                    $statAdunits->save(false);    
                }
                //$this->db->insert('stat_adunits', $unit_state_params);
            }
        }


        //$query = $this->db->query('SELECT site_id,user_id,u.subrole,SUM(`views`) as views,SUM(clicks) as clicks,SUM(ctr) as ctr,SUM(cpm) as cpm,SUM(profit) as profit,COUNT(*) AS CNT FROM stat_adunits sa JOIN users u ON u.id = sa.user_id GROUP BY site_id');
        
        // $sql = 'SELECT site_id,user_id,u.subrole,SUM(`views`) as views,SUM(clicks) as clicks,SUM(ctr) as ctr,SUM(cpm) as cpm,SUM(profit) as profit,COUNT(*) AS CNT FROM stat_adunits sa JOIN users u ON u.id = sa.user_id GROUP BY site_id';
        // $query = Yii::app()->db->createCommand($sql)->queryAll();
        // $views = 0;
        // $clicks = 0;
        // $ctr = 0;
        // $cpm = 0;
        // $profit = 0;
        // foreach ($query as $row){
        //     if($row['subrole']=='webmaster'){
        //         $stat_webmaster_params = [
        //             'user_id'          => $row['user_id'],
        //             'views'           => $row['views'],
        //             'clicks'             => $row['clicks'],
        //             'ctr'      => $row['ctr'],
        //             'cpm'          => $row['cpm'],
        //             'profit'          => $row['profit'],
        //             'date'       => $dateApp[2].'-'.$dateApp[0].'-'.$dateApp[1],
        //         ];
        //         //$this->db->insert('stat_webmasters', $stat_webmaster_params);    
        //         $statWebmasters = new StatWebmasters;
        //         $statWebmasters->attributes = $stat_webmaster_params;
        //         $statWebmasters->save(false);
        //     }
        //     $stat_sites_params = [
        //         'user_id'          => $row['user_id'],
        //         'site_id'          => $row['site_id'],
        //         'views'           => $row['views'],
        //         'clicks'             => $row['clicks'],
        //         'ctr'      => $row['ctr'],
        //         'cpm'          => $row['cpm'],
        //         'profit'          => $row['profit'],
        //         'date'       => $_POST['start_date'],
        //     ];
        //     $views = $views + $row['views'];
        //     $clicks = $clicks + $row['clicks'];
        //     $ctr = $ctr + $row['ctr'];
        //     $cpm = $cpm + $row['cpm'];
        //     $profit = $profit + $row['profit'];
        //     //$this->db->insert('stat_sites', $stat_sites_params);
        //     $statSites = new StatSites;
        //     $statSites->attributes = $stat_sites_params;
        //     $statSites->save(false);
        // }

        // //stat_advertisers
        // // $query = $this->db->query('SELECT site_id,SUM(`views`) as views,SUM(clicks) as clicks,SUM(ctr) as ctr,SUM(cpm) as cpm,SUM(profit) as profit,COUNT(*) AS CNT FROM stat_adunits GROUP BY user_id');
        // //foreach ($query->result_array() as $row){
        // $stat_user_params = [
        //     'user_id'          => Yii::app()->session['userModel']['id'],
        //     'views'           => $views,
        //     'clicks'             => $clicks,
        //     'ctr'      => $ctr,
        //     'cpm'          => $cpm,
        //     'costs'          => $profit,
        //     'date'       => $_POST['start_date'],
        // ];
        // //$this->db->insert('stat_advertisers', $stat_user_params);
        // $statAdvertisers = new StatAdvertisers;
        // $statAdvertisers->attributes = $stat_user_params;
        // $statAdvertisers->save(false);

        // $stat_camp_params = [
        //     'camp_id'          => $newCampId,
        //     'user_id'          => Yii::app()->session['userModel']['id'],
        //     'views'           => $views,
        //     'clicks'             => $clicks,
        //     'ctr'      => $ctr,
        //     'cpm'          => $cpm,
        //     'costs'          => $profit,
        //     'date'       => $_POST['start_date'],
        // ];
        // //$this->db->insert('stat_camps', $stat_camp_params);
        // $statCamps = new StatCamps;
        // $statCamps->attributes = $stat_camp_params;
        // $statCamps->save(false);
        //Yii::app()->db->createCommand("DELETE FROM stat_adunits WHERE date = '0000-00-00'")->queryRow();
        Yii::app()->user->setFlash('success','Report uploaded successfully.');
        $this->redirect(Yii::app()->baseUrl.'/reports/upload');

    }

    public function actionDeletereport(){
        //Yii::app()->db->createCommand("DELETE FROM stat_adunits WHERE `date` = '{$_POST['report_date']}'")->queryRow();
        StatAdunits::model()->deleteAll('date=:da',array(':da'=>$_POST['report_date']));
        Yii::app()->user->setFlash('success','Datewise Report deleted successfully.');
        $this->redirect(Yii::app()->baseUrl.'/reports/upload');
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