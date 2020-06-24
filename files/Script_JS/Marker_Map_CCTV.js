//CCTV
var markersCCTV = new Array();
var currWindowCCTV = false;

function actionCCTV(data) {
    if(data.node.state.checked){
        if(markersCCTV.length > 0){
            handleShowMarkerCCTV();
        }else{
            handleDataMarkerCCTV();
        }
    }else{
        handleDeleteMarkerCCTV(false);
    }
}

var handleDataMarkerCCTV = function () {
    "use strict";
    getData();
    
    // body...
    function getData() {
        $.ajax({
            url: base_url + "Stream_Data/getDataCCTV",
            type: "GET",
            dataType: "json",
            success: function(res){
                if(res!=null){
                    if(res.status){
                        var data = res.result;
                        var len = data.length;
                        if(len > 0){
                            var icon = {
                                url : base_url + 'files/assets/icon/icon_marker_cctv.png',
                                scaledSize: new google.maps.Size(50, 50)
                            };
                            for(var i=0; i < len; i++){
                                if(data[i].publish == 1){
                                    addMarker(data[i], icon);
                                }
                            }
                        }
                    }else{
                        console.log(res);
                    }
                }
            },
            error: function(error){
                console.log(error)
            }
        });
    }
    
    function addMarker(data,icon) {
        var lat = parseFloat(data.latitude);
        var lng = parseFloat(data.longitude);
        var latlng = new google.maps.LatLng(lat, lng);

        var marker = new google.maps.Marker({
            position: latlng,
            title: data.location_name,
            icon: icon,
            map: mapDefault
        });

        marker = addInfoWindows(marker, data, latlng);
        markersCCTV.push(marker);
        marker.setAnimation(4);
    }

    function addInfoWindows(marker, data, latlng) {
        // console.log(data);
        var contentString = `<div>
                                <div class="panel panel-inverse" data-sortable-id="table-basic-1">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <center>` +data.location_name + `</center>
                                        </h4>
                                    </div>
                                    <div class="panel-body">
										<p class="text-center">
											<b>Lokasi:</b> `+data.location_detail+`</br></br></br>
											<a href="javascript:;" onClick="StreamCCTV('`+data.location_name+`','`+data.source+`');" class="btn btn-success m-r-5"><i class="fa fa-play"></i> Play</a>
										</p>			
                                    </div>
                                </div>
                            </div>`;

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            width: 1000
        });

        marker.addListener('click', function() {
            if( currWindowCCTV ) {
                currWindowCCTV.close();
            }
            mapDefault.panTo(latlng);
            currWindowCCTV = infowindow;
            infowindow.open(mapDefault, marker);         
        });

        return marker;
    }
};

var handleShowMarkerCCTV = function () {
    "use strict";
    for (var i = 0; i < markersCCTV.length; i++) {
        markersCCTV[i].setMap(mapDefault);
    }
}

var handleDeleteMarkerCCTV = function (clearArray) {
    "use strict";
    for (var i = 0; i < markersCCTV.length; i++) {
        markersCCTV[i].setMap(null);
    }
    if(clearArray){
        markersCCTV = new Array();
    }
};

/*------ End Function CCTV -------*/

function StreamCCTV(name,cctv_src){
	$('#cctv_title').html(name);
	player.src({src: cctv_src});
	$('#StreamCCTVModal').modal('show');
}



