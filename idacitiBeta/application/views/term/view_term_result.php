	<?php
		$folder =   dirname(dirname(__FILE__));
		require_once $folder."/commun/navbar.php";
	 ?>
	<div class="page-container row-fluid">
	  <?php require_once $folder."/commun/main-menu.php";?>
		<div class="page-content">
		  <div class="clearfix"></div>
		 
         
          <style type="text/css">
				.custom-btn {
							background-color: #853c00;
							background-image: none !important;
							border-radius:0px;
							box-shadow: none;
							color: #fff;
							cursor: pointer;
							display: inline-block;
							font: 14px/20px "Helvetica Neue",Helvetica,Arial,sans-serif;
							margin-bottom: 0;
							padding: 7px 12px 9px;
							text-align: center;
							text-shadow: none;
							transition: all 0.12s linear 0s !important;
							vertical-align: middle;
							margin: 5px 0;	
							}
						
					.custom-btn:hover, 
					.custom-btn:focus	{
						background-color: #853c00;
						background-image: none !important;
						color: #fff;
					} 	
							
						.left{
							padding-top:10px;
							padding-bottom:10px;
							}
						
						
					</style>
         
			<div class="content">
			
				<div class="col-md-12 col-sm-12 itacidi-new-right-panel">
					<div class="row itacidi-new-right-panel-section-1">
						<div class="col-md-4  col-sm-4 ">
							<h1>Term Rule & Expression</h1>	
						</div>
						
					</div>
                    
					<div class="row itacidi-new-right-panel-section-2">
                 
						<div class="col-md-5  col-sm-12">
								<div class="left form-group custom-form-group">
									<div class="btn custom-btn">
										<div style="" class="checkbox check-warning">
											<input type="checkbox" value="group1" name="optionyes" id="custom-group1" class="annual_filter">
											<label style="white-space:nowrap;" for="custom-group1">Annual</label>	
										</div>
									</div>	
									<div href="#" class="btn custom-btn">
										<div style="" class="checkbox check-warning">
											<input type="checkbox" value="group1" name="optionyes" id="custom-group2" class="quarterly_filter">
											<label style="white-space:nowrap;" for="custom-group2">Quarterly</label>	
										</div>
									</div>
									<div class="btn custom-btn">
										<div style="" class="checkbox check-warning">
											<input type="checkbox" value="group1" name="optionyes" id="custom-group3" class="missing_filter">
											<label style="white-space:nowrap;" for="custom-group3">Show Missing Priods</label>	
										</div>
									</div>
								</div>
						</div>
                        <div class="col-md-3 col-sm-6 idaciti-custom-padd">
							<div id="range_03"></div>
						</div>
                        
						<div class="col-md-8 col-sm-12 itacidi-new-right-panel-section-4">
                        
							<form class="itacidi-custom-form">
							   <div class="table-responsive">
									<table class="table table-bordered table-striped table-hover idaciti-table"> 
										
										<thead>
											<tr>
												<th>Period</th>
												<th>Rank</th>
												<th>Value</th>
												<th>Recevied Expression</th>
												<th>Period Over Period Variance</th>
												<th>Year Over Year Variance</th>
											   
											</tr>
										</thead>

										<tbody>

        <?php	

        foreach($view_term_rule as $v_t_r)
        {	
        ?>

            <tr 
	        	<?php

	        		echo "class='".$v_t_r['FY']." ";

		        	if($v_t_r['resolvedExpression'] == '' && $v_t_r['value'] == '0') 
		        	{
		        		echo "missing_periods ";	
		        	}	

		        	if($v_t_r['FQ'] == 'FY')
		        	{
		        		echo "annual";		        		
		        	}
		        	else
		        	{
		        		echo "quarterly";
		        	}

		        	echo "'";				        	
	        	
	        	?>
            >
                <td><?php echo $v_t_r['FY'].$v_t_r['FQ']; ?></td>
                <td><?php echo $v_t_r['rank']; ?></td>
                <td><?php

             	if($v_t_r['resolvedExpression'] != '' && $v_t_r['value'] != '0') 
	        	{
                	echo "$".number_format($v_t_r['value']);
                }  

                 ?></td>
                <td><?php echo $v_t_r['resolvedExpression']; ?></td>
                <td><?php

             	if($v_t_r['changePcntPoP'] == null) 
	        	{
                	echo "";
                }
                else
                {
                	echo $v_t_r['changePcntPoP'];
                }  

                ?></td>
                <td><?php

             	if($v_t_r['changePcntYoY'] == null) 
	        	{
                	echo "";
                } 
                else
                {
                	echo $v_t_r['changePcntYoY'];
                } 

                ?></td>   
            </tr>                      

        <?php

        }

        ?>													   

										</tbody>
									</table>
								</div>
				  
							</form>
					  
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
                  
							 <div class="col-md-4 col-sm-6 itacidi-new-right-panel-section-3">

								<div id="view_rule_annual_container">
								</div>

								<div id="view_rule_quarter_container">
								</div>

							</div>	
                
					  </div>
					 
					</div>
                   
                	
                    </div>
        </div>

		  