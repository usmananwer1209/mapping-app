// Range Slider

		var showResult = function (data) {

			$('.active.annual').hide();

		    $('.active.quarterly').hide();

		    $('.active.missing_periods').hide();

		    for(var val=data.from; val<=data.to; val++)
		    {

		    	$(".active."+val+"").show();

		    	if(!($('.missing_filter').is(':checked')))
		    	{
		    		$('.active.missing_periods').hide();
		    	}	

		    }	

		};

// Slim Scroll

		$(function(){
			$('#inner-content-div').slimScroll({
				color: '#a1b2bd',
				size: '4px',
				height: '960px',
				width: '100%'
			});
		});		