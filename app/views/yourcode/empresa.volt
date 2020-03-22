{% include "layouts/cabecera.volt" %}
{% block forma %}
    {{ content() }}
    <div style="background-color: #C1C1C1">
        <div class="row full-width" align="center">
        {% endblock %}
        {% block cabecera %}
            {{ form('yourcode/refrescar', 'class':'sky-form')}}
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

                    <h2>Usted se ha conectado a 
                        <strong> {{ nombreComercial }} </strong> en la Nube de Quickbooks</h2>

                    <br>

                </div>

                {#            <p>En caso que no se haya registrado correctamente con Quickbooks <b>Conectarse a QuickBooks</b> presione en el boton.</p>#}
                <pre id="accessToken" style="background-color:#efefef;overflow-x:scroll">
                    {#                    <label>Acceso expira en segundos <p> {{ segundosA }} </p></label>#}
                    {#                    <label>Refresco expira en segundos <p> {{ segundosR }} </p></label>#}
                    {#                    <label>Clave Acceso <p> {{ accesoToken }} </p></label>#}
                    {#                    <label>Clave Refresco <p> {{ refrescoToken }} </p></label>#}
                    {#                <label>Retorno desde Quickbooks <p>   {{ accessTokenJson | print_r }} </p></label>#}
                    {#                <label>Informacion de la empresa <p>   {{ companyInfo | print_r }} </p></label>#}
                   

                </pre>
                {#            <a class="imgLink" href="#" onclick="oauth.loginPopup()"><img src="https://carrillosteam.com/public/img/auroratableta/C2QB_green_btn_lg_default.png" width="178" /></a>#}
                {{ submit_button('Refrescar Codigo Acceso', 'class': 'btn btn-success') }}
                <hr />

            </fieldset>
        </div>
    </div>
{% endblock %}