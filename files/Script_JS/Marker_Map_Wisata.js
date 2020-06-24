var markersWisata = new Array();
var currWindowWisata = false;

function actionVenueWisata(data) {
	var type = data.node.original.value_id;
    if(data.node.state.checked){
        if(markersWisata.length > 0){
            handleShowMarkerWisata();
        }else{
            handleDataMarkerWisata(type);
        }
    }else{
        handleDeleteMarkerWisata(false);
    }
}

var handleDataMarkerWisata = function (type) {
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
                            url : base_url + 'files/assets/icon/icon_marker_wisata.png',
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
        markersWisata.push(marker);
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
            if( currWindowWisata ) {
                currWindowWisata.close();
            }
            mapDefault.panTo(latlng);
            currWindowWisata= infowindow;
            infowindow.open(mapDefault, marker);
        });

        return marker;
    }
};

var handleShowMarkerWisata = function () {
    "use strict";
    for (var i = 0; i < markersWisata.length; i++) {   
        markersWisata[i].setMap(mapDefault);
    }
}

var handleDeleteMarkerWisata = function (clearArray) {
    "use strict";
    for (var i = 0; i < markersWisata.length; i++) {
        markersWisata[i].setMap(null);
    }
    if(clearArray){
        markersWisata = new Array();
    }
};