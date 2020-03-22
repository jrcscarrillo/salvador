{% extends "layouts/adicional.volt" %}
{% block forma %}
    {{ content() }}
{% endblock %}
{% block cabecera %}
    <div class="l-container" id="solid-form-container">
        <div class="l-row">
            <div class="l-col-12 pad-0">
                <div class="form-header">
                    <h1 class="margin-bottom-0"> Generar Licencia </h1>
                </div>
                <div class="form-body">                
                    {{ form("licencia/create", "method":"post", "autocomplete" : "off", "id" : "search") }}
                {% endblock %}
                {% block cuerpoforma %}
                    <div class="l-row">
                        <div class="l-col-12">
                            <div class="form-group">
                                <label for="Ruc"> RUC </label>  
                                <div class="l-pos-r">
                                    {{ text_field("Ruc", "size" : 13, "class":"form-element form-element-icon", "id":"Ruc", "name":"Ruc", "placeholder":"Ruc") }}
                                    <i class="fa fa-info fa-absolute fa-address-card"></i> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-6">
                            <div class="form-group">
                                <label for="Establecimiento"> Establecimiento </label>  
                                <div class="l-pos-r">
                                    {{ text_field("Establecimiento", "size" : 3, "class":"form-element form-element-icon", "id":"Establecimiento", "name":"Establecimiento", "placeholder":"Establecimiento") }}
                                    <i class="fa fa-absolute fa-building"></i> 
                                </div> 
                            </div>
                        </div>
                        <div class="l-col-6">
                            <div class="form-group">
                                <label for="PuntoEmision"> Punto de Emision </label>  
                                <div class="l-pos-r">
                                    {{ text_field("PuntoEmision",  "size" : 3, "class":"form-element form-element-icon", "id":"PuntoEmision", "name":"PuntoEmision", "placeholder":"Punto de Emision") }}
                                    <i class="fa fa-absolute fa-building-o"></i> 
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-12">
                            <h5> ENVIAR ESTA INFORMACION </h5>
                            <p>Al presionar el boton de 'GUARDAR', la aplicacion generar el nuevo numero de licencia asi como la fecha inicial de valides y la fecha de expiracion. </p><br>
                            <p>Al presionar el boton de 'REGRESAR', regresamos a la busqueda de licencias. </p><br>
                        </div>
                    </div>

                    <div class="l-row">
                        <div class="l-col-6"> 
                            <div class="form-group">
                                {{ submit_button('GUARDAR', 'class': 'btn btn-success btn-flat', 'id':"submit", 'name':"submit" ) }}
                            </div>
                        </div>
                        <div class="l-col-6"> 
                            <div class="form-group">
                                {{ link_to("licencia/index", "REGRESAR", "class": 'btn btn-warning btn-flat') }}
                            </div>
                        </div>
                    </div>                      
                    </form>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
{% endblock %}
