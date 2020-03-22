
<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="/aurora.simple/" class="aside-logo">EC<span>aurora</span></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <div class="aside-loggedin">
            <div class="d-flex align-items-center justify-content-start">
                <a href="" class="avatar"><img src="https://carrillosteam.com/public/img/auroralogo.jpg" class="rounded-circle" alt=""></a>
                <div class="aside-alert-link">
                    <a href="" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
                    <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a>
                    <a href="" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
                </div>
            </div>
            <div class="aside-loggedin-user">

                {% if session.get('nombreComercial') %}
                    {% set nombre_comercial = session.get('nombreComercial') %}
                {% else %}
                    {% set nombre_comercial = 'Sin Conexion QB' %}
                {% endif %}

                {% if session.get('auth') %}
                    {% set usuario_s = session.get('auth') %}
                    {% set usuario_u = usuario_s['name'] %}
                    {% set usuario_r = usuario_s['tipo'] %}
                {% else %}
                    {% set usuario_u = 'Log In' %}
                    {% set usuario_r = 'Ingresar al Sistema' %}
                {% endif %}

                <h6 class="tx-color-03 tx-12 mg-b-0">

                    {{ nombre_comercial }}

                </h6>
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
                    <h6 class="tx-semibold mg-b-0">

                        {{ usuario_u }}
                        
                    </h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0">
                    {{ usuario_r }}
                </p>
            </div>
            <div class="collapse" id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    {{ elements.getLoginLogout() }}
                </ul>
            </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
            {{ elements.getMenu() }}
        </ul>
    </div>
</aside>

<div class="content ht-100v pd-0">
    <div class="content-header">
        <div class="container">
            <div class="row row-xs">
                <div class="col-lg-12 col-md-12">
                    <i data-feather="message-circle"></i>

                    {% if success or warning or notice or error %}

                        {% if success %}
                            <span class="bg-success text-white pd-20"> {{ success }} </span>
                        {% elseif warning %}
                            <span class="bg-warning text-black pd-20"> {{ warning }} </span>
                        {% elseif notice %}
                            <span class="bg-info text-white pd-20"> {{ notice }} </span>
                        {% elseif error %}
                            <span class="bg-danger text-white pd-20"> {{ error }} </span>
                        {% endif %}
                    {% endif %}
                </div>

            </div>

        </div>

        <nav class="nav">
            <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
            <a href="" class="nav-link"><i data-feather="grid"></i></a>
            <a href="" class="nav-link"><i data-feather="align-left"></i></a>
        </nav>
    </div><!-- content-header -->

