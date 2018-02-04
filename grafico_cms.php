<script type="text/javascript">

									//TODO O SCRIPT DO GRÁFICO
									Highcharts.chart('container', {
										chart: {
											type: 'column'
										},
										title: {
										text: 'Cotações do mercado de navegadores. De Dezembro de 2016 a Março de 2017'

									},
									subtitle: {
										text: 'Click nas colunas, para verificar as versões. Fonte: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
									},
									xAxis: {
										type: 'category'
									},
									yAxis: {
										title: {
											text: 'Parcialmente o total do mercado'
										}

									},
									legend: {
										enabled: false
									},
									plotOptions: {
										series: {
											borderWidth: 0,
											dataLabels: {
												enabled: true,
												format: '{point.y:.1f}%'
											}
										}
									},

									tooltip: {
										headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
										pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
									},

									series: [{
										name: 'Colunas',
										colorByPoint: true,
										data: [{
											name: 'Chrome',
											y: 56.33,
											drilldown: 'Chrome'
										}, {
											name: 'Firefox',
											y: 24.03,
											drilldown: 'Firefox'
										}, {
											name: 'Microsoft Internet Explorer',
											y: 10.38,
											drilldown: 'Microsoft Internet Explorer'
										}, {
											name: 'Safari',
											y: 4.77,
											drilldown: 'Safari'
										}, {
											name: 'Opera',
											y: 0.91,
											drilldown: 'Opera'
										}, {
											name: 'Propriedades indetectáveis',
											y: 0.2,
											drilldown: null
										}]
									}],
									drilldown: {
										series: [{
											name: 'Microsoft Internet Explorer',
											id: 'Microsoft Internet Explorer',
											data: [
												[
													'v11.0',
													24.13
												],
												[
													'v8.0',
													17.2
												],
												[
													'v9.0',
													8.11
												],
												[
													'v10.0',
													5.33
												],
												[
													'v6.0',
													1.06
												],
												[
													'v7.0',
													0.5
												]
											]
										}, {
											name: 'Chrome',
											id: 'Chrome',
											data: [
												[
													'v40.0',
													5
												],
												[
													'v41.0',
													4.32
												],
												[
													'v42.0',
													3.68
												],
												[
													'v39.0',
													2.96
												],
												[
													'v36.0',
													2.53
												],
												[
													'v43.0',
													1.45
												],
												[
													'v31.0',
													1.24
												],
												[
													'v35.0',
													0.85
												],
												[
													'v38.0',
													0.6
												],
												[
													'v32.0',
													0.55
												],
												[
													'v37.0',
													0.38
												],
												[
													'v33.0',
													0.19
												],
												[
													'v34.0',
													0.14
												],
												[
													'v30.0',
													0.14
												]
											]
										}, {
											name: 'Firefox',
											id: 'Firefox',
											data: [
												[
													'v35',
													2.76
												],
												[
													'v36',
													2.32
												],
												[
													'v37',
													2.31
												],
												[
													'v34',
													1.27
												],
												[
													'v38',
													1.02
												],
												[
													'v31',
													0.33
												],
												[
													'v33',
													0.22
												],
												[
													'v32',
													0.15
												]
											]
										}, {
											name: 'Safari',
											id: 'Safari',
											data: [
												[
													'v8.0',
													2.56
												],
												[
													'v7.1',
													0.77
												],
												[
													'v5.1',
													0.42
												],
												[
													'v5.0',
													0.3
												],
												[
													'v6.1',
													0.29
												],
												[
													'v7.0',
													0.26
												],
												[
													'v6.2',
													0.17
												]
											]
										}, {
											name: 'Opera',
											id: 'Opera',
											data: [
												[
													'v12.x',
													0.34
												],
												[
													'v28',
													0.24
												],
												[
													'v27',
													0.17
												],
												[
													'v29',
													0.16
												]
											]
										}]
									}
								});
</script>