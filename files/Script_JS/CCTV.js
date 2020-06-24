/*   
Filename: cctv-data.js
Target: CCTV
*/
var handleDataTableCCTV = function () {
    "use strict";
    0 !== $("#data-table-cctv").length && $("#data-table-cctv").DataTable({
        lengthMenu: [20, 40, 60],
        fixedHeader: {
            header: !0,
            headerOffset: $("#header").height()
        },
        responsive: !0,
        "columnDefs": [
            { "orderable": false, "targets": 6 }
        ],
    });
};

var handleMapForm = function (){
    //Clear
    $("#keyword").val("");
    $("#preview_position").html("");
    $("#preview_address").html("");
    $("#p_lat").val("");
    $("#p_long").val("");
    $("#p_desc").val("");
    //End Clear

    var map_options = {
        center: new google.maps.LatLng(0.811826, 101.798066),
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"), map_options);

    var input = document.getElementById("keyword");
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo("bounds", map);

    var marker = new google.maps.Marker(
        {
            map: map,
            draggable:true,
            animation: google.maps.Animation.DROP
        }
    );

    google.maps.event.addListener(autocomplete, "place_changed", function(event)
    {
        var place = autocomplete.getPlace();

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(25);
        }

        marker.setPosition(place.geometry.location);
        geocodePosition(marker.getPosition(),place.geometry.location.lat(),place.geometry.location.lng());
    });
    
    google.maps.event.addListener(marker, 'dragend', function(event) 
    {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        geocodePosition(marker.getPosition(),lat,lng);
    });
    
    google.maps.event.addListener(map, "click", function(event)
    {
        marker.setPosition(event.latLng);
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        geocodePosition(marker.getPosition(),lat,lng);
    });

    function geocodePosition(pos,latitude,longitude){
        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            latLng: pos
        }, function(results, status){    
            if (status == google.maps.GeocoderStatus.OK){
                $("#preview_position").html("Posisi : [" + latitude + "," + longitude + "]");
                $("#preview_address").html(results[0].formatted_address);
                $("#p_lat").val(latitude);
                $("#p_long").val(longitude);
                $("#p_desc").val(results[0].formatted_address);
            }else{
                console.log("Not Found");
            }
        }); 
    }

    $('#choose_location').on('click', function(){
        latitude    = $("#p_lat").val();
        longitude   = $("#p_long").val();
        address     = $("#p_desc").val();

        $("#latitude").val(latitude);
        $("#longitude").val(longitude);
        $("#location_detail").val(address);
    });
}

var CCTV = function () {
    "use strict";
    return {
        init: function () {
            handleDataTableCCTV();
            handleMapForm();
        }
    }
}();

function Delete_Data(id){
	swal({
	  title: "Konfirmasi?",
	  text: "Hapus Data CCTV!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Ya, Hapus!",
	  closeOnConfirm: false
	},
	function(){
	  window.location.href = base_url + "CCTV/Delete/" + id;
	});
}