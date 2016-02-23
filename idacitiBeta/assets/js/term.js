		$(document).ready(function(){

			// Filter case insensitive
						
			jQuery.expr[":"].contains = function (a, i, m) {
	            return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
	        };
			
			// Filter case insensitive end			

			$("#term_rules_decision").hide();

			$("#term_rules_financial").hide();				

			// Term Rules Filtering Start

			$(".term_rules_radio").change(function(){

		        if( $(this).is(":checked") ){ 

		            var val = $(this).val();

		            if(val == 'flat')
		            {

						$("#term_rules_decision").hide();

						$("#term_rules_financial").hide();	

						$("#term_rules_flat").show();

						$(".filter_div").show();

		            }
		            else if(val == 'decision')
		            {

						$("#term_rules_flat").hide();

						$("#term_rules_financial").hide();			            	

						$("#term_rules_decision").show();

		            }
		            else
		            {

						$("#term_rules_flat").hide();

						$("#term_rules_decision").hide();

						$("#term_rules_financial").show();			            	

		            }	

		        }
		        
		    });  

		    // Term Rules Filtering End

		    // Get Specific Term Rule Start

		    $(".term_id").click(function(){   

		    	$("#full-section-overlay").show(); 	

		    	$("#term_id").val($(this).attr('id'));

		    	$("#sector_industry").val(''); 

		    	$("#sic").html("<option value=''>All</option>");

		    	$("#companies_industry").html("");

		    	$("#companies_sic").html("");		    	

		    	var term_id = $(this).attr('id');	   	

				$.ajax({

				    type: "POST",

				    url: "term/term_Rule",

				    data: {term_id:term_id},

				    dataType: "json",

				    success: function(result){	

				    	$("#full-section-overlay").hide();			    	

				    	$("#section-overlay").show();	

				    	$("#term_rule").html(result.term_rule_div);

				    	$("#term_rule_expression").html(result.term_rule_expression_div);				    	

				    	var coverageByRanks = Object.keys(result.term_rule_coverge_div.coverageByRanks).map(function(k) { return result.term_rule_coverge_div.coverageByRanks[k] });								    	

						var coverage_total = result.term_rule_coverge_div.totalEntityCount;

						var coverage_mapped = result.term_rule_coverge_div.mappedEntityCount;

						var coverage_unMapped = result.term_rule_coverge_div.unMappedEntityCount;

						var resolved = (coverage_mapped/coverage_total)*100;

						resolved = resolved.toFixed(2);

						var chart = new Highcharts.Chart({
						    
							title: {
								text: resolved+'% Resolved'
							},

						    chart: {
						        renderTo: 'container',
						        type: 'pie'
						    },

							tooltip: {
								pointFormat: '{series.name}, <b>{point.percentage:.2f}%</b>'
							},

							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',							
									dataLabels: {
										enabled: true,
										format: '<b>{point.name}</b>, {point.percentage:.2f}%',
										style: {
											color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
										}
									}
								}
							},						    

						    series: [{
						        data: []        
						    }]
						});

						var newdata = [];

						for (i = 0; i < coverageByRanks.length; i++) {

							newdata.push({name:'Rank '+coverageByRanks[i].rank+', '+coverageByRanks[i].mappedEntityCount, y:coverageByRanks[i].mappedEntityCount});
					
						}	

						newdata.push({name:'Unresolved '+result.term_rule_coverge_div.unMappedEntityCount, y:result.term_rule_coverge_div.unMappedEntityCount});

						chart.series[0].setData(newdata);						      		    	

				    }

				});		    	

		    }); 

		    // Get Specific Term Rule End 

			// Get SIC   

			$("#sector_industry").change(function(){

				$("#section-overlay").hide();

				var industry_arr = $("#sector_industry").val().split('->');

				var industry = industry_arr[1];

				$.ajax({

				    type: "POST",

				    url: "term/sic_and_companies",

				    data: {industry: industry},

				    dataType: "json",

				    success: function(result)
				    {

				    	// $("#sic").html("<option value=''>All</option>");

				    	// $("#companies_sic").html("");				    	

				    	$("#sic").html(result.sic);

				    	$("#companies_industry").html(result.industry_companies+" Companies");

				    }
				    
				}); 

			});

			$("#sic").change(function(){

				$("#section-overlay").hide();

				var sic_arr = $("#sic").val().split('->');

				var sic = sic_arr[1];

				$.ajax({

				    type: "POST",

				    url: "term/sic_companies",

				    data: {sic: sic},

				    dataType: "json",

				    success: function(result)
				    {

				    	$("#companies_sic").html(result.sic_companies+" Companies");

				    }
				    
				}); 

			});			

			// Get SIC End		 

			// Get Coverage

		    //$("#get_coverage").click(function(){

		    $(document ).on('click', '#get_coverage', function(){ 		    	

		    	var term_id = $("#term_id").val();

		    	var sector_industry = $("#sector_industry").val();

		    	var sector_industry_arr = sector_industry.split('->');

		    	var sector = sector_industry_arr[0];

		    	var industry = sector_industry_arr[1];

		    	var sic = $("#sic").val();

		    	var sic_arr = sic.split('->');						

		   		sic_code = sic_arr[0];  	

				$.ajax({

				    type: "POST",

				    url: "term/get_coverage",

				    data: {term_id:term_id, sector:sector, industry:industry, sic_code:sic_code},

				    dataType: "json",

				    success: function(result){	

				    	//$("#sic").html("<option value=''>All</option>");

				    	//$("#companies_industry").html("");

				    	//$("#companies_sic").html("");				    			    				    	

				    	var coverageByRanks = Object.keys(result.term_rule_coverge_div.coverageByRanks).map(function(k) { return result.term_rule_coverge_div.coverageByRanks[k] });								    	

						var coverage_total = result.term_rule_coverge_div.totalEntityCount;

						var coverage_mapped = result.term_rule_coverge_div.mappedEntityCount;

						var coverage_unMapped = result.term_rule_coverge_div.unMappedEntityCount;

						var resolved = (coverage_mapped/coverage_total)*100;

						resolved = resolved.toFixed(2);

						var chart = new Highcharts.Chart({
						    
							title: {
								text: resolved+'% Resolved'
							},

						    chart: {
						        renderTo: 'container',
						        type: 'pie'
						    },

							tooltip: {
								pointFormat: '{series.name}, <b>{point.percentage:.2f}%</b>'
							},

							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',							
									dataLabels: {
										enabled: true,
										format: '<b>{point.name}</b>, {point.percentage:.2f}%',
										style: {
											color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
										}
									}
								}
							},						    

						    series: [{
						        data: []        
						    }]
						});

						var newdata = [];

						for (i = 0; i < coverageByRanks.length; i++) {

							newdata.push({name:'Rank '+coverageByRanks[i].rank+', '+coverageByRanks[i].mappedEntityCount, y:coverageByRanks[i].mappedEntityCount});
					
						}	

						newdata.push({name:'Unresolved '+result.term_rule_coverge_div.unMappedEntityCount, y:result.term_rule_coverge_div.unMappedEntityCount});

						chart.series[0].setData(newdata);						      		    	

				    }

				});		    	

		    });			

			// Get Coverage End	

			// Term Rules Filter

				$("#term_rules_filter").keyup(function(){

						
				    $('#term_rules_radio input:radio[value=flat]').prop('checked', true);						

					$("#term_rules_flat").show();

					$("#term_rules_decision").hide();

					$("#term_rules_financial").hide();

					var val = $("#term_rules_filter").val();  

					if(val != '')
					{

						$(".filter_div").hide();

						$(".filter_div:Contains("+val+")").show();							

					}							

				});			

			// Term Rules Filter End

			// Get Resolved Companies

			$("#company_resolved").click(function(){

				$("#section-overlay").show();

		    	var term_id = $("#term_id").val();

		    	var sector_industry = $("#sector_industry").val();

		    	var sector_industry_arr = sector_industry.split('->');

		    	var sector = sector_industry_arr[0];

		    	var industry = sector_industry_arr[1];

		    	var sic = $("#sic").val();

		    	var sic_arr = sic.split('->');						

		   		sic_code = sic_arr[0];  		

		   		var rank = $("#coverage_rank").val();		

				$.ajax({

				    type: "POST",

				    url: "term/company_resolved",

				    data: {term_id:term_id, sector:sector, industry:industry, sic_code:sic_code, rank:rank},

				    dataType: "json",

				    success: function(result)
				    {

				    	$("#section-overlay").hide();

				    	$("#companies_table").html(result.companies_table);

				    }
				    
				}); 

			});

			// Get Resolved Companies End 

			// Get UnResolved Companies

			$("#company_unresolved").click(function(){

				$("#section-overlay").show();

		    	var term_id = $("#term_id").val();

		    	var sector_industry = $("#sector_industry").val();

		    	var sector_industry_arr = sector_industry.split('->');

		    	var sector = sector_industry_arr[0];

		    	var industry = sector_industry_arr[1];

		    	var sic = $("#sic").val();

		    	var sic_arr = sic.split('->');						

		   		sic_code = sic_arr[0];  				

				$.ajax({

				    type: "POST",

				    url: "term/company_unresolved",

				    data: {term_id:term_id, sector:sector, industry:industry, sic_code:sic_code},

				    dataType: "json",

				    success: function(result)
				    {

				    	$("#section-overlay").hide();

				    	$("#companies_table").html(result.companies_table);

				    }
				    
				}); 

			});

			// Get UnResolved Companies End

			// Company Resolved View

		    $(document ).on('click', '.resolved_entity_id', function(){ 
			
		    	var entity_id = $(this).attr('id');

		    	var term_id = $("#term_id").val();		    	

				$.ajax({

				    type: "POST",

				    url: "term/resolved_entity_id",

				    data: {entity_id:entity_id, term_id:term_id},

				    dataType: "json",

				    success: function(result)
				    {


				    }
				    
				}); 

			});			

			// Company Resolved View End 

			$('.missing_periods td').css('color', 'red');


			$(".annual_filter").click(function(){

				if($('.annual_filter').is(':checked'))
				{
					
					$('.quarterly').hide();

					$('.quarterly').removeClass('active');

					if($('.missing_filter').is(':checked'))
					{
						$('.missing_periods').show();

						$('.missing_periods').addClass("active");

						$('.quarterly').hide();

						$('.quarterly').removeClass('active');

						if($('.quarterly_filter').is(':checked'))
						{
							$('.missing_periods.annual').hide();

							$('.missing_periods.annual').removeClass('active');
						}	
					}
					else
					{
						$('.missing_periods').hide();

						$('.missing_periods').removeClass('active');
					}	


				}
				else
				{
					$('.quarterly').show();

					$('.quarterly').addClass("active");

					if($('.missing_filter').is(':checked'))
					{
						$('.missing_periods').show();

						$('.missing_periods').addClass("active");
					}
					else
					{
						$('.missing_periods').hide();

						$('.missing_periods').removeClass('active');
					}

				}	

			});	

			$(".quarterly_filter").click(function(){			

					if($('.quarterly_filter').is(':checked'))
					{

						$('.annual').hide();

						$('.annual').removeClass('active');
					
						if($('.missing_filter').is(':checked'))
						{
							$('.missing_periods').show();

							$('.missing_periods').addClass("active");
					
							$('.annual').hide();

							$('.annual').removeClass('active');

							if($('.annual_filter').is(':checked'))
							{
								$('.missing_periods.quarterly').hide();

								$('.missing_periods.quarterly').removeClass('active');
							}							
						}
						else
						{
							$('.missing_periods').hide();

							$('.missing_periods').removeClass('active');
						}

					}
					else
					{
						$('.annual').show();

						$('.annual').addClass("active");

						if($('.missing_filter').is(':checked'))
						{
							$('.missing_periods').show();

							$('.missing_periods').addClass("active");
						}
						else
						{
							$('.missing_periods').hide();

							$('.missing_periods').removeClass('active');
						}

					}					

			});	

			$(".missing_filter").click(function(){			

					if($('.missing_filter').is(':checked'))
					{

						if(!($('.annual_filter').is(':checked')) && !($('.quarterly_filter').is(':checked')))
						{
							$('.missing_periods').show();

							$('.missing_periods').addClass("active");
						}
						else if($('.annual_filter').is(':checked') && !($('.quarterly_filter').is(':checked')))
						{
							$('.missing_periods.annual').show();

							$('.missing_periods.annual').addClass("active");
						}
						else if($('.quarterly_filter').is(':checked') && !($('.annual_filter').is(':checked')))
						{
							$('.missing_periods.quarterly').show();	

							$('.missing_periods.quarterly').addClass("active");							
						}							

						$('.missing_periods td').css('color', 'red');
					}
					else
					{
						$('.missing_periods').hide();

						$('.missing_periods').removeClass('active');
					}

			});		

			$(".missing_periods").hide();

			$(".missing_periods").removeClass('active');				     							

		});