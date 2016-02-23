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
			            categories: annual_name,
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
			            data: annual_amount

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
			            categories: quarter_name,
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
			            data: quarter_amount
			        }, 
			        ]
			    });
			});

			// Highchart view turm rule Quarter End

			
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