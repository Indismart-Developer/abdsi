var markersDistrik = new Array();
var currWindowDistrik = false;

function actionVenueDistrik(data) {
	var type = data.node.original.value_id;
    if(data.node.state.checked){
        if(markersDistrik.length > 0){
            handleShowMarkerDistrik();
        }else{
            handleDataMarkerDistrik(type);
        }
    }else{
        handleDeleteMarkerDistrik(false);
    }
}

var handleDataMarkerDistrik = function (type) {
    "use strict";
    getData();
	function getData() {
        $.ajax({
            url: base_url +"Dashboard/GetVenueLocation",
            type: "POST",
            dataType: "json",
			data: {
				type_id: type
			},
            success: function(res){
				if(res!=null){
                    var len = res.length;
                    if(len > 0){
                        var icon = {
                            url : base_url + 'files/assets/icon/icon_marker_rektek.png',
                            scaledSize: new google.maps.Size(50, 50)
                        };
                        for(var i=0; i < len; i++){
                            addMarker(res[i], icon);
                        }
                    }
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    }
	
	function addMarker(data,icon) {
        var lat = parseFloat(data.lat);
        var lng = parseFloat(data.lon);
        var latlng = new google.maps.LatLng(lat, lng);

        var marker = new google.maps.Marker({
            position: latlng,
            title: data.nama,
            icon: icon,
            map: mapDefault,
            optimized: false
        });

        marker = addInfoWindows(marker, data, latlng);
        markersDistrik.push(marker);
        marker.setAnimation(4);
    }
	
	function addInfoWindows(marker, data, latlng) {
        var contentString = `<div class="card">
								<div class="card-block">
									<b>` +data.nama + `</b>, ` +data.desc + `
								</div>
								<img src="`+ data.image +`" alt="" width="300px" class="media-object">
							</div>`;

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            width: 1000
        });

        marker.addListener('click', function() {
            if( currWindowDistrik ) {
                currWindowDistrik.close();
            }
            mapDefault.panTo(latlng);
            currWindowDistrik= infowindow;
            infowindow.open(mapDefault, marker);
        });

        return marker;
    }
};

var handleShowMarkerDistrik = function () {
    "use strict";
    for (var i = 0; i < markersDistrik.length; i++) {   
        markersDistrik[i].setMap(mapDefault);
    }
}

var handleDeleteMarkerDistrik = function (clearArray) {
    "use strict";
    for (var i = 0; i < markersDistrik.length; i++) {
        markersDistrik[i].setMap(null);
    }
    if(clearArray){
        markersDistrik = new Array();
    }
};