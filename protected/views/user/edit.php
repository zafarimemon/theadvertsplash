<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
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
                                    	<form method="POST" action="<?php echo Yii::app()->baseUrl?>/user/update">
											<div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="name" type="text" value="<?php echo $user->name?>" required="" placeholder="Name">
	                                                <input class="form-control" name="id" type="hidden" value="<?php echo $user->id?>" required="" placeholder="Name">
	                                            </div>
	                                        </div>

	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="username" type="text" value="<?php echo $user->username?>" required="" placeholder="username">
	                                            </div>
	                                        </div>

	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="email" type="text" value="<?php echo $user->email?>" required="" readonly placeholder="Email">
	                                            </div>
	                                        </div>

	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="password" type="password" value="" placeholder="Password">
	                                            </div>
	                                        </div>
	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Number</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="number" type="text" value="<?php echo $user->number?>" placeholder="Number">
	                                            </div>
	                                        </div>

	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Percentage</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="percentage" type="text" value="<?php echo ($user->percentage)?$user->percentage:0?>" placeholder="Percentage">
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