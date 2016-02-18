	<?php
		$folder =   dirname(dirname(__FILE__));
		require_once $folder."/commun/navbar.php";
	 ?>
	<div class="page-container row-fluid">
	  <?php require_once $folder."/commun/main-menu.php";?>
		<div class="page-content">
		  <div class="clearfix"></div>
		  
			<div class="content">
					
				<div class="col-md-3 col-sm-12 itacidi-new-left-panel">
				
				<div id="inner-content-div"> 	

					<div class="col-md-12  col-sm-12">
						<form>	
							<div class="form-group cutom-form-group">
								<input type="text" class="form-control" id="term_rules_filter" placeholder="Filter">	
							</div>
						</form>	
					</div>	
					
					<div class="col-md-12  col-sm-12 itacidi-new-left-panel-radio">
						<div class="col-md-8 col-sm-10 itacidi-new-left-panel-radio-custom-ww">	
							<div class="radio" id="term_rules_radio">
									<input type="radio" value="flat" name="term_rules" class="term_rules_radio" id="group1" checked="checked" >
									<label for="group1">Flat List</label>
									<input type="radio" value="decision" name="term_rules" class="term_rules_radio" id="group2" >
									<label for="group2">Decision Category</label>	
									<input type="radio" value="financial" name="term_rules" class="term_rules_radio" id="group3" >
									<label for="group3">Financial Statement</label>	
							</div>
							
							
						</div>
						<div class="col-md-4 col-sm-12 itacidi-new-left-panel-radio-custom-ww">	
							<a href="#" class="btn custom-btn">Add Term</a>	
						</div>	
					</div>	
					
					<div class="col-md-12 col-sm-12 itacidi-new-left-panel-panels">

<?php
if($term_rules == 1)
{	
?>					

<div id="term_rules_flat">

<?php
foreach($term_rules_flat as $t_r)
{
?>			
						<div class="panel panel-default filter_div">
							<div class="panel-heading term_id" id="<?php echo $t_r['termId'] ?>">			
								<i class="fa fa-chevron-right"></i>
								<?php

									echo $t_r['name']."<br>";

								?>
							</div>						
						</div>
<?php
}
?>					

</div>
					
<div id="term_rules_decision">

<?php
$desicionCheck = 1;

foreach($term_rules_decision as $t_r_d)
{
?>

	<div class="panel panel-default" data-toggle="collapse" data-target="#faqs-panel-desicion-<?php echo $desicionCheck;?>" >
		<div class="panel-heading">
			<i class="fa fa-chevron-right"></i>
			<?php echo $t_r_d[0]['decisionCategory']?>
		</div>
	</div>

	<div id="faqs-panel-desicion-<?php echo $desicionCheck;?>" class="collapse custom-left-collapse">
		<ul>

<?php

$desicionCheck++;

	foreach ($t_r_d as $t_r) 
	{
?>		
			<li class="term_id" id="<?php echo $t_r['termId'] ?>">
				<a onMouseOver="this.style.cursor='pointer'" class="term_id"><i class="fa fa-chevron-right"></i><?php echo $t_r['name'] ?></a>
			</li>

<?php
	}
?>	

		</ul>	
	</div>

<?php
}
?>

</div>

<div id="term_rules_financial">

<?php
$financialCheck = 1;

foreach($term_rules_fanancial as $t_r_f)
{
?>

	<div class="panel panel-default" data-toggle="collapse" data-target="#faqs-panel-fanancial-<?php echo $financialCheck;?>" >
		<div class="panel-heading">
			<i class="fa fa-chevron-right"></i>
			<?php echo $t_r_f[0]['financialCategory']?>
		</div>
	</div>

	<div id="faqs-panel-fanancial-<?php echo $financialCheck;?>" class="collapse custom-left-collapse">
		<ul>

<?php

$financialCheck++;

	foreach ($t_r_f as $t_r) 
	{
?>		
			<li class="term_id" id="<?php echo $t_r['termId'] ?>">
				<a onMouseOver="this.style.cursor='pointer'" ><i class="fa fa-chevron-right"></i><?php echo $t_r['name'] ?></a>
			</li>

<?php
	}
?>	

		</ul>	
	</div>

<?php
}
?>

</div>

<?php
}
else
{
?>

No Record Found!

<?php
}
?>					
						
					</div>

					</div>		
					
				</div>						
						
				<div class="col-md-9 col-sm-12 itacidi-new-right-panel full-section">					

				<div id="full-section-overlay" class="full-section-overlay" style="display:none">
				</div>

					<div class="row itacidi-new-right-panel-section-1">
						<div class="col-md-4  col-sm-4 ">
							<h1>Term Rule & Expression</h1>	
						</div>
						<div class="col-md-8  col-sm-8">
							<div class="pull-right">
								<a href="#" class="btn custom-btn">Save Term</a>	
								<a href="#" class="btn custom-btn">Remove Term</a>	
								<a href="#" class="btn custom-btn">Add Expression</a>	
							</div>
						</div>	
					</div>	
					<div class="row itacidi-new-right-panel-section-2">

						<div id="term_rule">

						<div class="col-md-6 col-sm-12 row itacidi-new-right-panel-section-4">
							<form class="itacidi-custom-form">
								<div class="form-group">
									<label for="" class="col-md-3  control-label">Term Name:</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="" placeholder="Term Name">
									</div>	
								</div>
								<div class="form-group">
									<label for="" class="col-md-3  control-label">Term Code:</label>
									<div class="col-md-9">
										<input type="text" class="form-control" id="" placeholder="Term Code" readonly >
									</div>	
								</div>
								<div class="form-group">
									<label for="" class="col-md-3  control-label">Definition:</label>
									<div class="col-md-9">
										<textarea class="form-control custom-textarea-1" rows="1"></textarea>
									</div>	
								</div>	
								<div class="form-group custom-form-group">
									<label for="" class="col-md-3 control-label">Decision Category:</label>
									<div class="col-md-9">
										<select class="form-control custom-form-control">
										</select>
									</div>	
								</div>	
								<div class="form-group custom-form-group">
									<label for="" class="col-md-3 control-label">Financial Statement:</label>
									<div class="col-md-9">
										<select class="form-control custom-form-control">
										</select>
									</div>	
								</div>	
								<div class="form-group custom-form-group">
									<label for="" class="col-md-3 control-label">Period Type:</label>
									<div class="col-md-4">
										<select class="form-control custom-form-control">
										</select>
									</div>	
									<label for="" class="col-md-1 control-label" style="padding-top:2px;">Type:</label>
									<div class="col-md-4">
										<select class="form-control custom-form-control">
										</select>
									</div>	
								</div>
								<div class="form-group custom-form-group">
									<label for="" class="col-md-3 control-label">Source:</label>
									<div class="col-md-9">
										<select class="form-control custom-form-control">
										</select>
									</div>	
								</div>	
								<div class="form-group custom-form-group">
									<label for="" class="col-md-3  control-label">Order:</label>
									<div class="col-md-5">
										<input type="text" class="form-control" id="" placeholder="Order">
									</div>	
									<div class="col-md-4">
										<div class="checkbox" style="padding-top:5px;">
											<input type="checkbox" id="custom-group1" name="optionyes" value="group1">
											<label for="custom-group1" style="white-space:nowrap;">Visiable to U?</label>	
										</div>
									</div>	
								</div>	
							</form>	
						</div>

						</div>
						
						<div class="col-md-6 col-sm-12 itacidi-new-right-panel-section-3">
							<div class="row btn-section">
								<a class="btn custom-btn" href="#">Expression</a>	
								<a class="btn custom-btn" href="#">Industry Overrides</a>	
							</div>
							<div id="term_rule_expression">	
							<div class="row table-section">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover"> 
										<thead> 
											<tr> 
												<th>Rank</th> 
												<th>Type</th> 
												<th>Experssion</th> 
												<th></th> 
											</tr> 
										</thead> 
										<tbody> 
	
										</tbody> 
									</table>		
								</div>	
							</div>
							</div>	
						</div>	
					</div>
					
					<div class="row itacidi-new-right-panel-section-1">
						<div class="col-md-12  col-sm-12">
							<h1>Coverage & Term Results</h1>	
						</div>
					</div>
					<div class="row itacidi-new-right-panel-section-2">
						<div class="col-md-12  col-sm-12 col-xs-12 row">
							<form class="itacidi-custom-form">

								<input type="hidden" id="term_id" value="" />

								<div class="form-group custom-form-group">
									<label for="" class="col-md-2 control-label" style="padding-top:5px;">Sector-> Industry:</label>
									<div class="col-md-8">
										<select class="form-control custom-form-control" id="sector_industry">
											<option value="">All</option>
										<?php
										foreach ($sector_industry as $s_i) {
										?>
											<option value="<?php echo $s_i['sector'].'->'.$s_i['industry']; ?>"><?php echo $s_i['sector'].'->'.$s_i['industry']; ?></option>
										<?php
										}
										?>
										</select>
									</div>	
									<label for="" id="companies_industry" class="col-md-2 control-label" style="padding-top:5px;"></label>
								</div>	
								<div class="form-group custom-form-group">
									<label for="" class="col-md-2 control-label">SIC:</label>
									<div class="col-md-8">
										<select class="form-control custom-form-control"  id="sic">
											<option value="">All</option>
										</select>
									</div>
									<label for="" id="companies_sic" class="col-md-2 control-label"></label>	
								</div>	
							</form>	
						</div>
						
						<div class="col-md-5 col-sm-12 itacid-piechart text-center">
						
							<div id="container" style="min-width: 100%; height: 300px; max-width: 100%; margin: 0 auto"></div>
							
							<a class="btn custom-btn-2" id="get_coverage" >Get Coverage</a>
							
						</div>
						
						<div class="col-md-7 col-sm-12 itacidi-new-right-panel-section-3 itacidi-new-right-panel-section-table-custom">
							
							<div class="btn-section-overlay" id="section-overlay">
							</div>
							
							<div class="row btn-section">
								<div class="col-md-4 col-sm-4 custom-no-padd-column">
									<a class="btn custom-btn-2" id="company_resolved" >Show Companies Resolved</a>	
								</div>
								<div class="col-md-3 col-sm-4 custom-no-padd-column">
									<form class="itacidi-custom-form-2">
										<div class="form-group custom-form-group">
											<select id="coverage_rank" class="form-control custom-form-control">
												<option value="" >Select Rank</option>
												<option value="1" >Rank 1</option>
												<option value="2" >Rank 2</option>
												<option value="3" >Rank 3</option>
												<option value="4" >Rank 4</option>
												<option value="5" >Rank 5</option>
												<option value="6" >Rank 6</option>
												<option value="7" >Rank 7</option>
												<option value="8" >Rank 8</option>
												<option value="9" >Rank 9</option>																								
											</select>
										</div>
									</form>	
								</div>	
								<div class="col-md-4 col-md-offset-1 col-sm-4 custom-no-padd-column">
									<a class="btn custom-btn-2" id="company_unresolved" >Show Companies Not Resolved</a>
								</div>
							</div>	
							<div class="row table-section">
								<div class="table-responsive">
									<table id="companies_table" class="table table-bordered table-striped table-hover"> 
										<thead> 
											<tr> 
												<th>CIK</th> 
												<th>Name</th> 
												<th>Ranks</th> 
												<th></th> 
											</tr> 
										</thead> 
										<tbody> 	
										</tbody> 
									</table>		
								</div>	
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
			</div>

		  </div>

		  </div><!-- end content -->
	 </div>