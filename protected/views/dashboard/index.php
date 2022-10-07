<?php $userModel = Yii::app()->session->get('userModel'); ?>
<style type="text/css">
    .hide{
        display: none;
    }
</style>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <?php
                                    foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                        echo '<div class="alert alert-'.$key.' alert-dismissible fade show" role="alert"><i class="mdi mdi-check-all me-2"></i> '.$message.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                                    }
                                ?>
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <!-- <p>The Advert Splash Dashboard</p> -->
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/users/avatar.png" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate"><?php echo ucfirst(@$userModel['name']) ?></h5>
                                                <p class="text-muted mb-0 text-truncate"><?php echo ucfirst(@$userModel['subrole'])?></p>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="pt-6">

                                                    <div class="row">
                                                        <?php if($userModel['user_type'] == 'webmaster'){?>
                                                        <div class="col-4">
                                                            <h5 class="font-size-15"><?php echo Sites::model()->count('isolated != 2 AND user_id = '.@$userModel['id'])?></h5>
                                                            <p class="text-muted mb-0">Sites</p>
                                                        </div>
                                                        <div class="col-4">
                                                            <h5 class="font-size-15"><?php echo Sites::model()->count('isolated = 2 AND user_id = '.@$userModel['id'])?></h5>
                                                            <p class="text-muted mb-0">Apps</p>
                                                        </div>
                                                        <?php } else {?>
                                                        <div class="col-4">
                                                            <h5 class="font-size-15"><?php echo Sites::model()->count('isolated != 2')?></h5>
                                                            <p class="text-muted mb-0">Sites</p>
                                                        </div>

                                                        <div class="col-4">
                                                            <h5 class="font-size-15"><?php echo Sites::model()->count('isolated = 2')?></h5>
                                                            <p class="text-muted mb-0">Apps</p>
                                                        </div>
                                                        <?php }?>
                                                        <?php if($userModel['user_type']!='webmaster'){?>
                                                        <div class="col-4">
                                                            <h5 class="font-size-15"><?php echo Users::model()->count("subrole='webmaster'")?></h5>
                                                            <p class="text-muted mb-0">Webmaster</p>
                                                        </div>
                                                        <?php }?>
                                                    </div>
                                                    <!-- <div class="mt-4">
                                                        <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card hide">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Monthly Earning</h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="text-muted">This month</p>
                                                <h3><?php echo number_format(@$month_stat->profit,'2','.','')?></h3>
                                                <div class="mt-4">
                                                    <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mt-4 mt-sm-0">
                                                    <div id="radialBar-chart" class="apex-charts"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Views</p>
                                                        <h4 class="mb-0"><?php echo number_format(@$stats->views,'2','.','')??0?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-show font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Clicks</p>
                                                        <h4 class="mb-0"><?php echo number_format(@$stats->clicks,'2','.','')??0?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">CTR</p>
                                                        <h4 class="mb-0"><?php echo number_format(@$ctrTotal,'2','.','')?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Revenue</p>
                                                        <h4 class="mb-0"><?php echo number_format(@$statsTotal,'2','.','')?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-dollar font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="card hide">
                                    <div class="card-body">
                                        <div class="d-sm-flex flex-wrap">
                                            <h4 class="card-title mb-4">Email Sent</h4>
                                        </div>
                                        <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>