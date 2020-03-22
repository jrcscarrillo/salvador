{{ content() }} {% include "layouts/cabecera.volt" %}
<div class="row" style="display: none">
    <table id="clientes" class="table table-bordered">
        {% for geocliente in geoclientes %}
        <tr>
            <td>{{ geocliente.getCustomerreflistid() }}</td>
            <td>{{ geocliente.getCustomerreffullname() }}</td>
            <td>{{ geocliente.getSalesrepreflistid() }}</td>
            <td>{{ geocliente.getSalesrepreffullname() }}</td>
            <td>{{ geocliente.getCustomermoreinfo() }}</td>
            <td>{{ geocliente.getLatitude() }}</td>
            <td>{{ geocliente.getLongitude() }}</td>
            <td>{{ geocliente.getAddress() }}</td>
            <td>{{ geocliente.getFeatured() }}</td>

        </tr>
        {% endfor %}
    </table>
</div>
<div id="floating-panel">
    <input onclick="clearMarkers();" type=button value="Hide Markers">
    <input onclick="showMarkers();" type=button value="Show All Markers">
    <input onclick="deleteMarkers();" type=button value="Delete Markers">
</div>
<div id="map_canvas"></div>
<script>
    var map, infoWindow;
    var marcas = [];

    function deleteMarkers() {
        var myLatLng = {
            lat: -0.1976840,
            lng: -78.4843903
        };
        var myLatLng1 = {
            lat: -0.2085306,
            lng: -78.4900131
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 12,
            center: myLatLng
        });
        var marker1 = new google.maps.Marker({
            position: myLatLng1,
            map: map,
            title: 'El Morlan'
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });


    }

    function clearMarkers() {

    }

    function showMarkers() {
        let table = document.getElementById("clientes");

        for (let i = 0; i < table.rows.length; i++) {

            let icono = 'https://www.carrillosteam.com/public/coop/images/logos/map_pin.png';
            let row = table.rows[i];
            let longitud = row.cells[5].innerHTML;
            let latitud = row.cells[6].innerHTML;
            let cliente = row.cells[1].innerHTML;
            var geolocation = new google.maps.LatLng(latitud, longitud);
            var marker = new google.maps.Marker({
                map: map,
                position: geolocation,
                icon: icono
            });
            marcas.push(marker);
            marker.addListener('click', function() {
                map.panTo(marker.position);
                var contenido = '<div><strong>' + cliente + '</strong><br>';
                contenido += '<span> LONGITUD: ' + longitud + '</span><br>';
                contenido += '<span> LATITUD: ' + latitud + '</span>';
                infoWindow.setContent(contenido);
                infoWindow.open(map, marker);
            });
{#            alert('Longitud : ' + longitud + ' Latitud : ' + latitud + ' Cliente : ' + cliente);#}
        }
    }

    function initMap() {
        var coqueiros = new google.maps.LatLng(-0.2039710, -78.4862900);
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: coqueiros,
            zoom: 15
        });

        infoWindow = new google.maps.InfoWindow;
    }
</script>