	<?php
		$folder =   dirname(dirname(__FILE__));
		require_once $folder."/commun/navbar.php";
	 ?>
	<div class="page-container row-fluid">
	  <?php require_once $folder."/commun/main-menu.php";?>
		<div class="page-content">
		
		<div class="clearfix"></div>
		  
		<div class="content">
									
						
<div class="col-md-12 col-sm-12 itacidi-new-right-panel">
					<div class="row itacidi-new-right-panel-section-1">
						<div class="col-md-4  col-sm-4 ">
							<h1>Term Rule &amp; Expression</h1>	
						</div>
						
					</div>
                    
					<div class="row itacidi-new-right-panel-section-2">
                 
                    <div class="col-md-12  col-sm-12">
							<div class="left">

								<input type="checkbox" class="annual_filter" value="annual_check" >
								annual
								<br>
								<input type="checkbox" class="quarterly_filter" value="quarterly_check" >
								quarterly
								<br>
								<input type="checkbox" class="missing_filter" value="missing_check" >
								missing 	

							</div>
						</div>
                        
					<div class="col-md-8 col-sm-12 row itacidi-new-right-panel-section-4">
                        
					<form class="itacidi-custom-form">
                    <div class="table-responsive">
					<table class="table table-bordered table-striped table-hover"> 
		<thead>
            <tr>
                <th>Period</th>
                <th>Value</th>
                <th>Recevied Expression</th>
                <th>Dirlldown</th>
            </tr>
        </thead>
        
        <tbody>   

        <?php

		$annual_name = '';
		
		$annual_amount = '';

		$quarter_name = '';

		$quarter_amount = '';	

        foreach($view_term_rule as $v_t_r)
        {	
        ?>

            <tr 
	        	<?php

	        		echo "class='";

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
                <td><?php

             	if($v_t_r['resolvedExpression'] != '' && $v_t_r['value'] != '0') 
	        	{
                	echo "$".number_format($v_t_r['value']);
                }  

                 ?></td>
                <td><?php echo $v_t_r['resolvedExpression']; ?></td>
                <td></td>    
            </tr>                      

        <?php
        
        	if($v_t_r['resolvedExpression'] != '' && $v_t_r['value'] != '')
        	{
        			
        		if($v_t_r['FQ'] == 'FY')
        		{
        			$annual_name .= "'".$v_t_r['FY'].$v_t_r['FQ']."',";

        			$annual_amount .= $v_t_r['value'].",";
        		}	
        		else
        		{
        			$quarter_name .= $v_t_r['FY'].$v_t_r['FQ'].",";

        			$quarter_amount .= $v_t_r['value'].",";
        		}	
        	}

        }

        ?>    

        </tbody>
    </table>

												
			</div></form>

				</div>
                  
                        <div class="col-md-4 col-sm-12 itacidi-new-right-panel-section-3">
						
							<div id="view_rule_annual_container">



							</div>

							<div id="view_rule_quarter_container">

													

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