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
                    <h4 class="mb-sm-0 font-size-18">Users</h4>

                    <div class="page-title-right">
                        <a href="<?php echo Yii::app()->baseUrl?>/user/add">
                            <button type="button" class="btn btn-success waves-effect waves-light btn-sm">
                                <i class="bx bx-plus font-size-8 align-middle me-2"></i> Add User
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All User</h4>

                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-striped" id="dataTables">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Total Sites/Apps</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user):?>
                                        <tr>
                                            <td><?php echo $user->name?></td>
                                            <td><?php echo $user->email?></td>
                                            <td><?php echo $user->totalSite?></td>
                                            <?php if($user->status){?>
                                                <td><a href="javascript: void(0);" class="badge bg-success font-size-11 m-1">Active</a></td>
                                            <?php } else{ ?>
                                                <td><a href="javascript: void(0);" class="badge bg-danger font-size-11 m-1">Deactivated</a></td>
                                            <?php } ?>
                                            <!-- <td>Ad topics</td> -->
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupVerticalDrop1" type="button" class="btn-sm btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                                        <a class="dropdown-item" href="<?php echo Yii::app()->baseUrl?>/user/edit/<?php echo $user->id?>">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo Yii::app()->baseUrl?>/api/adminlogin/<?php echo $user->id?>">Admin Login</a>
                                                    </div>
                                                </div>
                                            </td>
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