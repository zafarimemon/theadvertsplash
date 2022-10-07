<?php

class ApiController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionAuthenticate()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$user = Users::model()->find('(email = :email OR username = :email) AND password = :password AND status = 1',array(':email'=>$_POST['email'],':password'=>$this->superhash($_POST['password'])));
		if($user){
			if($user->subrole=='administrator'){
				$user->percentage = 0;
			} else{
				$user->percentage = $user->percentage;
			}
			$userModel = array();
			$userModel = $user->attributes;
			$userModel['parent_user_type'] = $user->role;
			$userModel['user_type'] = $user->subrole;
			Yii::app()->session->add('userModel',$userModel);
			echo json_encode(array('success'=>1,'message'=>'Logged in successfully.','data'=>$userModel));
		} else{
			echo json_encode(array('error'=>1,'message'=>'Invalid email address or password.'));
		}		
	}

	public function actionAdminlogin($id)
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$user = Users::model()->findByPk($id);
		if($user){
			$userModel = array();
			$userModel = $user->attributes;
			$userModel['parent_user_type'] = $user->role;
			$userModel['user_type'] = $user->subrole;
			Yii::app()->session->add('userModel',$userModel);
			Yii::app()->user->setFlash('success','You are connected as webmaster.');
		} else{
			Yii::app()->user->setFlash('danger','User not found.');
		}		
		$this->redirect(Yii::app()->baseUrl.'/dashboard');
	}

	public function actionGetplots(){
		$plots = Plots::model()->findAll('plot_number LIKE :key OR block_number LIKE :key',array(':key'=>"%".$_POST['keyword']."%"));
		$transactions = CustomerPlotTransactions::model()->find('transaction_number LIKE :key AND status = 1',array(':key'=>"%".$_POST['keyword']."%"));
		$result = [];
		$tableData = '';
		if($plots){
			foreach($plots as $index => $plot){
				$result[] = $plot->attributes;
				$tableData .= '<tr>';
				//$tableData .= '<td>'.($index + 1).'</td>';
				$tableData .= '<td><a href="'.Yii::app()->baseUrl.'/plot/view/'.$plot->id.'">'.$plot->block_number.'</a></td>';
				$tableData .= '<td>'.$plot->plot_number.'</td>';
				$tableData .= '<td>'.$plot->size->size.'</td>';
				$tableData .= '<td>'.$plot->category->name.'</td>';
				switch ($plot->status) {
					case 0:
						$tableData .= '<td><span class="label label-success">Available</span>&nbsp;<a href="'.Yii::app()->baseUrl.'/plot/view/'.$plot->id.'"><span class="aLink label label-info">View</span></a></td>';
						break;
					case 1:
						$tableData .= '<td><span class="label label-danger">Booked</span>&nbsp;<a href="'.Yii::app()->baseUrl.'/plot/view/'.$plot->id.'"><span class="aLink label label-info">View</span></a></td>';
						break;
					case 3:
						$tableData .= '<td><span class="label label-primary">Transffered</span>&nbsp;<a href="'.Yii::app()->baseUrl.'/plot/view/'.$plot->id.'"><span class="aLink label label-info">View</span></a></td>';
						break;
					default:
						# code...
						break;
				}
				$tableData .= '</tr>';
			}
			$result['table'] = $tableData;
			$result['type'] = 'plots';
		} 
		if($transactions){
			//foreach($transactions as $index => $transaction){
			$trans = $transactions->transaction_number;
				$sum = Yii::app()->db->createCommand()
			    ->select('SUM(amount) as total')
			    ->from('customer_plot_transactions u')
			    ->where('transaction_number=:transaction_number AND status = 1', array(':transaction_number'=>$trans))
			    ->queryRow();
				$result[] = $transactions->attributes;
				$tableData .= '<tr>';
				$tableData .= '<td>'.(($this->startsWith($transactions->transaction_number, '#'))?$transactions->transaction_number:'#'.$transactions->transaction_number).'</td>';
				$tableData .= '<td><a href="'.Yii::app()->baseUrl.'/booking/viewbooking/'.$transactions->plot_id.'">'.$transactions->plot->plot->block_number.' / '.$transactions->plot->plot->plot_number.'</a></td>';
				$tableData .= '<td> Rs. '.number_format(@$sum['total']).'</td>';
				$tableData .= '<td>'.$transactions->transaction_type.'</td>';
				$tableData .= '<td>'.date('d M,o',strtotime($transactions->createdOn)).'</td>';
				$tr = ($this->removeWith($transactions->transaction_number, '#'))?ltrim($transactions->transaction_number,'#'):$transactions->transaction_number;
				$tableData .= '<td><a target="_blank" href="'.Yii::app()->baseUrl.'/booking/dublicateinvoice/plot/'.$transactions->plot_id.'/transaction/'.$tr.'"><span class="aLink label label-info">Print</span></a></td>';
				$tableData .= '</tr>';
			//}
			$result['table'] = $tableData;
			$result['type'] = 'transaction';
		}

		// } else{
		// 	$result['table'] = '<tr><td colspan="6"><center>No data found.</center></td></tr>';
		// 	$result['type'] = 'plots';
		// }
		echo json_encode(array('success'=>1,'data'=>$result));
	}

	public function actionGetplotdetail($type,$id){
		
		if($type == 'plot'){
			$plot = Plots::model()->findByPk($id);
			$result = [];
			if($plot){
				$result = $plot->attributes;
				$result['category'] = $plot->category->attributes;
				$result['size'] = $plot->size->attributes;
				if($plot->size->paymentModes){
					foreach($plot->size->paymentModes as $pm){
						$result['PaymentModes'][] = $pm->attributes;		
					}
				}
			}	
		}

		if($type=='block'){
			$plots = Plots::model()->findAll('block_number = :block AND status = 0',array(':block'=>$id));
			$result = '<option value="">Select plot #</option>';
			if($plots){
				foreach($plots as $plot){
					$result .= '<option value="'.$plot->id.'">'.$plot->plot_number.'</option>';
				}
			}
		}
		
		echo json_encode(array('success'=>1,'data'=>$result));	
	}

	public function actionGetsizepaymentdetail($id){
		$size = PaymentModes::model()->findByPk($id);
		$result = [];
		if($size){
			$result = $size->attributes;
		}
		echo json_encode(array('success'=>1,'data'=>$result));	
	}



	public function Getplotamountsafter3steps($booking){
		$booking = CustomerPlots::model()->findByPk($booking->id);
		return $booking->customerPlotTransactionSumWithout3;

	}


	public function actionGetcancelleddetail($id){
		$data = array();
		$booking = CustomerPlots::model()->findByPk($id);
		$plotTotal = $this->plotTotal($booking->plot->id,false);
		$plotBookingSum = $booking->customerPlotTransactionSum;
		$plotTotalPercentage = $this->percentage($plotTotal,30,0);
		$data['total'] = $plotTotal;
		$data['plotBookingSum'] = $plotBookingSum;
		$data['plotTotalPercentage'] = $plotTotalPercentage; 
		if($plotBookingSum >= $plotTotalPercentage){
			$data['almirajPercentage'] = $this->percentage($plotTotal,5,0);
			$data['remainingAmount'] = $this->Getplotamountsafter3steps($booking);
			$data['cancelReturn'] = 1;
		} else{
			$data['cancelReturn'] = 0;
		}
		
		print_r($data);
	}

	public function actionDelete($type,$id){
		if($type == 'plot'){
			$plot = Plots::model()->findByPk($id);
			if($plot->customerPlots){
				foreach($plot->customerPlots as $cp):
					if($cp->customerPlotTransactions){
						foreach($cp->customerPlotTransactions as $cpt):
							$cpt->delete();
						endforeach;
					}
					$cp->delete();
					$cp->customer->delete();
				endforeach;	
			}
			$plot->delete();
		}

		if($type == 'booking'){
			$CPlot = CustomerPlots::model()->findByPk($id);
			if($CPlot){
				//CustomerPlotTransactions::model()->deleteAll('plot_id = :id',array(':id'=>$CPlot->id));
				//CustomerPlots::model()->deleteAll('id = :id',array(':id'=>$CPlot->id));
				//Customers::model()->deleteAll('id = :id',array(':id'=>$CPlot->customer_id));
				$CPlot->status = 0;
				$CPlot->save();
				$plot = Plots::model()->findByPk($CPlot->plot_id);
				$plot->status = 0;
				$plot->save(false);	
			}
			
			
		}

		if($type == 'letter'){
			$CPlot = ReminderLetters::model()->findByPk($id);
			if($CPlot){
				$CPlot->delete();			
			}
			
			
		}

		echo json_encode(array('success'=>1,'message'=>'delete successfully.'));		

	}


	public function actionReminder_sms(){
		$CPlots = CustomerPlots::model()->findAll('status = 1');
		//$CPlots = CustomerPlots::model()->findAll('id = 297');
		foreach ($CPlots as $plot) {
			$cpTrans = CustomerPlotTransactions::model()->find('plot_id = :id AND createdOn BETWEEN DATE(NOW()) - INTERVAL 30 DAY AND DATE(NOW())',array(':id'=>$plot->id));
			if(!$cpTrans){
				if(!empty($plot->customer->mobile)){
					$plot_number = 'File No. ARC-'.$plot->plot->block_number.'-'.$plot->plot->plot_number.', Block No: '.$plot->plot->block_number.' Plot No:'.$plot->plot->plot_number;
					$msg = "Dear ".$plot->customer->name.", \nThe outstanding amount for ".$plot_number." in Ammar Royal City is due.\nKindly clear your dues without any further delays.\nIf your dues have been cleared, please ignore this message.\nThank you.\nAl Meraj Builders.";
					$this->sendSMS($plot->customer->mobile,$msg); 
					//echo $plot->id .' -> '.$msg.'<br/>';
				}
			}
			//echo $plot->id.' '.$plot->customer_id.' '.$plot->customer->name.' '.$plot->customer->mobile.'<br/>';

		}

	}


	public function backup_tables($host,$user,$pass,$name,$tables = '*'){
		
		if ($tables == '*') {
	        $tables = array();
	        $tables = Yii::app()->db->schema->getTableNames();
	    } else {
	        $tables = is_array($tables) ? $tables : explode(',', $tables);
	    }
	    $return = '';

	    foreach ($tables as $table) {
	        $result = Yii::app()->db->createCommand('SELECT * FROM ' . $table)->query();
	        $return.= 'DROP TABLE IF EXISTS ' . $table . ';';
	        $row2 = Yii::app()->db->createCommand('SHOW CREATE TABLE ' . $table)->queryRow();
	        $return.= "\n\n" . $row2['Create Table'] . ";\n\n";
	        foreach ($result as $row) {
	            $return.= 'INSERT INTO ' . $table . ' VALUES(';
	            foreach ($row as $data) {
	                $data = addslashes($data);

	                // Updated to preg_replace to suit PHP5.3 +
	                $data = preg_replace("/\n/", "\\n", $data);
	                if (isset($data)) {
	                    $return.= '"' . $data . '"';
	                } else {
	                    $return.= '""';
	                }
	                $return.= ',';
	            }
	            $return = substr($return, 0, strlen($return) - 1);
	            $return.= ");\n";
	        }
	        $return.="\n\n\n";
	    }
	    //save file
	    $uploadFolder = "C:\\xampp\htdocs\construction/sql/";
	    $handle = fopen($uploadFolder.'db-backup-'.date('Y-m-d').'.sql','w+');
	    fwrite($handle, $return);
	    fclose($handle);
		

	    
	    
		//Remote Drive
		
		//save file
		$days = 5;  
		// Open the directory  
		if ($handle = opendir($uploadFolder))  
		{  
		    // Loop through the directory  
		    while (false !== ($file = readdir($handle)))  
		    {  
		        // Check if the file is older than X days old  
	            if (filemtime($uploadFolder.$file) < ( time() - ( $days * 24 * 60 * 60 ) ) )  
	            {  
	                // Do the deletion  
	                @unlink($uploadFolder.$file);  
	            } 
		    }  
		} 
		

		//save file
	    $uploadFolder2 = "D:\\Softwarebackup/";
	    $handle = fopen($uploadFolder2.'db-backup-'.date('Y-m-d').'.sql','w+');
	    fwrite($handle, $return);
	    fclose($handle);

	 //    $days = 20;  
		// // Open the directory  
		// if ($handle = opendir($uploadFolder2))  
		// {  
		//     // Loop through the directory  
		//     while (false !== ($file = readdir($handle)))  
		//     {  
		//         // Check if the file is older than X days old  
	 //            if (filemtime($uploadFolder2.$file) < ( time() - ( $days * 24 * 60 * 60 ) ) )  
	 //            {  
	 //                // Do the deletion  
	 //                @unlink($uploadFolder2.$file);  
	 //            } 
		//     }  
		// } 



	    //transacton file 
	    $list = array (
	        array('Sr #','Receipt No','Client Name','Block #','Plot #','Size','Status','Total','Date','Transaction','bank','Reference Number'),
	    );
      		
      	//$bookings = CustomerPlotTransactions::model()->with('plotPaymentMode')->findAll(array('select'=>'t.* ,SUM(t.amount) as total,GROUP_CONCAT( payment_modes.mode SEPARATOR ',') as modes','group'=>'t.transaction_number','order'=>'t.transaction_number ASC'));
		$model = new CustomerPlotTransactions;
      	$bookings = $model::model()->findAllBySQL("SELECT * ,SUM(t.amount) as total,GROUP_CONCAT( DISTINCT p.mode ORDER BY p.id SEPARATOR ',') as modes FROM `customer_plot_transactions` t LEFT JOIN payment_modes p ON p.id = t.plot_payment_mode_id  GROUP BY transaction_number ORDER BY `transaction_number` ASC");
      	
        $count = 1;
        foreach($bookings as $tt):
        	$list[$count][] = @$count;
	        $list[$count][] = @$tt->transaction_number;
	        $list[$count][] = @$tt->plot->customer->name;
            $list[$count][] = @$tt->plot->plot->block_number;
	        $list[$count][] = @$tt->plot->plot->plot_number;
	        $list[$count][] = @$tt->plot->plot->size->size;
            $list[$count][] = @$tt->modes;
            $list[$count][] = 'Rs '.@$tt->total;
            $list[$count][] = date('d M,o',strtotime(@$tt->createdOn));
            $list[$count][] = $tt->transaction_type;
            $list[$count][] = ($tt->transaction_type!='cash')?$tt->bank.' - '.$tt->branch:'-';
            $list[$count][] = ($tt->transaction_type!='cash')?$tt->reference_number:'-';
			$count++;
		endforeach;

		$uploadFolder = "C:\\xampp\htdocs\construction/sql/";
	    $handle = fopen($uploadFolder.'alltransactions-'.date('Y-m-d').'.csv','w+');
		//$fp = fopen('alltransactions.csv', 'w');
      	foreach ($list as $fields) {
          fputcsv($handle, $fields);
      	}
	    fclose($handle);

	    $days = 20;  
		// Open the directory  
		if ($handle = opendir($uploadFolder2))  
		{  
		    // Loop through the directory  
		    while (false !== ($file = readdir($handle)))  
		    {  
		        // Check if the file is older than X days old  
	            if (filemtime($uploadFolder2.$file) < ( time() - ( $days * 24 * 60 * 60 ) ) )  
	            {  
	                // Do the deletion  
	                @unlink($uploadFolder2.$file);  
	            } 
		    }  
		} 

	}

	public function actionDbbackup(){
		$this->backup_tables('localhost','root','','construction');	
	}

	public function actionCustomerclone(){
		$cps = CustomerPlots::model()->findAll();
		foreach($cps as $cp){
			$customer = New Newcustomers;
			$customer->attributes = $cp->customer->attributes;
			$customer->save(false);
			$cp->customer_id = $customer->id;
			$cp->save(false);
		}
		echo 'done';
	}





	public function actionPenalty($id){
		$CPlots = CustomerPlots::model()->findByPk($id);
		$criteria = new CDbCriteria();
		$criteria->addCondition('plot_id = :plot');
		$criteria->params = array(':plot' =>$CPlots->id);
		$criteria->order = "t.createdOn DESC";
		$criteria->limit = 1;
		$cpTrans = CustomerPlotTransactions::model()->with('plotPaymentMode')->find($criteria);

		$lastPaymentMode = PaymentModes::model()->find('plot_size_id = :id AND lower(mode) = :mode AND mode != "Extra"',array(':id'=>$CPlots->plot->size->id,':mode'=>strtolower($cpTrans->plotPaymentMode->mode)));

		$var_sum = CustomerPlotTransactions::model()->findBySql('select sum(`amount`) as `total` from customer_plot_transactions WHERE plot_id = :id AND plot_payment_mode_id = :modeid', array(':id'=>$CPlots->id,':modeid'=>$cpTrans->plotPaymentMode->id));
		echo '<pre>';
		print_r($CPlots->attributes);
		print_r($cpTrans->attributes);
		print_r($cpTrans->plotPaymentMode->attributes);
		print_r($lastPaymentMode->attributes);
		$duesMonth = $this->getMonth($this->actionGetModeDueDate(@$CPlots->createdOn,strtolower(@$cpTrans->plotPaymentMode->mode)),date('Y-m-d'));
		echo 'here'.'---->'.$var_sum->total.'<br/>';
		if($lastPaymentMode->mode == 'Monthly'){
			$modeTotal = $lastPaymentMode->amount * $CPlots->monthlyMonths;
		} else{
			$modeTotal = $lastPaymentMode->amount;	
		}
		
		$modeRec = $var_sum->total;
		$modeRem = $modeTotal - $modeRec;
		$modeMonthPer = $this->Percentage($modeRem,5,0);
		$modeMonthPerRs = $modeMonthPer * $duesMonth;
		echo 'Month Dues : '.($this->getMonth($this->actionGetModeDueDate(@$CPlots->createdOn,strtolower(@$cpTrans->plotPaymentMode->mode)),date('Y-m-d')));
		echo '<br/>';
		echo 'Rem'.'---->'.$modeRem.'<br/>';
		echo 'Percentage'.'---->'.$modeMonthPer.'<br/>';
		echo 'Percentage Rs'.'---->'.$modeMonthPerRs.'<br/>';
		echo '<br/>';
		exit;
			//echo $plot->id.' '.$plot->customer_id.' '.$plot->customer->name.' '.$plot->customer->mobile.'<br/>';

		//}
	}




	public function actionPenalty2($id){
		$CPlots = CustomerPlots::model()->findByPk($id);
		$criteria = new CDbCriteria();
		$criteria->addCondition('plot_id = :plot AND plot_payment_mode_id = 31');
		$criteria->params = array(':plot' =>$CPlots->id);
		$criteria->order = "t.createdOn DESC";
		$cpTrans = CustomerPlotTransactions::model()->with('plotPaymentMode')->findAll($criteria);

		echo '<pre>';
		$dates = array();
		foreach($cpTrans as $tt):
			$dates[] = $tt->createdOn;
		endforeach;
		print_r($dates);
		print_r($CPlots->attributes);

	}

	public function getMonth($date1,$date2){
		$ts1 = strtotime($date1);
		$ts2 = strtotime($date2);

		$year1 = date('Y', $ts1);
		$year2 = date('Y', $ts2);

		$month1 = date('m', $ts1);
		$month2 = date('m', $ts2);

		$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
		return $diff;
	}

	public function actionGetModeDueDate($date,$mode){
		switch ($mode) {
			case 'booking':
				return date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "+1 months"));
				break;
			case 'allocation':
				return date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "+2 months"));
				break;
			case 'confirmation':
				return date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "+3 months"));
				break;
			case 'monthly':
				return date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "+4 months"));
				break;
			case 'demarcation':
				return date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "+43 months"));
				break;
			case 'possession':
				return date('Y-m-d',strtotime(date("Y-m-d", strtotime($date)) . "+44 months"));
				break;

			
			default:
				return '-';
				break;
		}
	}


	

}