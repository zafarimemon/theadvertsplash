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
                                    <h4 class="mb-sm-0 font-size-18">Settings</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                                            <li class="breadcrumb-item active">Upload Report</li>
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
                                        <form method="POST" action="<?php echo Yii::app()->baseUrl?>/reports/uploadreport" enctype="multipart/form-data">
                                            <h4 class="card-title">Settings - Upload Report</h4>
                                            <div class="mb-3 row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">File</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="report" type="file" id="formFile">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Type</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" name="type" value=""
                                                        id="example-text-input">
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3 row">
                                                <label for="example-date-input" class="col-md-2 col-form-label">Start Date</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="date" name="start_date" value="<?php echo date('Y-m-d')?>"
                                                        id="example-date-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-date-input" class="col-md-2 col-form-label">End Date</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="date" name="end_date" value="<?php echo date('Y-m-d')?>"
                                                        id="example-date-input">
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