{% block cuerpo %}
    {% include "layouts/cabecera.volt" %}
    <div class="content-body">
        <div class="container pd-x-0 solid-form">
            <div class="row row-xs">
                <div class="col-lg-12 col-xl-8 mg-t-10">
                    <div class="card mg-b-10">
                        {% if primeravez == 'SI' %}
                            {% include "layouts/primeravez.volt" %}
                        {% else %}
                            {% include "layouts/noprimeravez.volt" %}
                        {% endif %}
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end container -->
    </div> <!-- end container -->
{% endblock %}
