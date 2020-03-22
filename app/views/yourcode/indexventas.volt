{% include "layouts/cabecera.volt" %}
{% block forma %}
    {{ content() }}
    <div style="background-color: #C1C1C1">
        <div class="row full-width" align="center">
        {% endblock %}
        {% block cabecera %}
            {{ form('yourcode/conexion', 'class':'sky-form')}}
        {% endblock %}
        {% block cuerpoforma %}
            <fieldset>
                <section>
                    <div class="row">
                        <label class="col col-2"></label>
                        <div class="col col-8">
                            <ul>
                                <li>Nuestro Punto de Ventas AURORA le permite una integracion con Quickbooks</li>
                                <li>Cada solucion es personalizada de acuerdo a las necesidades de cada cliente</li>
                                <li>Acepta registrar, modificar o eliminar pedidos</li>
                                <li>Podra revisar la historia de un cliente, de un dia o del mes</li>
                                <li>Podra disponer del estado de cuenta del cliente</li>
                            </ul>
                        </div>
                        <div class="col col-2"></div>
                    </div>
                </section>
            </fieldset>
            <footer>
                {{ submit_button('QB Conexion', 'class': 'btn btn-primary') }}
                <p class="help-block">Conectarse con Quickbooks.</p>
            </footer>
            </form>
        </div>
    </div>
{% endblock %}