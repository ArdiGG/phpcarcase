// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {

    let addr = $('.address').val();
    addr = addr.split(', ')

    let makeMarker = true;

    if (addr.length < 2) {
        addr[0] = 47.82000917546631;
        addr[1] = 35.16870596190239;
        makeMarker = false;
    }

    let mapOptions = {
        zoom: 11,

        center: new google.maps.LatLng(addr[0], addr[1]),

        styles: [{
            "featureType": "all",
            "elementType": "geometry.fill",
            "stylers": [{"weight": "2.00"}]
        }, {
            "featureType": "all",
            "elementType": "geometry.stroke",
            "stylers": [{"color": "#9c9c9c"}]
        }, {
            "featureType": "all",
            "elementType": "labels.text",
            "stylers": [{"visibility": "on"}]
        }, {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [{"color": "#f2f2f2"}]
        }, {
            "featureType": "landscape",
            "elementType": "geometry.fill",
            "stylers": [{"color": "#ffffff"}]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry.fill",
            "stylers": [{"color": "#ffffff"}]
        }, {"featureType": "poi", "elementType": "all", "stylers": [{"visibility": "off"}]}, {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{"saturation": -100}, {"lightness": 45}]
        }, {
            "featureType": "road",
            "elementType": "geometry.fill",
            "stylers": [{"color": "#eeeeee"}]
        }, {
            "featureType": "road",
            "elementType": "labels.text.fill",
            "stylers": [{"color": "#7b7b7b"}]
        }, {
            "featureType": "road",
            "elementType": "labels.text.stroke",
            "stylers": [{"color": "#ffffff"}]
        }, {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [{"visibility": "simplified"}]
        }, {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{"visibility": "off"}]
        }, {
            "featureType": "water",
            "elementType": "all",
            "stylers": [{"color": "#46bcec"}, {"visibility": "on"}]
        }, {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [{"color": "#c8d7d4"}]
        }, {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [{"color": "#070707"}]
        }, {"featureType": "water", "elementType": "labels.text.stroke", "stylers": [{"color": "#ffffff"}]}]
    };

    let mapElement = document.getElementById('map');

    let map = new google.maps.Map(mapElement, mapOptions);

    let marker;

    if (makeMarker) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(addr[0], addr[1]),
            map: map
        });
    }
    map.addListener("click", (e) => {
        if (marker) {
            marker.setMap(null)
        }
        marker = placeMarkerAndPanTo(e.latLng, map);

        $('.address').val(e.latLng);
    });


}

function placeMarkerAndPanTo(latLng, map) {
    let marker = new google.maps.Marker({
        position: latLng,
        map: map,
    });

    map.panTo(latLng);

    return marker
}
