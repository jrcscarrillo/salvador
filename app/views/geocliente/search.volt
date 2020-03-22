<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("posiciones/index", "Go Back") }}</li>
            <li class="next">{{ link_to("posiciones/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ClienteID</th>
                <th>ClienteNombre</th>
                <th>VendedorID</th>
                <th>VendedorNombre</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {% if page.items is defined %} {% for posicione in page.items %}
            <tr>
                <td>{{ posicione.getClienteid() }}</td>
                <td>{{ posicione.getClientenombre() }}</td>
                <td>{{ posicione.getVendedorid() }}</td>
                <td>{{ posicione.getVendedornombre() }}</td>

                <td>{{ link_to("posiciones/edit/"~posicione.getClienteid(), "Edit") }}</td>
                <td>{{ link_to("posiciones/delete/"~posicione.getClienteid(), "Delete") }}</td>
            </tr>
            {% endfor %} {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("posiciones/search", "First", false, "class": "page-link") }}</li>
                <li>{{ link_to("posiciones/search?page="~page.before, "Previous", false, "class": "page-link") }}</li>
                <li>{{ link_to("posiciones/search?page="~page.next, "Next", false, "class": "page-link") }}</li>
                <li>{{ link_to("posiciones/search?page="~page.last, "Last", false, "class": "page-link") }}</li>
            </ul>
        </nav>
    </div>
</div>