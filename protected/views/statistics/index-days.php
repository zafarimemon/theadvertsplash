<?php $userModel = Yii::app()->session->get('userModel');//print_r($userModel);exit;?>
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Statistics</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Statistics</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
            	<div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Filters</h4>
                        <div class="button-items">
                        	<!-- <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                <button type="button" class="active btn btn-primary waves-effect waves-light">
	                                <i class="bx bx-smile font-size-16 align-middle me-2"></i> By Ads
	                            </button>
                                <button type="button" class="btn btn-success waves-effect waves-light">
	                                <i class="bx bx-check-double font-size-16 align-middle me-2"></i> By Campaigns
	                            </button>
                                <button type="button" class="active btn btn-warning waves-effect waves-light">
	                                <i class="bx bx-error font-size-16 align-middle me-2"></i> By Ads
	                            </button>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control col-md-2" name="daterange" value="01/01/2018 - 01/15/2018" />
                            </div> -->
                            <div class="col-md-12">

                            <div class="btn-group">
                                <?php echo $filter?>
                            </div>

                            <!-- <button type="button" class="btn btn-default" id="reportrange" style="margin-left: 20px;">
                                <span><i class="fa fa-fw fa-calendar"></i> 2022/01/06 — 2022/01/06</span>
                                <i class="fa fa-fw fa-caret-down"></i>
                            </button> -->
                            <form method="GET" action="" style="display: contents;" id="formStatistic">
                                <div class="btn-group col-md-3">
                                    <input type="text" class=" btn form-control col-md-4" name="daterange" value="<?php echo $daterange?>" style="border:1px solid" />
                                    <input type="hidden" name="type" value="<?php echo @$type?>">
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">Filter</button>
                            </form>

                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Statistics By <?php echo ucwords($type)?></h4>
                        <!-- <p class="card-title-desc">
                            Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive</code>
                            to make them scroll horizontally on small devices (under 768px).
                        </p> -->

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped" id="dataTables">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Views</th>
                                        <th>Clicks</th>
                                        <th>Ad Requests</th>
                                        <th>CTR</th>
                                        <th>CPM</th>
                                        <th>REVENUE</th>
                                        <!-- <th>Status</th> -->
                                        
                                        <!-- <th>Ad topics</th> -->
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $viewsTotal = $clicks = $ctr = $cpm = $ad_requests = $profit = 0;if($stats){foreach($stats as $stat): ?>
                                        <?php $profitRow = ($stat['profit']-(($stat['profit']*$userModel['percentage'])/100))?>
                                        <tr>
                                            <td><?php echo date('d M, o',strtotime($stat['date']))?></td>
                                            <td><?php echo $stat['views']?></td>
                                            <?php $viewsTotal = $viewsTotal + $stat['views'];?>
                                            <td><?php echo $stat['clicks']?></td>
                                            <?php $clicks = $clicks + $stat['clicks'];?>
                                            <td><?php echo $stat['ad_requests']?></td>
                                            <?php $ad_requests = $ad_requests + $stat['ad_requests'];?>
                                            <td><?php echo number_format((float)$stat['ctr'], 2, '.', '')?></td>
                                            <?php $ctr = $ctr + number_format((float)$stat['ctr'], 2, '.', '');?>


                                            <?php //$cpmState = number_format((float)$stat['cpm'], 2, '.', '')?>
                                            <?php $views = ($stat['views']==0)?1:$stat['views'];?>
                                            <?php $cpmState = ((1000*$profitRow)/$views)?>
                                            <td><?php echo number_format($cpmState,2,'.','')?></td>
                                            <?php $cpm = $cpm + number_format($cpmState,2,'.','');?>

                                            <td><?php echo $profitRow//($stat['profit']-(($stat['profit']*$userModel['percentage'])/100))?></td>
                                            <?php $profit = $profit + $profitRow//($stat['profit']-(($stat['profit']*$userModel['percentage'])/100));?>
                                        </tr>
                                    <?php endforeach; }?>
                                </tbody>
                                <tr style="font-weight: bold">
                                    <td >Total</td>
                                    <th><?php echo number_format($viewsTotal,'2','.','')?></th>
                                    <th><?php echo number_format($clicks,'2','.','')?></th>
                                    <th><?php echo number_format($ad_requests,'2','.','')?></th>
                                    <th><?php echo number_format($ctr,'2','.','')?></th>
                                    <th><?php echo number_format($cpm,'2','.','')?></th>
                                    <th><?php echo number_format($profit,'2','.','')?></th>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>	