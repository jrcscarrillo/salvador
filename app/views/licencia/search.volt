

{{ content() }}

<div class="row">
    <table class="table coqueirosy table-bordered table-stripedy table-hovery">
        <thead>
            <tr>
            <th>Ruc</th>
            <th>NumeroLicencia</th>
            <th>FechaInicio</th>
            <th>FechaFin</th>
            <th>Establecimiento</th>
            <th>PuntoEmision</th>
            <th>UserIn</th>
            <th>FechaLogin</th>
            <th>Estado</th>

                <th>Renovar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for licencia in page.items %}
            <tr>
            <th>{{ licencia.getRuc() }}</th>
            <td>{{ licencia.getNumerolicencia() }}</td>
            <td>{{ licencia.getFechainicio() }}</td>
            <td>{{ licencia.getFechafin() }}</td>
            <td>{{ licencia.getEstablecimiento() }}</td>
            <td>{{ licencia.getPuntoemision() }}</td>
            <td>{{ licencia.getUserin() }}</td>
            <td>{{ licencia.getFechalogin() }}</td>
            <td>{{ licencia.getEstado() }}</td>

                <td>{{ link_to("licencia/edit/"~licencia.getId(), '<i class="fa fa-certificate fa-2x" aria-hidden="true"></i>') }}</td>
                <td>{{ link_to("licencia/delete/"~licencia.getId(), '<i class="fa fa-remove fa-2x" aria-hidden="true"></i>') }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
            <br>
    <div class="row">
        <div class="col-sm-3">
            <p></p>
        </div>
        <div class="col-sm-6">
            <nav>
                <ul class="nav navbar-nav navegay">
                    <li>{{ link_to("licencia/index", "Regresar") }}</li>
                    <li>{{ link_to("licencia/search", "Inicio") }}</li>
                    <li>{{ link_to("licencia/search?page="~page.before, "Ant.") }}</li>
                    <li>{{ link_to("licencia/search?page="~page.next, "Sig.") }}</li>
                    <li>{{ link_to("licencia/search?page="~page.last, "Fin") }}</li>
                    <li>{{ link_to("licencia/new", "Nuevo") }}</li>
                </ul>
            </nav>
        </div>
        <div class="col-sm-3">
            <nav>
                <ul class="nav navbar-nav navegay">
                    <li><span>{{ "Pag.  "~page.current ~"  de  " }}</span></li>
                    <li><span>{{ page.total_pages ~ "  Pags." }}</span></li>
                </ul>
            </nav>
        </div>
    </div>    
</div>

