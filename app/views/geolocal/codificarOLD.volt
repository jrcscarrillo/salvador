{{ content() }} {% include "layouts/cabecera.volt" %}

<div class="solid-form">

    <div class="l-container w-70" >

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
                                        <label for="Name">  RAZON SOCIAL O NOMBRES </label>
                                        <input type="text" name="Name" value="{{ geocliente.getCustomerRefFullName() }}" readonly >

                                    </div>
                                </div>
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="Direccion">  DIRECCION CLIENTE </label>
                                        <input type="text" name="Direccion" value="{{ geocliente.getAddress() }}" readonly >

                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="l-row">
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="RepName">  NOMBRES REPRESENTANTE </label>
                                        <input type="text" name="RepName" value="{{ geocliente.getSalesRepRefFullName() }}" readonly >

                                    </div>
                                </div>
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="RepId">  ID REPRESENTANTE </label>
                                        <input type="text" name="RepId" value="{{ geocliente.getSalesRepRefID() }}" readonly>

                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="l-row">
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="longitud">  LONGITUD </label>
                                        <input type="text" name="longitud" value="{{ geocliente.getLongitude() }}" readonly >
                                    </div>
                                </div>
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="latitud">  LATITUD </label>
                                        <input type="text" name="latitud" value="{{ geocliente.getLatitude() }}" readonly >
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="l-row">
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="mascliente">  DATOS ADICIONALES CLIENTE </label>
                                        <input type="text" name="mascliente" value="{{ geocliente.getCustomerMoreInfo() }}" readonly >
                                    </div>
                                </div>
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="localcliente">  DATOS DEL LOCAL</label>
                                        <input type="text" name="localcliente" value=" Faltan Datos" readonly >
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

