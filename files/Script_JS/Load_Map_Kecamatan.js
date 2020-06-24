function actionLoadKecamatanAll(data){
	if(data.node.state.checked){
        $.getJSON(base_url + "map_kecamatan.topojson.json", function(data){
			geoJsonObject = topojson.feature(data, data.objects.output)
			mapDefault.data.addGeoJson(geoJsonObject);
			
			mapDefault.data.addListener('click', function(event) {
				infoWindow.setContent('<div style="line-height:1.35;overflow:hidden;white-space:nowrap;font-size:14px;"> '+"KECAMATAN <b>" + event.feature.getProperty("kecamatan") + "</b></div>");
				var anchor = new google.maps.MVCObject();
				anchor.set("position",event.latLng);
				infoWindow.open(mapDefault,anchor);
			});
			
			mapDefault.setZoom(11);
			mapDefault.setCenter({lat: -5.414726, lng: 120.249874});
			
			mapDefault.data.setStyle(function(featureKecamatanok) {
				var kecamatan = featureKecamatanok.getProperty('kecamatan');
				var colorKecamatan ="";

				if (kecamatan != "") {
					colorKecamatan = "#fff";
				}if (kecamatan == "UJUNG BULU") {
					var fillColorKec = "#f0af8f";
				}if (kecamatan == "GANTARANG") {
					var fillColorKec = "#fa8e9b";
				}if (kecamatan == "KINDANG") {
					var fillColorKec = "#61f757";
				}if (kecamatan == "BULUKUMPA") {
					var fillColorKec = "#793187";
				}if (kecamatan == "RILAU ALE") {
					var fillColorKec = "#533b85";
				}if (kecamatan == "UJUNG LOE") {
					var fillColorKec = "#cef109";
				}if (kecamatan == "KAJANG") {
					var fillColorKec = "#e57d29";
				}if (kecamatan == "BONTOBAHARI") {
					var fillColorKec = "#4caae6";
				}if (kecamatan == "HERLANG") {
					var fillColorKec = "#e64c6c";
				}if (kecamatan == "BONTOTIRO") {
					var fillColorKec = "#5cf6f1";
				}
				
				
				return {
					fillColor: fillColorKec,
					strokeWeight: 1,
					strokeOpacity: 50,
					zIndexOffset: 0,
					zIndex:0,
					strokeColor: colorKecamatan,
				}
			  });
		});
    }else{
		mapDefault.data.forEach(function (feature) {
			mapDefault.data.remove(feature);
		});
    }
}