{% include "layouts/cabecera.volt" %}
{% block forma %}
    {{ content() }}
    <div style="background-color: #C1C1C1">
        <div class="row full-width" align="center">
        {% endblock %}
        {% block cabecera %}
            <div class="sky-form">
            {% endblock %}
            {% block cuerpoforma %}
                <fieldset>

                    <h1>
                        <a href="https://ecuadoraurora.club">
                            <img src="https://carrillosteam.com/public/img/auroratableta/carrillosteamlogo.png" id="headerLogo">
                        </a>

                    </h1>

                    <hr>

                    <div class="well text-center">

                        <h1>Conectarse con la Empresa en la Nube de Quickbooks</h1>

                        <br>

                    </div>

                    <p>En caso que no se haya registrado correctamente con Quickbooks <b>Conectarse a QuickBooks</b> presione en el boton.</p>
                    <pre id="accessToken" style="background-color:#efefef;overflow-x:scroll">
                        {% if accessTokenJson is not defined %}
                            {% set displayString = "No Access Token Generated Yet" %}
                        {% else %}
                            {% set displayString = accessTokenJson | json_encode('JSON_PRETTY_PRINT') %}
                        {% endif %}
                        {{ displayString }}
                    </pre>
                    <a class="imgLink" href="#" onclick="oauth.loginPopup()"><img src="https://carrillosteam.com/public/img/auroratableta/C2QB_green_btn_lg_default.png" width="178" /></a>
                    <button  type="button" class="btn btn-success" onclick="apiCall.refreshToken()">Refrescar Codigo Acceso</button>
                    <hr />

                </fieldset>
            </div>
        </div>
    {% endblock %}