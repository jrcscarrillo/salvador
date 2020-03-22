{{ content() }} {% include "layouts/cabecera.volt" %}
<div id="map_canvas"></div>

<div class="wrapper solid-form">

    <div class="l-container w-50" id="solid-formve-container">

        <div class="l-row">

            <div class="l-col-12">
                <div class="form-body pad-0">
                    {{ form("geocliente/centro") }}
                    <fieldset>
                        <legend> MENSAJES INFORMATIVOS </legend>
                        <section>
                            <div class="l-row">
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="longitud">  LONGITUD </label>
                                        <div class="l-pos-r">
                                            {{ longitud }}
                                        </div>
                                    </div>
                                </div>
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="latitud">  LATITUD </label>
                                        <div class="l-pos-r">
                                            {{ latitud}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="l-row">
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="mascliente">  DATOS ADICIONALES CLIENTE </label>
                                        <div class="l-pos-r">
                                            {{ mascliente }}
                                        </div>
                                    </div>
                                </div>
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="localcliente">  DATOS DEL LOCAL</label>
                                        <div class="l-pos-r">
                                            {{ localcliente }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </fieldset>
                    <footer>
                        {{ submit_button('Centro', 'id':'mapa', 'class': 'btn btn-primary') }}
                        <p class="help-block">Pruebas para geolocalizacion.</p>
                    </footer>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    var watchID;
    var geo; // for the geolocation object
    var map; // for the google map object
    var mapMarker; // the google map marker object
    var lat; // latitude
    var lon; // longitude
    var resultado = document.getElementById("resultado");
    var datos = document.getElementById("datos");
    var button = document.getElementById("mapa");
    var orig_button_value = button.value;
    // position options
    var MAXIMUM_AGE = 200; // miliseconds
    var TIMEOUT = 300000;
    var HIGHACCURACY = true;

    function postResult(value) {
        datos.innerHTML = value;
        resultado.style.display = 'block';
    }

    function clearResult() {
        datos.innerHTML = '';
        resultado.style.display = 'none';
    }

    function disableSubmitButton() {
        button.disabled = true;
        button.value = 'Loading...';
    }

    function enableSubmitButton() {
        button.disabled = false;
        button.value = orig_button_value;
    }

    function showSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'block';
    }

    function hideSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = 'none';
    }

    function clearErrors() {

    }

    function getGeoLocation() {
        try {
            if (!!navigator.geolocation)
                return navigator.geolocation;
            else
                return undefined;
        } catch (e) {
            return undefined;
        }
    }

    function show_map(position) {
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        var latlng = new google.maps.LatLng(lat, lon);

        if (map) {
            map.panTo(latlng);
            mapMarker.setPosition(latlng);
        } else {
            var myOptions = {
                zoom: 18,
                center: latlng,

                // mapTypeID --
                // ROADMAP displays the default road map view
                // SATELLITE displays Google Earth satellite images
                // HYBRID displays a mixture of normal and satellite views
                // TERRAIN displays a physical map based on terrain information.
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            map.setTilt(0); // turns off the annoying default 45-deg view

            mapMarker = new google.maps.Marker({
                position: latlng,
                title: "You are here."
            });
            mapMarker.setMap(map);
            alert('Estos son los resultados = Longitud : ' + lon + ' latitud : ' + lat);
            iniciaajax();
        }
    }

    function iniciaajax() {

        clearResult();
        clearErrors();
        showSpinner();
        disableSubmitButton();

        var g_lon = document.getElementById("longitude");
        var g_lat = document.getElementById("lattitude");
        g_lon.value = lon;
        g_lat.value = lat;

        var xhr = new XMLHttpRequest(); {# // do not set content-type with FormData
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');#
        }
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
        xhr.open('POST', 'mensajes.php', true);
        xhr.onreadystatechange = function() {
            console.log('readyState: ' + xhr.readyState);
            if (xhr.readyState == 2) {
                datos.innerHTML = 'Loading...';
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                datos.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    }

    function geo_error(error) {
        stopWatching();
        switch (error.code) {
            case error.TIMEOUT:
                alert('Geolocation Timeout');
                break;
            case error.POSITION_UNAVAILABLE:
                alert('Geolocation Position unavailable');
                break;
            case error.PERMISSION_DENIED:
                alert('Geolocation Permission denied');
                break;
            default:
                alert('Geolocation returned an unknown error code: ' + error.code);
        }
    }

    function stopWatching() {
        if (watchID)
            geo.clearWatch(watchID);
        watchID = null;
    }

    function startWatching() {
        watchID = geo.watchPosition(show_map, geo_error, {
            enableHighAccuracy: HIGHACCURACY,
            maximumAge: MAXIMUM_AGE,
            timeout: TIMEOUT
        });
    }

    window.onload = function() {
        if ((geo = getGeoLocation())) {
            startWatching();
        } else {
            alert('Geolocation not supported.')
        }
    }

    button.addEventListener("click", function(event) {
        event.preventDefault();
    })
</script>