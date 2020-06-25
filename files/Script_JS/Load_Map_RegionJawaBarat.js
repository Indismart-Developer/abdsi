function actionLoadRegionJawaBarat(data){
	if(data.node.state.checked){
        $.getJSON(base_url + "files/json/jawabarat.json", function(data){
			geoJsonObject = topojson.feature(data, data.objects.collection)
			mapDefault.data.addGeoJson(geoJsonObject);
			
			mapDefault.data.addListener('click', function(event) {
				infoWindow.setContent('<div style="line-height:1.35;overflow:hidden;white-space:nowrap;font-size:14px;"> '+"Wilayah <b>" + event.feature.getProperty("kemendagri_nama") + "</b></div>");
				var anchor = new google.maps.MVCObject();
				anchor.set("position",event.latLng);
				infoWindow.open(mapDefault,anchor);
			});
			
			mapDefault.setZoom(8);
			mapDefault.setCenter({lat: -6.921820, lng: 107.640979});
			
			mapDefault.data.setStyle(function(featureProvinsiok) {
				const color = ["#fa8e9b","#61f757","#793187","#533b85","#cef109","#e57d29","#4caae6","#e64c6c","#5cf6f1","#f96262","#f750e9","#784ee2","#7ab6f2","#75d7e6","#5aebbd","#42f077","#c1d346","#e21414","#a27070","#47d758","#262db6","#2ce5e7"];
				const fillColorKec = color[Math.floor(Math.random() * color.length)];
				
				return {
					fillColor: fillColorKec,
					strokeWeight: 1,
					strokeOpacity: 50,
					zIndexOffset: 0,
					zIndex:0,
					strokeColor: "#fff"
				}
			  });
		});
    }else{
		mapDefault.data.forEach(function (feature) {
			mapDefault.data.remove(feature);
		});
    }
}