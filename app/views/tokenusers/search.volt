<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("tokenusers/index", "Go Back") }}</li>
            <li class="next">{{ link_to("tokenusers/new", "Create ") }}</li>
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
                <th>ListID</th>
            <th>UserEmail</th>
            <th>AccessTokenKey</th>
            <th>TokenType</th>
            <th>RefreshToken</th>
            <th>AccessTokenExpiresAt</th>
            <th>RefreshTokenExpiresAt</th>
            <th>AccessTokenValidationPeriod</th>
            <th>RefreshTokenValidationPeriod</th>
            <th>ClientID</th>
            <th>ClientSecret</th>
            <th>RealmID</th>
            <th>Estado</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for tokenuser in page.items %}
            <tr>
                <td>{{ tokenuser.getListid() }}</td>
            <td>{{ tokenuser.getUseremail() }}</td>
            <td>{{ tokenuser.getAccesstokenkey() }}</td>
            <td>{{ tokenuser.getTokentype() }}</td>
            <td>{{ tokenuser.getRefreshtoken() }}</td>
            <td>{{ tokenuser.getAccesstokenexpiresat() }}</td>
            <td>{{ tokenuser.getRefreshtokenexpiresat() }}</td>
            <td>{{ tokenuser.getAccesstokenvalidationperiod() }}</td>
            <td>{{ tokenuser.getRefreshtokenvalidationperiod() }}</td>
            <td>{{ tokenuser.getClientid() }}</td>
            <td>{{ tokenuser.getClientsecret() }}</td>
            <td>{{ tokenuser.getRealmid() }}</td>
            <td>{{ tokenuser.getEstado() }}</td>

                <td>{{ link_to("tokenusers/edit/"~tokenuser.getListid(), "Edit") }}</td>
                <td>{{ link_to("tokenusers/delete/"~tokenuser.getListid(), "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
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
                <li>{{ link_to("tokenusers/search", "First") }}</li>
                <li>{{ link_to("tokenusers/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("tokenusers/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("tokenusers/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
