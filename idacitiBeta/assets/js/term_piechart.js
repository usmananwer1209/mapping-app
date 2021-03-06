			$(function () {

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