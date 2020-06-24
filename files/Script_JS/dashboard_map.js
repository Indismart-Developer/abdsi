/* Show Map */

var mapDefault;
var geoJsonObject;

infoWindow = new google.maps.InfoWindow({
    content: ""
});

var handleGoogleMapSetting = function() {
    "use strict";

    function initialize() {
        var mapOptions = {
            zoom: 5,
            center: new google.maps.LatLng(-2.846445, 118.829611),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            styles: [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#293036"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}],
        };

        mapDefault = new google.maps.Map(document.getElementById('google-map-default'), mapOptions);
    }
    initialize();

    $(window).resize(function() {
        google.maps.event.trigger(mapDefault, "resize");
    });
    $('#content').addClass('content-inverse-mode');
    
    var defaultMapStyles = [];
    var flatMapStyles = [{"stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road.arterial","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.highway","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"landscape","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]},{},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]}]; 
    var turquoiseWaterStyles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill"},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#7dcdcd"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}];
    var icyBlueStyles = [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];
    var oldDryMudStyles = [{"featureType":"landscape","stylers":[{"hue":"#FFAD00"},{"saturation":50.2},{"lightness":-34.8},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFAD00"},{"saturation":-19.8},{"lightness":-1.8},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FFAD00"},{"saturation":72.4},{"lightness":-32.6},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFAD00"},{"saturation":74.4},{"lightness":-18},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00FFA6"},{"saturation":-63.2},{"lightness":38},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#FFC300"},{"saturation":54.2},{"lightness":-14.4},{"gamma":1}]}];
    var cobaltStyles  = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#293036"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];
    var darkRedStyles   = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#000000"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];
    

    $('[data-map-theme]').click(function() {
        var targetTheme = $(this).attr('data-map-theme');
        var targetLi = $(this).closest('li');
        var targetText = $(this).text();
        var inverseContentMode = false;
        $('#map-theme-selection li').not(targetLi).removeClass('active');
        $('#map-theme-text').text(targetText);
        $(targetLi).addClass('active');
        switch(targetTheme) {
            case 'flat':
                mapDefault.setOptions({styles: flatMapStyles});
                break;
            case 'turquoise-water':
                mapDefault.setOptions({styles: turquoiseWaterStyles});
                break;
            case 'icy-blue':
                mapDefault.setOptions({styles: icyBlueStyles});
                break;
            case 'cobalt':
                mapDefault.setOptions({styles: cobaltStyles});
                inverseContentMode = true;
                break;
            case 'old-dry-mud':
                mapDefault.setOptions({styles: oldDryMudStyles});
                break;
            case 'dark-red':
                mapDefault.setOptions({styles: darkRedStyles});
                inverseContentMode = true;
                break;
            default:
                mapDefault.setOptions({styles: defaultMapStyles});
                break;
        }

        if (inverseContentMode === true) {
            $('#content').addClass('content-inverse-mode');
        } else {
            $('#content').removeClass('content-inverse-mode');
        }
    });
};

var DashboardMap = function () {
    "use strict";
    return {
        //main function
        init: function () {
            handleGoogleMapSetting();
        }
    };
}();
/* End Show Map */

/* Treeview Filter Map */
var handleJstreeCheckable = function() {
    $('#jstree-checkable-map').jstree({
        'plugins': ["wholerow", "checkbox", "types"],
        'core': {
            "themes": {
                "responsive": false
            },    
            'data': [
				{
                    "text": "Batas Administrasi",
                    "icon": false,
                    "a_attr": {"class":"no_checkbox"},
                    "state": {
                        "disabled": !0
                    },
                    "children": [
                        {
                            "id": "kecamatan_all",
                            "text": "Semua Kecamatan",
                            "icon": false,
                            "li_attr": { "class": "smaller-margins" }
                        },
						{
                            "id": "kecamatan_botonbahari",
                            "text": "Kecamatan Boton Bahari",
                            "icon": false,
                            "li_attr": { "class": "smaller-margins" }
                        }
                    ]
                },
                {
                    "text": "CCTV",
                    "icon": false,
                    "a_attr": {"class":"no_checkbox"},
                    "state": {
                        "disabled": !0
                    },
                    "children": [
                        {
                            "id": "cctv_filter_all",
                            "text": "Semua CCTV",
                            "icon": false,
                            "li_attr": { "class": "smaller-margins" }
                        }
                    ]
                },
				{
                    "text": "Lokasi",
                    "icon": false,
                    "a_attr": {"class":"no_checkbox"},
                    "state": {
                        "disabled": !0
                    },
                    "children": [
                        {
                            "id": "location_rumah_sakit",
                            "text": "Fasilitas Kesehatan",
                            "icon": false,
							"value_id": 1,
                            "li_attr": { "class": "smaller-margins" }
                        },
						/* {
                            "id": "location_kantor_layanan",
                            "text": "Kantor Polisi",
                            "icon": false,
							"value_id": 2,
                            "li_attr": { "class": "smaller-margins" }
                        },
						{
                            "id": "location_distrik",
                            "text": "Kantor Pemerintahan",
                            "icon": false,
							"value_id": 3,
                            "li_attr": { "class": "smaller-margins" }
                        }, */
						{
                            "id": "location_wisata",
                            "text": "Tempat Wisata",
                            "icon": false,
							"value_id": 4,
                            "li_attr": { "class": "smaller-margins" }
                        }
                    ]
                }
        ]},
        "checkbox": {       
          "three_state" : false, // to avoid that fact that checking a node also check others
          "whole_node" : false,  // to avoid checking the box just clicking the node 
          "tie_selection" : false // for checking without selecting and selecting without checking
        },
        "types": {
            "default": {
                "icon": "fa fa-folder text-primary fa-lg"
            },
            "file": {
                "icon": "fa fa-file text-success fa-lg"
            }
        }
    })
    .on("check_node.jstree uncheck_node.jstree", function(e, data) {
        switch (data.node.id) {
			case "cctv_filter_all":
                actionCCTV(data); //CCTV Get
            break;
			
			case "location_rumah_sakit":
				actionVenueRumahSakit(data);
            break;
			
			case "location_kantor_layanan":
				actionVenueKantorLayanan(data);
            break;
			
			case "location_distrik":
				actionVenueDistrik(data);
            break;
			
			case "location_wisata":
				actionVenueWisata(data);
            break;
			
			case "kecamatan_all":
				actionLoadKecamatanAll(data);
			break;
			
			case "kecamatan_botonbahari":
				actionLoadKecamatanBotonBahari(data);
			break;
			
			
        }
    });
};

var TreeView = function () {
    "use strict";
    return {
        //main function
        init: function () {
            handleJstreeCheckable();
        }
    };
}();

/* End Treeview Filter Map */

/* Fullscreen Map */
var handleJsFullscreenMap = function() {
    $(document).on('click', '[data-click=fullscreen-map]', function(e) {
        e.preventDefault();
        $("#content .map").toggleClass( "fullscreenmap" );
        google.maps.event.trigger(mapDefault, "resize");
    });
}
var FullscreenMap = function () {
    "use strict";
    return {
        //main function
        init: function () {
            handleJsFullscreenMap();
        }
    };
}();
/* End Fullscreen Map */

var handleScrollMenuMap = function(){
    "use strict";
    $(".theme-panel-content").slimScroll({
        height: '300px',
        size: '10px',
        color: '#424242',
        railVisible: true,
        railColor: '#424242',
        railOpacity: 0.5,
        wheelStep: 10,
        allowPageScroll: false,
        disableFadeOut: false,
        zIndex: 1021
    });
}

var initMarkerClusterer = function(markers){
    var mcOptions = {
        gridSize: 50,
        maxZoom: 17, 
        imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
    };
    var markerCluster = new MarkerClusterer(mapDefault, markers, mcOptions);
    return markerCluster;
}

var clearMarkerClusterer = function(markerCluster){
    markerCluster.clearMarkers();
    // console.log('markerclear', markerCluster);
}

var handlesetModuleMap = function(){
    $('#setmodulemap').toggle( "slow" );
}

var handlesetStyleMap = function(){
    $('#setstylemap').toggle( "slow" );
}

var handlesetFullscreenMap = function(){
    $('#setfullscreenmap').toggle( "slow" );
}

var MapGoogle = function () {
    "use strict";
    return {
        //main function
        init: function () {
            handleGoogleMapSetting();
            handleScrollMenuMap();
            //handleGritter
            $.extend($.gritter.options, { 
                position: 'bottom-left', // defaults to 'top-right' but can be 'bottom-left', 'bottom-right', 'top-left', 'top-right' (added in 1.7.1)
            });    
        },
        realTime: function(){
            handleRealTimeMarker();
        },
        setModuleMap: function(){
            handlesetModuleMap();
        },
        setStyleMap: function(){
            handlesetStyleMap();
        },
        setFullscreenMap: function(){
            handlesetFullscreenMap();
        }
    };
}();