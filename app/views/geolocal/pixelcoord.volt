{{ content() }} {% include "layouts/cabecera.volt" %}
<div id="map_canvas"></div>

<script>
    var map;
    var TILE_SIZE = 256;

    function initMap() {
        var coqueiros = new google.maps.LatLng(-0.1441086, -78.47768);
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: coqueiros,
            zoom: 18
        });

        var coordInfoWindow = new google.maps.InfoWindow();
        coordInfoWindow.setContent(createInfoWindowContent(coqueiros, map.getZoom()));
        coordInfoWindow.setPosition(coqueiros);
        coordInfoWindow.open(map);

        map.addListener('zoom_changed', function() {
            coordInfoWindow.setContent(createInfoWindowContent(coqueiros, map.getZoom()));
            coordInfoWindow.open(map);
        });
    }

    function createInfoWindowContent(latLng, zoom) {
        var scale = 1 << zoom;

        var worldCoordinate = project(latLng);

        var pixelCoordinate = new google.maps.Point(
            Math.floor(worldCoordinate.x * scale),
            Math.floor(worldCoordinate.y * scale));

        var tileCoordinate = new google.maps.Point(
            Math.floor(worldCoordinate.x * scale / TILE_SIZE),
            Math.floor(worldCoordinate.y * scale / TILE_SIZE));

        return [
            'Los Coqueiros, Quito, AV El Morlan',
            'LatLng: ' + latLng,
            'Zoom level: ' + zoom,
            'World Coordinate: ' + worldCoordinate,
            'Pixel Coordinate: ' + pixelCoordinate,
            'Tile Coordinate: ' + tileCoordinate
        ].join('<br>');
    }


    // The mapping between latitude, longitude and pixels is defined by the web
    // mercator projection.
    function project(latLng) {
        var siny = Math.sin(latLng.lat() * Math.PI / 180);

        // Truncating to 0.9999 effectively limits latitude to 89.189. This is
        // about a third of a tile past the edge of the world tile.
        siny = Math.min(Math.max(siny, -0.9999), 0.9999);

        return new google.maps.Point(
            TILE_SIZE * (0.5 + latLng.lng() / 360),
            TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI)));
    }
</script>