
	
		
<?php $filter_file = true; ?>
<!-- Required suggested by umair-->
<script src="<?php echo js_lib('jquery-1.8.3.min')."?v=".$this->config->item('plugins_version'); ?>"></script>
<!--<script src="<?php echo js_lib('jquery-1.8.3')."?v=".$this->config->item('plugins_version'); ?>"></script>-->
<script src="<?php echo js_lib('js/bootstrap.min','bootstrap')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('pace.min','pace')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('jquery.sidr.min','jquery-slider')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('jquery.unveil.min','jquery-unveil')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('breakpoints')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('jquery.slimscroll.min','jquery-slimscroll')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('jqueryblockui','jquery-block-ui')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('js/jquery.validate.min','jquery-validation')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('select2.min','bootstrap-select2/')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('js/bootstrap-formhelpers.min','vlamanna-BootstrapFormHelpers')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_lib('ios7-switch','ios-switch')."?v=".$this->config->item('plugins_version'); ?>" type="text/javascript"></script>

<script src="<?php echo js_url('log4javascript_production','log4javascript_production')."?v=".$this->config->item('plugins_version'); ?>" type="text/javascript"></script>
<!-- Required suggested by umair drill down-->
<script src="<?php echo js_url('d3.min')."?v=".$this->config->item('files_version'); ?>"></script>
<script src="<?php echo js_url('unicode')."?v=".$this->config->item('files_version'); ?>"></script>
<script src="<?php echo js_url('d3.layout.cloud')."?v=".$this->config->item('files_version'); ?>"></script>
<script src="<?php echo js_url('cloud')."?v=".$this->config->item('files_version'); ?>"></script>

<script src="<?php echo js_url('ion.rangeSlider.min')."?v=".$this->config->item('files_version'); ?>"></script>

	<script>
	
		var showResult = function (data) {

			$('.annual').hide();

		    $('.quarterly').hide();

		    $('.missing_periods').hide();

		    for(var val=data.from; val<=data.to; val++)
		    {

		    	$("."+val+"").show();

		    	$('.missing_periods').hide();

		    }	

		};

		$("#range_03").ionRangeSlider({
			type: "int",
			min: <?php echo $min_value; ?>,
			max: <?php echo $max_value; ?>,
			from: <?php echo $min_value; ?>,
			to: <?php echo $max_value; ?>,
			grid: false,
			onFinish: showResult,
		});
	
	</script>

	<script src="<?php echo js_url('jquery.slimscroll')."?v=".$this->config->item('files_version'); ?>"></script>

	<script>
		
		$(function(){
			$('#inner-content-div').slimScroll({
				color: '#a1b2bd',
				size: '4px',
				height: '960px',
				width: '100%'
			});
		});	
			
	</script>

<?php if( active_plugin('jasny',$current) ) { ?>
	<script src="<?php echo js_lib('js/jasny-bootstrap.min','jasny-bootstrap-3.1.0-dist')."?v=".$this->config->item('plugins_version'); ?>"></script>
<?php } ?>
<?php if( active_plugin('mixitup',$current) ) { ?>
	<script src="<?php echo js_lib('jquery.mixitup.min','jquery-mixitup')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_url('search_results')."?v=".$this->config->item('files_version'); ?>"></script>
<?php } ?>
<?php if( active_plugin('rcarousel',$current) ) { ?>
	<script src="<?php echo js_lib('js/jquery.ui.core.min','rcarousel')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('js/jquery.ui.widget.min','rcarousel')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('js/jquery.ui.rcarousel.min','rcarousel')."?v=".$this->config->item('plugins_version'); ?>"></script>
<?php } ?>



<script src="<?php echo js_lib('jquery.flippy.min','jquery-flippy')."?v=".$this->config->item('plugins_version'); ?>"></script>
<script src="<?php echo js_url('core')."?v=".$this->config->item('files_version'); ?>"></script>
<script src="<?php echo js_url('rys/core')."?v=".$this->config->item('files_version'); ?>"></script>
<?php if( active_plugin('rcarousel',$current) ) { ?>
	<script src="<?php echo js_url('rys/circle')."?v=".$this->config->item('files_version'); ?>"></script>
    
<?php } ?>

<!-- Required suggested by umair-->
<?php if( active_plugin('isotope',$current) ) { ?>
<script type="text/javascript" src="<?php echo js_lib('jquery-css-transform','rotate3Di')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script type="text/javascript" src="<?php echo js_lib('rotate3Di','rotate3Di')."?v=".$this->config->item('plugins_version'); ?>"></script>

	<script src="<?php echo js_lib('isotope.pkgd')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_url('rys/card_isotop')."?v=".$this->config->item('files_version'); ?>"></script>

<?php } ?>

<?php if( active_js('card',$current) ) { ?>
	<script src="<?php echo js_lib('browserdetect')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery-ui-1.10.4.custom.min','jquery-ui')."?v=".$this->config->item('plugins_version'); ?>"></script>
	
	<script src="<?php echo js_lib('jquery-jvectormap-1.2.2.min','jvectormap')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery-jvectormap-us-aea-en','jvectormap')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery.qtip.min','qtip2')."?v=".$this->config->item('plugins_version'); ?>"></script>
    <script src="<?php echo js_lib('jquery.dataTables.min','jquery-datatable/js/')."?v=".$this->config->item('plugins_version'); ?>"></script>
    <script src="<?php echo js_lib('TableTools.min','jquery-datatable/extra/js/')."?v=".$this->config->item('plugins_version'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_lib('datatables.responsive','datatables-responsive/js/')."?v=".$this->config->item('plugins_version'); ?>"></script>
    <script type="text/javascript" src="<?php echo js_lib('lodash.min','datatables-responsive/js/')."?v=".$this->config->item('plugins_version'); ?>"></script>

	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/d3/2.8.1/d3.v2.min.js"></script>-->
	<!--<script src="http://davidstutz.github.io/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>-->

    <script src="<?php echo js_lib('wysihtml5-0.3.0','bootstrap-wysihtml5')."?v=".$this->config->item('plugins_version'); ?>"></script>
    <script src="<?php echo js_lib('bootstrap-wysihtml5','bootstrap-wysihtml5')."?v=".$this->config->item('plugins_version'); ?>"></script>
        
	<script src="<?php echo js_url('highcharts')."?v=".$this->config->item('plugins_version'); ?>"></script>
    <script src="<?php echo js_url('rys/highcharts-more')."?v=".$this->config->item('files_version'); ?>"></script>

    <script src="<?php echo js_url('rys/exporting')."?v=".$this->config->item('files_version'); ?>"></script>
    <!--<script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>-->
    <script src="<?php echo js_url('rys/tv')."?v=".$this->config->item('files_version'); ?>"></script>
	<script src="<?php echo js_url('rys/card')."?v=".$this->config->item('files_version'); ?>"></script>
	<script src="<?php echo js_url('datatable_script')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_url('rys/explore_rank')."?v=".$this->config->item('files_version'); ?>"></script>
	<script src="<?php echo js_url('rys/map')."?v=".$this->config->item('files_version'); ?>"></script>
	<script src="<?php echo js_url('rys/treemap')."?v=".$this->config->item('files_version'); ?>"></script>
	<script src="<?php echo js_url('rys/chart')."?v=".$this->config->item('files_version'); ?>"></script>
	<script src="<?php echo js_url('rys/list_builder')."?v=".$this->config->item('files_version'); ?>"></script>

    <!-- drilldown requirements-->
    <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>-->
    <script src="<?php echo js_url('rys/numeral')."?v=".$this->config->item('files_version'); ?>"></script>
    <!--<script src="http://d3js.org/d3.v3.min.js"></script>-->
    <script src="<?php echo js_url('rys/d3.v3.min')."?v=".$this->config->item('files_version'); ?>"></script>
    <script src="<?php echo js_url('drilldown')."?v=".$this->config->item('files_version'); ?>"></script>
<?php } ?>
<?php if( active_js('template',$current) ) { ?>
	<script src="<?php echo js_lib('jquery-ui-1.10.4.custom.min','jquery-ui')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_url('rys/card')."?v=".$this->config->item('files_version'); ?>"></script>
    <script src="<?php echo js_url('rys/template')."?v=".$this->config->item('files_version').rand(0, 2000); ?>"></script>
	<script src="<?php echo js_url('rys/list_builder')."?v=".$this->config->item('files_version'); ?>"></script>
    <!-- drilldown requirements-->
<?php } ?>

<?php if( active_js('storyboard',$current) ) { ?>
	<script src="<?php echo js_lib('browserdetect')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery-ui-1.10.4.custom.min','jquery-ui')."?v=".$this->config->item('plugins_version'); ?>"></script>
	
	<script src="<?php echo js_lib('jquery.qtip.min','qtip2')."?v=".$this->config->item('plugins_version'); ?>"></script>
  <script src="<?php echo js_lib('jquery.dataTables.min','jquery-datatable/js/')."?v=".$this->config->item('plugins_version'); ?>"></script>
  <script src="<?php echo js_lib('TableTools.min','jquery-datatable/extra/js/')."?v=".$this->config->item('plugins_version'); ?>"></script>
    <script src="<?php echo js_url('bootstrap-multiselect'); ?>"></script>
    <script src="<?php echo js_lib('wysihtml5-0.3.0','bootstrap-wysihtml5')."?v=".$this->config->item('plugins_version'); ?>"></script>
  <!--  /* Usman Code*/-->
  <script src="<?php echo js_url('rys/wysihtmleditor'); ?>"></script>
 <!-- /*Usman Ends*/-->

	<script src="<?php echo js_lib('js/modernizr.custom.79639', 'baraja')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('js/jquery.baraja', 'baraja')."?v=".$this->config->item('plugins_version'); ?>"></script>

	<script src="<?php echo js_lib('jquery.knob','fileupload')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery.ui.widget','fileupload')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery.iframe-transport','fileupload')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery.fileupload','fileupload')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery.bxslider.min','bxslider')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('bootstrap-maxlength.min')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_url('rys/storyboard_creator')."?v=".$this->config->item('files_version'); ?>"></script>
	
	
        
<?php } ?>

<?php if( active_js('storyboard_view',$current) ) { ?>
	<script src="<?php echo js_lib('browserdetect')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_lib('jquery.bxslider.min','bxslider')."?v=".$this->config->item('plugins_version'); ?>"></script>
  <script src="<?php echo js_lib('jquery.mCustomScrollbar.concat.min', 'jquery-custom-scrollbar')."?v=".$this->config->item('plugins_version'); ?>"></script>
	<script src="<?php echo js_url('rys/storyboard_viewer')."?v=".$this->config->item('files_version'); ?>"></script>
<?php } ?>
<?php if( active_js('home',$current) ) { ?>
  <script src="<?php echo js_lib('jquery-sparkline', 'jquery-sparkline')."?v=".$this->config->item('plugins_version'); ?>"></script>
  <script src="<?php echo js_lib('jquery.easypiechart.min', 'jquery-easy-pie-chart/js')."?v=".$this->config->item('plugins_version'); ?>"></script>
  <script src="<?php echo js_url('rys/dashboard')."?v=".$this->config->item('files_version'); ?>"></script>
<?php } ?>

<?php if(empty($is_embed) || !$is_embed ) { ?>
  <script>
  // Include the UserVoice JavaScript SDK (only needed once on a page)
  UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/kc0C7PrxxWiF71IzaK0QoQ.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();

  //
  // UserVoice Javascript SDK developer documentation:
  // https://www.uservoice.com/o/javascript-sdk
  //

  // Set colors
  UserVoice.push(['set', {
    accent_color: '#6aba2e',
    trigger_color: 'white',
    trigger_background_color: '#6aba2e'
  }]);

  // Identify the user and pass traits
  // To enable, replace sample data with actual user traits and uncomment the line
  UserVoice.push(['identify', {
  	<?php if(!empty($user->email)) echo "email: '".$user->email."',"; ?>
  	<?php if(!empty($user->first_name) && !empty($user->last_name)) echo "name: '".$user->first_name." ".$user->last_name."',"; ?>
    //email:      'john.doe@example.com', // Userâ€™s email address
    //name:       'John Doe', // Userâ€™s real name
    //created_at: 1364406966, // Unix timestamp for the date the user signed up
    //id:         123, // Optional: Unique id of the user (if set, this should not change)
    //type:       'Owner', // Optional: segment your users by type
    //account: {
    //  id:           123, // Optional: associate multiple users with a single account
    //  name:         'Acme, Co.', // Account name
    //  created_at:   1364406966, // Unix timestamp for the date the account was created
    //  monthly_rate: 9.99, // Decimal; monthly rate of the account
    //  ltv:          1495.00, // Decimal; lifetime value of the account
    //  plan:         'Enhanced' // Plan name for the account
    //}
  }]);

  // Add default trigger to the bottom-right corner of the window:
  UserVoice.push(['addTrigger', { mode: 'contact', trigger_position: 'bottom-right' }]);

  // Or, use your own custom trigger:
  //UserVoice.push(['addTrigger', '#id', { mode: 'contact' }]);

  // Autoprompt for Satisfaction and SmartVote (only displayed under certain conditions)
  UserVoice.push(['autoprompt', {}]);
  </script>
<?php } ?>
<?php if($current == '/circle/add'){?>
<script>
$(document).ready(function(e) {
    $('input[name=selectbox3]').val($('#admin_id').val());
});
</script>
<?php }
 if(active_js('my_storyboard',$current)){?>
		<script src="<?php echo js_url('rys/my_storyboard')."?v=".$this->config->item('files_version'); ?>"></script>
<?php }
 if(active_js('my_card',$current)){?>
		<script src="<?php echo js_url('rys/my_card')."?v=".$this->config->item('files_version'); ?>"></script>
<?php }
 if(active_js('all_storyboard',$current)){?>
		<script src="<?php echo js_url('rys/all_storyboard')."?v=".$this->config->item('files_version'); ?>"></script>
<?php }
 if(active_js('all_card',$current)){?>
		<script src="<?php echo js_url('rys/all_card')."?v=".$this->config->item('files_version'); ?>"></script>
<?php }
if(active_js('private_company',$current)){?>
		<script src="<?php echo js_lib('jquery-ui-1.10.4.custom.min','jquery-ui')."?v=".$this->config->item('plugins_version'); ?>"></script>
		<script src="<?php echo js_url('rys/private_company')."?v=".$this->config->item('files_version'); ?>"></script>
<?php }?>
<?php if( active_js('dataset',$current) ) { ?>
	<script src="<?php echo js_lib('autoNumeric','jquery-autonumeric');?>" type="text/javascript"></script>
    <script src="<?php echo js_url('rys/dataset')."?v=".$this->config->item('files_version'); ?>"></script>
    <script src="<?php echo js_url('rys/ajaxfileupload')."?v=".$this->config->item('files_version'); ?>"></script>
    <script src="<?php echo js_url('rys/dataset2')."?v=".$this->config->item('files_version'); ?>"></script>
<?php } ?>

	<script>
	
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

					if($('.missing_filter').is(':checked'))
					{
						$('.missing_periods').show();

						$('.quarterly').hide();
					}
					else
					{
						$('.missing_periods').hide();
					}

				}
				else
				{
					$('.quarterly').show();

					if($('.missing_filter').is(':checked'))
					{
						$('.missing_periods').show();
					}
					else
					{
						$('.missing_periods').hide();
					}

				}	

			});	

			$(".quarterly_filter").click(function(){			

					if($('.quarterly_filter').is(':checked'))
					{

						$('.annual').hide();
					
						if($('.missing_filter').is(':checked'))
						{
							$('.missing_periods').show();
					
							$('.annual').hide();
						}
						else
						{
							$('.missing_periods').hide();
						}

					}
					else
					{
						$('.annual').show();

						if($('.missing_filter').is(':checked'))
						{
							$('.missing_periods').show();
						}
						else
						{
							$('.missing_periods').hide();
						}

					}					

			});	

			$(".missing_filter").click(function(){			

					if($('.missing_filter').is(':checked'))
					{
						$('.missing_periods').show();

						$('.missing_periods td').css('color', 'red');
					}
					else
					{
						$('.missing_periods').hide();
					}

			});		

			$(".missing_periods").hide();					     							

		});
	
	</script>

	<script>

		// $(document).ready(function(){

		// 		$('.scroll-pane').jScrollPane();
		// });	
		
	</script>

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>	
	
	<script>
	
			$(function () {

				// Make monochrome colors and set them as default for all pies
				// Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
				// 	return {
				// 		radialGradient: {
				// 			cx: 0.5,
				// 			cy: 0.3,
				// 			r: 0.7
				// 		},
				// 		stops: [
				// 			[0, color],
				// 			[1, Highcharts.Color(color).brighten(-0.2).get('rgb')] // darken
				// 		]
				// 	};
				// });


				$('#container').highcharts({
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: ''
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',							
							dataLabels: {
								enabled: true,
								format: '<b>{point.name}</b>: {point.percentage:.1f} %',
								style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								}
							}
						}
					},
					series: [{
						name: '',
				        fontSize: '24px',						
						data: []
					}]
				});

			});

<?php
if(isset($view_term_rule_check) && $view_term_rule_check != '')
{	
?>

			// Highchart view turm rule annual 

			$(function () {

			    $('#view_rule_annual_container').highcharts({
			        chart: {
			            type: 'column'
			        },
			        title: {
			            text: 'Additional Paid In Capital'
			        },
			        subtitle: {
			            text: '(Annual)'
			        },
			        xAxis: {
			            categories: [<?php echo $annual_name; ?>],
			            crosshair: true
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Millions'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {

			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            }

			        },
			        series: [{

			            name: 'Annual',
			            data: [<?php echo $annual_amount; ?>]

			        }, 
			        ]
			    });
			});

			// Highchart view turm rule annual End


			// Highchart view turm rule Quarter 

			$(function () {

			    $('#view_rule_quarter_container').highcharts({
			        chart: {
			            type: 'column'
			        },
			        title: {
			            text: 'Additional Paid In Capital'
			        },
			        subtitle: {
			            text: '(Quarterly)'
			        },
			        xAxis: {
			            categories: [<?php echo $quarter_name; ?>],
			            crosshair: true
			        },
			        yAxis: {
			            min: 0,
			            title: {
			                text: 'Millions'
			            }
			        },
			        tooltip: {
			            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			            footerFormat: '</table>',
			            shared: true,
			            useHTML: true
			        },
			        plotOptions: {
			            column: {
			                pointPadding: 0.2,
			                borderWidth: 0
			            }
			        },
			        series: [{
			            name: 'Quarterly',
			            data: [<?php echo $quarter_amount; ?>]
			        }, 
			        ]
			    });
			});

			// Highchart view turm rule Quarter End	

<?php
}
?>
			
			Highcharts.theme = {
			      colors: ["#5E9641", "#6DA052", "#7BA964", "#8AB375", "#99BC86", "#A7C697", "#B6CFA9", "#C4D9BA", "#D3E2CB", "#E2ECDC", "#E2ECDC", "#E2ECDC", "#E2ECDC", "#E2ECDC", "#E2ECDC"],
			  	  chart: {
				  backgroundColor: null,
				  style: {
					 fontFamily: "Signika, serif"
				  }
			   },
			   title: {
				  style: {
					 color: 'black',
					 fontSize: '16px',
					 fontWeight: 'bold'
				  }
			   },
			   subtitle: {
				  style: {
					 color: 'black'
				  }
			   },
			   tooltip: {
				  borderWidth: 0
			   },
			   legend: {
				  itemStyle: {
					 fontWeight: 'bold',
					 fontSize: '13px'
				  }
			   },
			   xAxis: {
				  labels: {
					 style: {
						color: '#6e6e70'
					 }
				  }
			   },
			   yAxis: {
				  labels: {
					 style: {
						color: '#6e6e70'
					 }
				  }
			   },
			   plotOptions: {
				  series: {
					 shadow: true
				  },
				  candlestick: {
					 lineColor: '#404048'
				  },
				  map: {
					 shadow: false
				  }
			   },

			   // Highstock specific
			   navigator: {
				  xAxis: {
					 gridLineColor: '#D0D0D8'
				  }
			   },
			   rangeSelector: {
				  buttonTheme: {
					 fill: 'white',
					 stroke: '#C0C0C8',
					 'stroke-width': 1,
					 states: {
						select: {
						   fill: '#D0D0D8'
						}
					 }
				  }
			   },
			   scrollbar: {
				  trackBorderColor: '#C0C0C8'
			   },

			   // General
			   background2: '#E0E0E8'
			   
			};

			// Apply the theme
			Highcharts.setOptions(Highcharts.theme);	
	

	</script>

		

