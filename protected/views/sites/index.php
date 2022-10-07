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
                    <h4 class="mb-sm-0 font-size-18">Sites</h4>

                    <?php if($userModel['user_type'] != 'webmaster'){?>  
                    <div class="page-title-right">
                        <a href="<?php echo Yii::app()->baseUrl?>/sites/add">
                            <button type="button" class="btn btn-success waves-effect waves-light btn-sm">
                                <i class="bx bx-plus font-size-8 align-middle me-2"></i> Add Site
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
                        <h4 class="card-title">All Sites</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped" id="dataTables">
                                <thead>
                                    <tr>
                                        <th>Site ID</th>
                                        <th>User</th>
                                        <th>Site</th>
                                        <th>Themes</th>
                                        <th>Status</th>
                                        
                                        <!-- <th>Ad topics</th> -->
                                        <?php if($userModel['user_type'] != 'webmaster'){?>  
                                        <th>Actions</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sites as $site):?>
                                        <tr>
                                            <td><?php echo $site->site_id?></td>
                                            <td><?php echo ($site->user->name)?$site->user->name:$site->user->username?></td>
                                            <td><?php echo $site->domain?></td>
                                            <td><?php echo $site->theme?></td>
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
                                                        <a class="dropdown-item" href="#">Disabled</a>
                                                        <a class="dropdown-item" href="<?php echo Yii::app()->baseUrl?>/sites/edit/<?php echo $site->site_id?>">Edit</a>
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