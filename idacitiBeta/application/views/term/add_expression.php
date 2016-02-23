	<?php
		$folder =   dirname(dirname(__FILE__));
		require_once $folder."/commun/navbar.php";
	 ?>
	<div class="page-container row-fluid">
	  <?php require_once $folder."/commun/main-menu.php";?>
		<div class="page-content">
		  <div class="clearfix"></div>
		  
			<div class="content">
					
				<div class="row custom-pro-row">	
							
					<div class="col-md-12 col-sm-12 project-custom-panel">
						<div class="row project-custom-panel-head">
							<div class="col-md-4  col-sm-4 ">
								<h1>Term Expression Builder (Standard)</h1>	
							</div>
							<div class="col-md-8  col-sm-8">
								<div class="pull-right">
									<a href="#" class="btn custom-btn">Save & Return</a>	
									<a href="#" class="btn custom-btn">Cancel & Return</a>	
								</div>
							</div>	
						</div>	
						<div class="row pro-custom-padd-2">
							<div class="container">
								<div class="col-md-6 col-sm-12 row pro-custom-width-1">
									<form class="project-custom-form-1">
										<div class="row custom-form-row">
											<label for="" class="col-md-4  control-label">Term Name:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="term_name_standard" placeholder="Acquisition">
											</div>	
										</div>
										<div class="row custom-form-row">
											<label for="" class="col-md-4  control-label">Term Code:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="term_code_standard" placeholder="999910">
											</div>	
										</div>
										<div class="row custom-form-row">
											<label for="" class="col-md-4 control-label">Decision Category:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="decision_category_standard" placeholder="Busniess Acquisition -> Investing">
											</div>	
										</div>	
										<div class="row custom-form-row">
											<label for="" class="col-md-4 control-label">Financial Statement:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="financial_statement_standard" placeholder="Busniess Acquisition Footnote -> Investment">
											</div>	
										</div>	
									</form>	
								</div>
								<div class="col-md-6 col-sm-12 pro-custom-padd-1">
									<textarea class="form-control custom-form-control-1" rows="7" 
									placeholder="Fair Value at acquisition-date of the assets transferred by the acquirer, liabilities incurred by the" name="description_standard" ></textarea>		
								</div>	
							</div>
						</div>
						
					</div>	

					<div class="col-md-12 col-sm-12 project-custom-panel">
						<div class="row project-custom-panel-head">
							<div class="col-md-4  col-sm-4 ">
								<h1>Term Expression Builder (Industry Specific)</h1>	
							</div>
							<div class="col-md-8  col-sm-8">
								<div class="pull-right">
									<a href="#" class="btn custom-btn">Save & Return</a>	
									<a href="#" class="btn custom-btn">Cancel & Return</a>	
								</div>
							</div>	
						</div>	
						<div class="row pro-custom-padd-2">
							<div class="container">
								<div class="col-md-6 col-sm-12 row pro-custom-width-1">
									<form class="project-custom-form-1">
										<div class="row custom-form-row">
											<label for="" class="col-md-4  control-label">Term Name:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="term_name_specific" placeholder="Acquisition">
											</div>	
										</div>
										<div class="row custom-form-row">
											<label for="" class="col-md-4  control-label">Term Code:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="term_code_specific" placeholder="999910">
											</div>	
										</div>
										<div class="row custom-form-row">
											<label for="" class="col-md-4 control-label">Decision Category:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="decision_category_specific" placeholder="Busniess Acquisition -> Investing">
											</div>	
										</div>	
										<div class="row custom-form-row">
											<label for="" class="col-md-4 control-label">Financial Statement:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="financial_statement_specific" placeholder="Busniess Acquisition Footnote -> Investment">
											</div>	
										</div>	
										<div class="row custom-form-row">
											<label for="" class="col-md-4 control-label">Industry:</label>
											<div class="col-md-8">
												<input type="text" class="form-control" id="" name="industry_specific" placeholder="Manufacturing -> Investment & Related Products">
											</div>	
										</div>	
										<div class="row custom-form-row">
											<div for="" class="col-md-4"></div>
											<div class="col-md-8">
												<a href="#" class="btn btn-block custom-btn-green">Add + Another Industry</a>	
											</div>	
										</div>		
									</form>	
								</div>
								<div class="col-md-6 col-sm-12 pro-custom-padd-1">
									<textarea class="form-control custom-form-control-1" rows="7" 
									placeholder="Fair Value at acquisition-date of the assets transferred by the acquirer, liabilities incurred by the" name="description_specific"></textarea>		
								</div>	
							</div>
						</div>
						
					</div>	
									
								
					
			</div>
				  </div>
				  
				  <div class="col-md-4 col-sm-6">
					<div class="row">

					</div>
					<div class="row">


					</div>

					<div class="row">
					  <!-- BEGIN Latest Sec -->
					  <div class="col-md-12 m-b-20">
						<div class="widget-item narrow-margin">
						  <!-- start feedwind code -->


						 



						  <!-- end feedwind code -->
						</div>
					  </div>
					  <!-- END Latest Sec -->
					</div>
				  </div>

			  </div>
			