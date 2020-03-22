{% include "layouts/cabecera.volt" %}
<div class="solid-form">
    <div class="solid-form l-container w-50" id="solid-form-container">

        <div class="l-row">

            <div class="l-col-12 pad-0">

                    <div class="form-body">         
                        {{ form('invoice/search', 'id':'search')}}
                        <fieldset>
                            <legend> FACTURAS </legend>

                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="CustomerRef_FullName"> Cliente Razon Social </label>

                                        <div class="l-pos-r">

                                            {{ form.render('CustomerRef_FullName', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-user-circle"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="TxnDate"> Fecha Factura </label>

                                        <div class="l-pos-r">

                                            {{ form.render('TxnDate', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-calendar"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="RefNumber"> Numero Factura </label>

                                        <div class="l-pos-r">

                                            {{ form.render('RefNumber', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-digg"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="SalesRepRef_FullName"> Representante de Ventas </label>

                                        <div class="l-pos-r">

                                            {{ form.render('SalesRepRef_FullName', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-user-plus"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-group form-group-select" data-icon="&#xf078">

                                        <label for="CustomField15"> Estado Facturacion Electronica </label>

                                        <div class="l-pos-r">

                                            {{ form.render('CustomField15', ['class': 'form-element form-element-icon multi-select']) }}
                                            <i class="fa fa-list fa-absolute fa-check-circle"></i>
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

