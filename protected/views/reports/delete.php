<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Settings</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                                            <li class="breadcrumb-item active">Delete Report</li>
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
                                        <form method="POST" action="<?php echo Yii::app()->baseUrl?>/reports/deletereport">
                                        <h4 class="card-title">Settings - Delete Report</h4>
                                        
                                        <div class="mb-3 row">
                                            <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="date" value="<?php echo date('Y-m-d')?>"
                                                    id="example-date-input" name="report_date">
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3 row">
                                            <label for="example-month-input" class="col-md-2 col-form-label">Month</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="month" value="2019-08"
                                                    id="example-month-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-week-input" class="col-md-2 col-form-label">Week</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="week" value="2019-W33"
                                                    id="example-week-input">
                                            </div>
                                        </div> -->
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