{{ content() }} {% include "layouts/cabecera.volt" %}

<div class="wrapper solid-form">

    <div class="l-container w-50" id="solid-formve-container">

        <div class="l-row">

            <div class="l-col-12">
                <div class="form-body pad-0">
                    {{ form("geocliente/index") }}
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