{{ content() }} {% include "layouts/cabecera.volt" %}
<div class="row full-width">

    <div class="col-md-6">
        {{ form('geocliente/codificar', 'role': 'form', 'class': 'sky-form') }} >
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Longitud</label>
                    <div class="col col-4">
                        <label class="input">
                            <input type="text" id="longitude" name="longitud">
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-2">Latitud</label>
                    <div class="col col-4">
                        <label class="input">
                            <input type="text" id="latitude" name="latitud">
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-2">Mas sobre el cliente</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ text_field('mascliente', ['id':'mascliente']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-2">Descripcion del Local</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ text_field('localcliente', ['id':'localcliente']) }}
                        </label>
                    </div>
                </div>
            </section>
        </fieldset>
        <footer>
            {{ submit_button('Enviar', 'class': 'btn btn-primary') }}
            <p class="help-block">Agregara una nueva geo direccion para este cliente.</p>
        </footer>
        </form>
    </div>
    <div class="col-md-6">
        <div id="map_canvas"></div>
    </div>
</div>
</div>
<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    var map, infoWindow;

    function initMap() {
        var coqueiros = new google.maps.LatLng(-0.1441086, -78.47768);
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: coqueiros,
            zoom: 18
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                const jslong = position.coords.longitude;
                const jslati = position.coords.latitude;
                document.getElementById('longitude').setAttribute("value", jslong);
                document.getElementById('latitude').setAttribute("value", jslati);

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {

        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>