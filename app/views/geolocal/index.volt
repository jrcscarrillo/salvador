{% include "layouts/cabecera.volt" %}
{{ content() }}
{% block cuerpo %}
    <div id="map_canvas"></div>
    <div id="floating-panel">
        <div id="cliente">{{ cliente }} </div>
        <input id="ID" type="hidden" value="{{ ID }}">
        <input id="address" type="textbox" value="{{ address }}">
        <input id="submit" type="button" value="Geocode">
    </div>
</div>
{% endblock %}
<script>
    // In the following example, markers appear when the user clicks on the map.
    // The markers are stored in an array.
    // The user can then click an option to hide, show or delete the markers.
    var map;
    var markers = [];
    var forma1 = '<div class="row full-width"><div class="col-md-6"><form action="/aurora.simple/geocliente/codificar/" method="post"><fieldset><section>';
    var field1 = '<div class="row"><label class="label col col-1">Cliente</label><div class="col col-2"><input id="id", name="id" value="';
    var inputcliente;
    var field2 = '" ></div></div><div class="row"><label class="label col col-1">Longitud</label><div class="col col-2"><input id="longitude", name="longitud" value="';
    var inputlongitud;
    var field3 = '" ></div></div><div class="row"><label class="label col col-1">Latitud</label><div class="col col-2"><input id="latitude", name="latitud" value="';
    var inputlatitud;
    var field4 = '"></div></div><div class="row"><label class="label col col-1">Mas sobre el cliente</label><div class="col col-2"><input id="mascliente", name="mascliente" value="';
    var inputmascliente;
    var field5 = '"></div></div><div class="row"><label class="label col col-1">Descripcion del Local</label><div class="col col-2"><input id="local", name="local" value="';
    var inputlocal;
    var field6 = '"></div></div></section></fieldset><footer>' +
            '<input type="submit" id="enviar", name="enviar" ><p class="help-block">Agregara una nueva descripcion.</p></footer></form></div></div>';
    var forma = '<div class="row full-width"><div class="col-md-1"><form action="codificar" method="post">' +
            '<fieldset><section><div class="row"><label class="label col col-4">Longitud</label><div class="col col-8"><label class="input">' +
            '<input id="longitude", name="longitud" ></label></div></div></section><section><div class="row"><label class="label col col-4">Latitud</label>' +
            '<div class="col col-8"><label class="input"><input id="latitude", name="latitud" ></label></div></div></section><section>' +
            '<div class="row"><label class="label col col-4">Mas sobre el cliente</label><div class="col col-8"><label class="input"><input id="mascliente", name="mascliente" >' +
            '</label></div></div></section><section><div class="row"><label class="label col col-4">Descripcion del Local</label><div class="col col-8">' +
            '<label class="input"><input id="longitude", name="longitud" ></label></div></div></section></fieldset><footer>' +
            '<input type="submit" id="enviar", name="enviar" ><p class="help-block">Agregara una nueva descripcion.</p></footer></form></div></div>';
    function initMap() {
        var ecuador = {lat: -0.216251, lng: -78.489381};
        var DeForest = {lat: 43.2259665, lng: -89.4059462};
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 18,
            center: ecuador,
            mapTypeId: 'terrain'
        });
        var geocoder = new google.maps.Geocoder();
        document.getElementById('submit').addEventListener('click', function () {
            geocodeAddress(geocoder, map);
        });


    }

    function geocodeAddress(geocoder, resultsMap) {
        var landl;
        var infowindow = new google.maps.InfoWindow({
            content: forma
        });
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
                landl = marker.getPosition();
                inputlongitud = landl.lng();
                inputlatitud = landl.lat();
                inputcliente = document.getElementById('ID').value;
                inputmascliente = 'Ponga mas datos sobre el cliente';
                inputlocal = 'Ponga mas datos sobre el local';
                var contenido = forma1 + field1 + inputcliente + field2 + inputlongitud + field3 + inputlatitud + field4 + inputmascliente + field5 + inputlocal + field6;
                infowindow.setContent(contenido);
                infowindow.open(map, marker);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    function guardarMapa() {
        var i = 0;
        var landl;
        var longitud;
        var latitud;
        var marker;
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow({
            content: forma
        });
        for (i = 0; i < markers.length; i++) {
    {#            markers[i].setMap(map);#}
                landl = markers[i].getPosition();
                longitud = landl.lng();
                latitud = landl.lat();
                marker = markers[i];
                alert("Coordenadas del marcador Nro. => " + i + " Longitud =>  " + longitud + " Latitud => " + latitud);
                geocoder.geocode({'location': landl}, function (results, status) {
                    if (status === 'OK') {
                        map.setZoom(15);
                        marker = new google.maps.Marker({
                            position: landl,
                            map: map
                        });
                        var contenido = forma + '<div>' + results[0].formatted_address + '</div>';
                        infowindow.setContent(contenido);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                });
            }
        }

        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Shows any markers currently in the array.
        function showMarkers() {
            setMapOnAll(map);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        function GeneraControl(controlDiv, map, center) {

            // Set CSS for the control border.
            var generaUI = document.createElement('div');
            generaUI.style.backgroundColor = '#fff';
            generaUI.style.border = '2px solid #fff';
            generaUI.style.borderRadius = '3px';
            generaUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            generaUI.style.cursor = 'pointer';
            generaUI.style.marginBottom = '22px';
            generaUI.style.textAlign = 'center';
            generaUI.title = 'Click para generar direccion';
            controlDiv.appendChild(generaUI);

            // Set CSS for the control interior.
            var generaText = document.createElement('div');
            generaText.style.color = 'rgb(25,25,25)';
            generaText.style.fontFamily = 'Roboto,Arial,sans-serif';
            generaText.style.fontSize = '16px';
            generaText.style.lineHeight = '38px';
            generaText.style.paddingLeft = '5px';
            generaText.style.paddingRight = '5px';
            generaText.innerHTML = 'Genera Direccion';
            generaUI.appendChild(generaText);
            // Setup the click event listeners: simply set the map to Chicago.
            generaUI.addEventListener('click', function () {
                guardarMapa();
                map.setCenter(center);
            });
        }

        function EliminaControl(controlDiv, map, center) {
            // Set CSS for the control border.
            var eliminaUI = document.createElement('div');
            eliminaUI.style.backgroundColor = '#fff';
            eliminaUI.style.border = '2px solid #fff';
            eliminaUI.style.borderRadius = '3px';
            eliminaUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            eliminaUI.style.cursor = 'pointer';
            eliminaUI.style.marginBottom = '22px';
            eliminaUI.style.textAlign = 'center';
            eliminaUI.title = 'Click para eliminar marcadores';
            controlDiv.appendChild(eliminaUI);

            // Set CSS for the control interior.
            var eliminaText = document.createElement('div');
            eliminaText.style.color = 'rgb(25,25,25)';
            eliminaText.style.fontFamily = 'Roboto,Arial,sans-serif';
            eliminaText.style.fontSize = '16px';
            eliminaText.style.lineHeight = '38px';
            eliminaText.style.paddingLeft = '5px';
            eliminaText.style.paddingRight = '5px';
            eliminaText.innerHTML = 'Elimina Marcadores';
            eliminaUI.appendChild(eliminaText);

            // Setup the click event listeners: simply set the map to Chicago.
            eliminaUI.addEventListener('click', function () {
                deleteMarkers();
                map.setCenter(center);
            });

        }

        function MostrarControl(controlDiv, map, center) {

            // Set CSS for the control border.
            var mostrarUI = document.createElement('div');
            mostrarUI.style.backgroundColor = '#fff';
            mostrarUI.style.border = '2px solid #fff';
            mostrarUI.style.borderRadius = '3px';
            mostrarUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            mostrarUI.style.cursor = 'pointer';
            mostrarUI.style.marginBottom = '22px';
            mostrarUI.style.textAlign = 'center';
            mostrarUI.title = 'Click para mostrar marcadores';
            controlDiv.appendChild(mostrarUI);

            // Set CSS for the control interior.
            var mostrarText = document.createElement('div');
            mostrarText.style.color = 'rgb(25,25,25)';
            mostrarText.style.fontFamily = 'Roboto,Arial,sans-serif';
            mostrarText.style.fontSize = '16px';
            mostrarText.style.lineHeight = '38px';
            mostrarText.style.paddingLeft = '5px';
            mostrarText.style.paddingRight = '5px';
            mostrarText.innerHTML = 'Mostrar Marcadores';
            mostrarUI.appendChild(mostrarText);

            // Setup the click event listeners: simply set the map to Chicago.
            mostrarUI.addEventListener('click', function () {
                showMarkers();
                map.setCenter(center);
            });

        }

        function opciones() {
            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function (event) {
                addMarker(event.latLng);
            });
            // Adds a marker at the center of the map.
    {#        addMarker(ecuador);#}
            // Create the DIV to hold the control and call the CenterControl()
            // constructor passing in this DIV.
            var generaControlDiv = document.createElement('div');
            var generaControl = new GeneraControl(generaControlDiv, map, ecuador);

            generaControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(generaControlDiv);

            var eliminaControlDiv = document.createElement('div');
            var eliminaControl = new EliminaControl(eliminaControlDiv, map, ecuador);

            eliminaControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(eliminaControlDiv);

            var mostrarControlDiv = document.createElement('div');
            var mostrarControl = new MostrarControl(mostrarControlDiv, map, ecuador);

            mostrarControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(mostrarControlDiv);
        }
</script>