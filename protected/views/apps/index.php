<?php $userModel = Yii::app()->session->get('userModel'); ?>
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
                    <h4 class="mb-sm-0 font-size-18">Apps</h4>
                    <?php if($userModel['user_type'] != 'webmaster'){?>    
                    <div class="page-title-right">
                        <a href="<?php echo Yii::app()->baseUrl?>/apps/add">
                            <button type="button" class="btn btn-success waves-effect waves-light btn-sm">
                                <i class="bx bx-plus font-size-8 align-middle me-2"></i> Add App
                            </button>
                        </a>
                        <button type="button" class="btn btn-warning waves-effect waves-light btn-sm">
                            <i class="bx bx-download font-size-8 align-middle me-2"></i> Download
                        </button>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Apps</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped" id="dataTables">
                                <thead>
                                    <tr>
                                        <th>App Name</th>
                                        <th>User</th>
                                        <th>App Link</th>
                                        <th>Status</th>
                                        <?php if($userModel['user_type'] != 'webmaster'){?>
                                        <th>Actions</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sites as $site):?>
                                        <tr>
                                            <td><?php echo @$site->domain?></td>
                                            <td><?php echo (@$site->user->name)?@$site->user->name:@$site->user->username?></td>
                                            <td><a target="_blank" href="<?php echo $site->stat_url?>">App Link</a></td>
                                            <?php if($site->status){?>
                                                <td><a href="javascript: void(0);" class="badge bg-success font-size-11 m-1">Active</a></td>
                                            <?php } else{ ?>
                                                <td><a href="javascript: void(0);" class="badge bg-danger font-size-11 m-1">Stopped</a></td>
                                            <?php } ?>
                                            <!-- <td>Ad topics</td> -->
                                            <?php if($userModel['user_type'] != 'webmaster'){?>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupVerticalDrop1" type="button" class="btn-sm btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                                        <a class="dropdown-item" href="<?php echo Yii::app()->baseUrl?>/apps/edit/<?php echo $site->site_id?>">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo Yii::app()->baseUrl?>/apps/removeuser/<?php echo $site->site_id?>">Remove User</a>
                                                        <a class="dropdown-item" href="<?php echo Yii::app()->baseUrl?>/apps/removeapp/<?php echo $site->site_id?>">Update App Status</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php }?>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>