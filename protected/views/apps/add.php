<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Mobile Applications</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Mobile Applications</li>
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
                                    	<form method="POST" action="<?php echo Yii::app()->baseUrl?>/apps/save">
											<div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">App Name</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="domain" type="text" value="" id="example-text-input" required="">
	                                            </div>
	                                        </div>
	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">App Link(Google Play /iTunes)</label>
	                                            <div class="col-md-10">
	                                                <input class="form-control" name="stat_url" type="text" value="" id="example-text-input" required="">
	                                            </div>
	                                        </div>
	                                        <?php if(Yii::app()->session->get('userModel')['user_type']!='webmaster'){?>
	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">User ID</label>
	                                            <div class="col-md-10">
	                                                <select class="form-control" name="user_id" required=""> 
	                                                	<option value="">Select User</option>
	                                                	<?php foreach($users as $user):?>
	                                                		<option value="<?php echo $user->id?>"><?php echo ucfirst($user->username.' - '.$user->email)?></option>
	                                                	<?php endforeach;?>
	                                                </select>
	                                            </div>
	                                        </div>
	                                    	<?php } else{?>
	                                    		<input class="form-control" name="user_id" type="hidden" value="<?php echo Yii::app()->session->get('userModel')['id']?>">
	                                    	<?php }?>
	                                        <div class="mb-3 row">
	                                            <label for="example-text-input" class="col-md-2 col-form-label">Site Theme</label>
	                                            <div class="col-md-10">
	                                                <select class="form-control" name="theme">
													   <option value="">Select Theme</option>
													   <option value="auto_moto">Auto / Moto</option>
													   <option value="business_finance">Business / Finance</option>
													   <option value="house_family">House / Family</option>
													   <option value="health_fitness">Health / Fitness</option>
													   <option value="games">Games</option>
													   <option value="career_work">Career / Work</option>
													   <option value="cinema">Cinema</option>
													   <option value="beauty_cosmetics">Beauty / Cosmetics</option>
													   <option value="cookery">Cookery</option>
													   <option value="fashion_clothes">Fashion / Clothes</option>
													   <option value="music">Music</option>
													   <option value="the_property">The property</option>
													   <option value="news">News</option>
													   <option value="society">Society</option>
													   <option value="entertainment">Entertainment</option>
													   <option value="sport">Sport</option>
													   <option value="science">Science</option>
													   <option value="goods">Goods</option>
													   <option value="tourism">Tourism</option>
													   <option value="adult">Adult</option>
													   <option value="other">Other</option>
													</select>
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