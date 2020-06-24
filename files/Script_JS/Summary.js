handleChart = function() {
        "use strict";
		$.ajax({
            url: base_url + "Stream_Data/GetDataSummary",
            type: "GET",
            dataType: "json",
            success: function(data){
				$("#p_jumlah_kecamatan").html(data.result.jumlah_kecamatan);
				$("#p_jumlah_penduduk").html(data.result.jumlahpenduduk);
				$("#p_jumlah_village").html(data.result.jumlah_kelurahan);
				handlePresentasePendudukJenisKelamin(data.result.presentase_penduduk_jenis_kelamin);
				handlePendudukJenisKelaminKecamatan(data.result.distrik,data.result.penduduk_jenis_kelamin_kecamatan);
				handlependuduk_per_kecamatan(data.result.penduduk_per_kecamatan);
            },
            error: function(error){
                console.log(error)
            }
        });
}

Summary = function() {
    "use strict";
    return {
        init: function() {
			handleChart()
        }
    }
}();

function handlePresentasePendudukJenisKelamin(series_data){
	Highcharts.chart('presentase_penduduk_jenis_kelamin', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: ''
		},
		credits: {
			enabled: false
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Jenis Kelamin',
			colorByPoint: true,
			data: series_data
		}]
	});
}

function handlePendudukJenisKelaminKecamatan(distrik,series_data){
	Highcharts.chart('PendudukJenisKelaminKecamatan', {
		chart: {
			type: 'column'
		},
		title: {
			text: ''
		},
		credits: {
			enabled: false
		},
		xAxis: {
			categories: distrik,
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah (Jiwa)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y} Jiwa</b></td></tr>',
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
		series: series_data
	});
}

function handlependuduk_per_kecamatan(series_data){
	// Build the chart
	Highcharts.chart('penduduk_per_kecamatan', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			events: {
				load: function () {
					handlependuduk_per_kelurahan(1,'Bonto Bahari');
				}
			}
		},
		title: {
			text: ''
		},
		credits: {
			enabled: false
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.y} Jiwa</b>'
		},
		accessibility: {
			point: {
				valueSuffix: 'Jiwa'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true,
				point: {
					events: {
						click: function () {
							handlependuduk_per_kelurahan(this.district_id,this.name);
						}
					}
				}
			}
		},
		series: [{
			name: 'Jumlah Penduduk',
			colorByPoint: true,
			data: series_data
		}]
	});
	
}

function handlependuduk_per_kelurahan(id_kecamatan,set_title){
	$.ajax({
        url: base_url + "Stream_Data/GetDataKelurahan",
        type: "POST",
        dataType: "json",
		data: {id_kecamatan: id_kecamatan},
        success: function(data){
			// Create the chart
			Highcharts.chart('penduduk_per_kelurahan', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'Kecamatan ' + set_title
				},
				subtitle: {
					text: 'Klik Kolom Untuk Lebih Detail'
				},
				accessibility: {
					announceNewData: {
						enabled: true
					}
				},
				xAxis: {
					type: 'category'
				},
				yAxis: {
					title: {
						text: 'Jumlah Penduduk (Jiwa)'
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
							format: '{point.y}'
						}
					}
				},

				tooltip: {
					headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
					pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Jiwa <br/>'
				},

				series: [
					{
						name: "Jumlah Penduduk",
						colorByPoint: true,
						data: data.result.penduduk_per_kelurahan
					}
				],
				drilldown: {
					series: data.result.penduduk_per_kelurahan_jenis_kelamin
				}
			});
        },
        error: function(error){
            console.log(error)
        }
    });
		
	
	
}





