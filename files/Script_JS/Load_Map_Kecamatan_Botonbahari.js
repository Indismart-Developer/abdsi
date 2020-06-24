function actionLoadKecamatanBotonBahari(data){
	if(data.node.state.checked){
        $.getJSON(base_url + "map_kecamatan_botonbahari.topojson.json", function(data){
			geoJsonObject = topojson.feature(data, data.objects.output)
			mapDefault.data.addGeoJson(geoJsonObject);
			
			mapDefault.data.addListener('click', function(event) {
				var content = "";
				 $.ajax({
					url: base_url +"Dashboard/GetVillageLocation",
					type: "POST",
					dataType: "json",
					data: {
						kelurahan_code: event.feature.getProperty("kelurahan")
					},
					success: function(res){
						var data = res[0];
						content = `<div class="card">
										<dl class="dl-horizontal">
											<dt>Lokasi</dt>
											<dd>` + data.VILLAGE_NAME + `</dd>
											<dt>Jumlah Populasi</dt>
											<dd>` + data.POPULATION + ` Jiwa</dd>
											<dt>Jumlah Populasi PRIA</dt>
											<dd>` + data.MALE + ` Jiwa</dd>
											<dt>Jumlah Populasi WANITA</dt>
											<dd>` + data.FEMALE + ` Jiwa</dd>
											<dt>Luas Wilayah Pertanian</dt>
											<dd>` + data.LUAS_WILAYAH_PERTANIAN + `</dd>
											<dt>Jumlah Petani</dt>
											<dd>` + data.JUMLAH_PETANI + `</dd>
											<dt>Hasil Panen</dt>
											<dd>` + data.HASIL_PANEN + `</dd>
											<dt>Penyerapan Dana Desa</dt>
											<dd>` + data.PENYERAPAN_DANA_DESA + `</dd>
										</dl>
									</div>`;
						infoWindow.setContent(content);
					},
					error: function(error){
						console.log(error)
					}
				});		
				var anchor = new google.maps.MVCObject();
				anchor.set("position",event.latLng);
				infoWindow.open(mapDefault,anchor);
			});
			
			mapDefault.setZoom(13);
			mapDefault.setCenter({lat: -5.544938, lng: 120.409701});
			
			mapDefault.data.setStyle(function(featurekelurahanok) {
				var kelurahan = featurekelurahanok.getProperty('kelurahan');
				var colorkelurahan ="";

				if (kelurahan != "") {
					colorkelurahan = "#fff";
				}if (kelurahan == "11") {
					var fillColorKec = "#f0af8f";
				}if (kelurahan == "12") {
					var fillColorKec = "#fa8e9b";
				}if (kelurahan == "13") {
					var fillColorKec = "#61f757";
				}if (kelurahan == "14") {
					var fillColorKec = "#793187";
				}if (kelurahan == "15") {
					var fillColorKec = "#533b85";
				}if (kelurahan == "16") {
					var fillColorKec = "#cef109";
				}if (kelurahan == "17") {
					var fillColorKec = "#e57d29";
				}if (kelurahan == "18") {
					var fillColorKec = "#4caae6";
				}
				
				return {
					fillColor: fillColorKec,
					strokeWeight: 1,
					strokeOpacity: 50,
					zIndexOffset: 0,
					zIndex:0,
					strokeColor: colorkelurahan,
				}
			  });
		});
    }else{
		mapDefault.data.forEach(function (feature) {
			mapDefault.data.remove(feature);
		});
    }
}