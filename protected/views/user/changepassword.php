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
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Users</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    	<form method="POST" action="<?php echo Yii::app()->baseUrl?>/user/savepassword">
											<div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="username" type="text" value="" required="" placeholder="Username">
	                                                <input class="form-control" name="id" type="hidden" value="<?php echo $user->id?>" required="" placeholder="Name" autofocus="">
	                                            </div>
	                                        </div>

	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Old Password</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="old_password" type="password" value="" required="" placeholder="Old Password" autofocus="">
	                                            </div>
	                                        </div>

	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">New Password</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="password" type="password" value="" required="" placeholder="New Password" autofocus="">
	                                            </div>
	                                        </div>
	                                        <div>
		                                        <button class="btn btn-primary" type="submit">Submit</button>
		                                    </div>
	                                	</form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->                     

                    </div> <!-- container-fluid -->
                </div>