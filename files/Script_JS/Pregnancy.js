handleChart = function() {
        "use strict";
		var year = $("#filter_year").val();
		$.ajax({
            url: base_url + "Stream_Data/GetDataSummaryPregnancy",
            type: "POST",
            dataType: "json",
			data: {year: year},
            success: function(data){
				jumlah_kehamilan(data.result.month,data.result.jumlah_kehamilan);
				kasus_keguguran(data.result.kasus_keguguran);
				jumlah_persalinan(data.result.month,data.result.jumlah_persalinan);
				status_persalinan_bayi(data.result.month,data.result.status_persalinan_bayi);
				status_persalinan_ibu(data.result.month,data.result.status_persalinan_ibu);
            },
            error: function(error){
                console.log(error)
            }
        });
}

Pregnancy = function() {
    "use strict";
    return {
        init: function() {
			handleChart();
        }
    }
}();

function Filter(){
	handleChart();
}

function jumlah_kehamilan(month,series_data){
	Highcharts.chart('jumlah_kehamilan', {
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
			categories: month,
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
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
			name: 'Jumlah Produksi',
			data: series_data

		}]
	});
}

function kasus_keguguran(series_data){
	Highcharts.chart('kasus_keguguran', {
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
			pointFormat: '{series.name}: <b>{point.y}</b>'
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
			name: 'Jumlah',
			colorByPoint: true,
			data: series_data
		}]
	});
}

function jumlah_persalinan(month,series_data){
	Highcharts.chart('jumlah_persalinan', {
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
			categories: month,
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
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

function status_persalinan_bayi(month,series_data){
	Highcharts.chart('status_persalinan_bayi', {
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
			categories: month,
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah (Ton)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
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

function status_persalinan_ibu(month,series_data){
	Highcharts.chart('status_persalinan_ibu', {
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
			categories: month,
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah (Ton)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
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