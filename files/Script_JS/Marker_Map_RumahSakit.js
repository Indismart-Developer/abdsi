var markersRumahSakit = new Array();
var currWindowRumahSakit = false;

function actionVenueRumahSakit(data) {
	var type = data.node.original.value_id;
    if(data.node.state.checked){
        if(markersRumahSakit.length > 0){
            handleShowMarkerRumahSakit();
        }else{
            handleDataMarkerRumahSakit(type);
        }
    }else{
        handleDeleteMarkerRumahSakit(false);
    }
}

var handleDataMarkerRumahSakit = function (type) {
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
                            url : base_url + 'files/assets/icon/marker_rs.png',
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
        markersRumahSakit.push(marker);
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
            if( currWindowRumahSakit ) {
                currWindowRumahSakit.close();
            }
            mapDefault.panTo(latlng);
            currWindowRumahSakit= infowindow;
            infowindow.open(mapDefault, marker);
        });

        return marker;
    }
};

var handleShowMarkerRumahSakit = function () {
    "use strict";
    for (var i = 0; i < markersRumahSakit.length; i++) {   
        markersRumahSakit[i].setMap(mapDefault);
    }
}

var handleDeleteMarkerRumahSakit = function (clearArray) {
    "use strict";
    for (var i = 0; i < markersRumahSakit.length; i++) {
        markersRumahSakit[i].setMap(null);
    }
    if(clearArray){
        markersRumahSakit = new Array();
    }
};