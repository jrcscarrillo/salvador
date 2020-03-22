{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
{% endblock %}
{% block cabecera %}
    <div class="l-container" id="solid-form-container">
        <div class="l-row">
            <div class="l-col-12 pad-0">
                <div class="form-header">
                    <h1 class="margin-bottom-0"> Buscar Licencias </h1>
                </div>
                <div class="form-body">                
                    {{ form("licencia/search", "method":"post", "autocomplete" : "off", "id" : "search") }}
                {% endblock %}
                {% block cuerpoforma %}
                    <div class="l-row">
                        <div class="l-col-12">
                            <div class="form-group">
                                <label for="fieldRuc"> RUC </label>  
                                <div class="l-pos-r">
                                    {{ text_field("Ruc", "size" : 13, "class":"form-element form-element-icon", "id":"fieldRuc", "name":"fieldRuc", "placeholder":"Ruc") }}
                                    <i class="fa fa-info fa-absolute fa-address-card"></i> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-12">
                            <div class="form-group">
                                <label for="fieldNumerolicencia"> Numero de Licencia </label>  
                                <div class="l-pos-r">
                                    {{ text_field("NumeroLicencia", "size" : 64, "class":"form-element form-element-icon", "id":"fieldNumerolicencia", "name":"fieldNumerolicencia", "placeholder":"Numero de Licencia") }}
                                    <i class="fa fa-absolute fa-certificate"></i> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-6">
                            <div class="form-group">
                                <label for="fieldFechainicio"> Fecha de Inicio </label>  
                                <div class="l-pos-r">
                                    {{ text_field("FechaInicio", "type" : "date", "class":"form-element form-element-icon", "id":"fieldFechainicio", "name":"fieldFechainicio", "placeholder":"Fecha de Inicio") }}
                                    <i class="fa fa-absolute fa-calendar"></i> 
                                </div> 
                            </div>
                        </div>
                        <div class="l-col-6">
                            <div class="form-group">
                                <label for="fieldFechafin"> Fecha Final </label>  
                                <div class="l-pos-r">
                                    {{ text_field("FechaFin", "type" : "date", "class":"form-element form-element-icon", "id":"fieldFechafin", "name":"fieldFechafin", "placeholder":"Fecha Final") }}
                                    <i class="fa fa-absolute fa-calendar"></i> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-6">
                            <div class="form-group">
                                <label for="fieldEstablecimiento"> Establecimiento </label>  
                                <div class="l-pos-r">
                                    {{ text_field("Establecimiento", "size" : 3, "class":"form-element form-element-icon", "id":"fieldEstablecimiento", "name":"fieldEstablecimiento", "placeholder":"Establecimiento") }}
                                    <i class="fa fa-absolute fa-building"></i> 
                                </div> 
                            </div>
                        </div>
                        <div class="l-col-6">
                            <div class="form-group">
                                <label for="fieldPuntoemision"> Punto de Emision </label>  
                                <div class="l-pos-r">
                                    {{ text_field("PuntoEmision",  "size" : 3, "class":"form-element form-element-icon", "id":"fieldPuntoemision", "name":"fieldPuntoemision", "placeholder":"Punto de Emision") }}
                                    <i class="fa fa-absolute fa-building-o"></i> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-12">
                            <h5> ENVIAR ESTA INFORMACION </h5>
                            <p>Al presionar el boton de 'BUSCAR', la aplicacion buscara en la base de datos la(s) licencia(s) que cumplan con estos parametros de busqueda. </p><br>
                            <p>Al presionar el boton de 'CREAR', la aplicacion generara en la base de datos la nueva licencia. </p><br>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-6"> 
                            <div class="form-group">
                                {{ submit_button('BUSCAR', 'class': 'btn btn-success btn-flat', 'id':"submit", 'name':"submit" ) }}
                            </div>
                        </div>
                        <div class="l-col-6"> 
                            <div class="form-group">
                                {{ link_to("licencia/new", "CREAR", "class": 'btn btn-warning btn-flat') }}
                            </div>
                        </div>
                    </div>                      
                    </form>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
{% endblock %}
