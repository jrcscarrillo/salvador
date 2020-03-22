{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div id="map_canvas"></div>

<div class="row full-width">

    <div class="col-md-6">
        {{ form('geocliente/codificar', 'role': 'form', 'class': 'sky-form') }}
        <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
        <fieldset>
            <section>
                <div class="row">
                    <label class="label col col-2">Longitud</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ text_field('longitud', ['id':'longitude']) }}
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <label class="label col col-2">Latitud</label>
                    <div class="col col-4">
                        <label class="input">
                            {{ text_field('latitud', ['id':'latitude']) }}
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
            <input type="checkbox" onclick="initMap()" />
            <p class="help-block">Haga click para pasar la posicion geologica al sistema.</p>
            {{ submit_button('Enviar', 'class': 'btn btn-primary') }}
            <p class="help-block">Agregara una nueva descripcion.</p>
        </footer>
        </form>
    </div>
    {% include "layouts/pie.volt" %}
</div>
<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.


    function initMap() {
        var map, infoWindow;
        var coqueiros = new google.maps.LatLng(-0.1441086, -78.47768);
        var windsor = new google.maps.LatLng(43.238292, -89.373629);
        var long;
        var lati;
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: windsor,
            zoom: 18
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {

                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                long = position.coords.longitude;
                lati = position.coords.latitude;
                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
                alert('Estas son las coordenadas = Longitud : ' + long + ' Latitud : ' + lati);
                document.getElementById('longitud').value = long;
                document.getElementById('latitud').value = lati;
            }, function () {
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
