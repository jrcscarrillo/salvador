{% include "layouts/cabecera.volt" %}
<div class="solid-form">
    <div class="solid-form l-container w-50" id="solid-form-container">

        <div class="l-row">

            <div class="l-col-12 pad-0">

                    <div class="form-body">         
                        {{ form('items/search', 'id':'search')}}
                        <fieldset>
                            <legend> PRODUCTOS </legend>

                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="name"> Nombre Corto </label>

                                        <div class="l-pos-r">

                                            {{ form.render('name', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-background"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="fullname"> Nombre Largo </label>

                                        <div class="l-pos-r">

                                            {{ form.render('fullname', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-background"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="description"> Descripcion Completa </label>

                                        <div class="l-pos-r">

                                            {{ form.render('description', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-background"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="sales_desc"> Descripcion para Ventas </label>

                                        <div class="l-pos-r">

                                            {{ form.render('sales_desc', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-background"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="sales_price"> Precio de Venta </label>

                                        <div class="l-pos-r">

                                            {{ form.render('sales_price', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-background"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </fieldset>
                        <div class="form-footer">
                            <div class="l-row">
                                <div class="l-col-12">
                                    <div class="form-group">
                                        {{ submit_button('Buscar', 'class': 'btn btn-default') }}
                                        {{ link_to("items/new", 'Nuevo', "class": "btn btn-info") }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end col -->
        </div> <!-- end col -->
    </div>
</div>

