 {{ content() }} {% include "layouts/cabecera.volt" %}


<div class="solid-form">
    <div class="solid-form l-container w-70" id="solid-form-container"></div>

    <div class="l-row">

        <div class="l-col-12 pad-0">

            <div class="form-body">
                {{ form("geocliente/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
                <fieldset>
                    <legend> DIRECCIONES GEOLOGICAS </legend>
                    <div class="l-row">
                        <div class="l-col-6">
                            <div class="form-group form-group-select" data-icon="&#xf078">

                                <label for="fieldCustomerreflistid">IDENTIFICACION CLIENTE</label>
                                <div class="l-pos-r">
                                    {{ text_field("CustomerRefListID", "size" : 30, "class" : "form-control", "id" : "fieldCustomerreflistid") }}
                                    <i class="fa fa-list fa-absolute fa-background"></i>
                                </div>
                            </div>
                        </div>
                        <div class="l-col-6">

                            <div class="form-group form-group-select" data-icon="&#xf078">
                                <label for="fieldCustomerreffullname">RAZON SOCIAL O NOMBRES </label>
                                <div class="l-pos-r">
                                    {{ text_field("CustomerRefFullName", "size" : 30, "class" : "form-control", "id" : "fieldCustomerreffullname") }}
                                    <i class="fa fa-list fa-absolute fa-background"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="l-row">
                        <div class="l-col-6">
                            <div class="form-group form-group-select" data-icon="&#xf078">

                                <label for="fieldSalesrepreflistid">IDENTIFICACION VENDEDOR</label>
                                <div class="l-pos-r">
                                    {{ text_field("SalesRepRefListID", "size" : 30, "class" : "form-control", "id" : "fieldSalesrepreflistid") }}
                                    <i class="fa fa-list fa-absolute fa-background"></i>
                                </div>
                            </div>
                        </div>
                        <div class="l-col-6">
                            <div class="form-group form-group-select" data-icon="&#xf078">

                                <label for="fieldSalesrepreffullname">RAZON SOCIAL O NOMBRES VENDEDOR</label>
                                <div class="l-pos-r">
                                    {{ text_field("SalesRepRefFullName", "size" : 30, "class" : "form-control", "id" : "fieldSalesrepreffullname") }}
                                    <i class="fa fa-list fa-absolute fa-background"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    >
                </fieldset>
                <fieldset>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {{ submit_button('Buscar', 'class': 'btn btn-default') }} {{ link_to("modelos/new", "Create geocliente") }}
                        </div>
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>