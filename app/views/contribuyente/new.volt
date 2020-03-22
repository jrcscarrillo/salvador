{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
{% block forma %}
    {{ content() }}
    <div style="background-color: #C1C1C1">
        <div class="row full-width" align="center">
        {% endblock %}
        {% block cabecera %}
            {{ form('id': 'contribuyenteForm', 'class': 'sky-form') }}
        {% endblock %}
        {% block cuerpoforma %}
            <header><?php echo $this->view->descriptivo['cabecera']; ?></header>
            <fieldset>
                <section>
                    <div class="row">
                        <label class="label col col-4">RUC</label>
                        <div class="col col-8">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('Ruc', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('Ruc') }}
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-4">Razon Social</label>
                        <div class="col col-8">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('Razon', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('Razon') }}
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-4">Nombre Comercial</label>
                        <div class="col col-8">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('NombreComercial', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('NombreComercial') }}
                        </div>
                    </div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <div class="row">
                        <label class="label col col-4">Direccion Matriz</label>
                        <div class="col col-8">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('DirMatriz', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('DirMatriz') }}
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-4">Direccion Establecimiento</label>
                        <div class="col col-8">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('DirEmisor', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('DirEmisor') }}
                        </div>
                    </div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <div class="row">
                        <label class="label col col-2">Establecimiento</label>
                        <div class="col col-4">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('CodEmisor', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('CodEmisor') }}
                        </div>
                        <label class="label col col-2">Punto Emision</label>
                        <div class="col col-4">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('Punto', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('Punto') }}
                        </div>
                    </div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <div class="row">
                        <label class="label col col-2">Resolucion</label>
                        <div class="col col-4">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('Resolucion', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('Resolucion') }}
                        </div>
                        <label class="label col col-2">Lleva Contabilidad</label>
                        <div class="col col-4">
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                {{ form.render('LlevaContabilidad', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('LlevaContabilidad') }}
                        </div>
                    </div>
                </section>
            </fieldset>
            <fieldset>
                <section>
                    <div class="row">
                        <label class="label col col-2">Ambiente</label>
                        <div class="col col-4">
                            <label class="input">
                                <i class="icon-append fa fa-spinner"></i>
                                {{ form.render('Ambiente', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('Ambiente') }}
                        </div>
                        <label class="label col col-2">Emision</label>
                        <div class="col col-4">
                            <label class="input">
                                <i class="icon-append fa fa-spinner"></i>
                                {{ form.render('Emision', ['class': 'form-control']) }}
                            </label>
                            {{ form.messages('Emision') }}
                        </div>
                    </div>
                </section>
            </fieldset>                        
            <footer>
                {{ submit_button('Submit', 'class': 'btn btn-primary') }}
                <p class="help-block">Usted esta generando un nuevo contribuyente.</p>
            </footer>
            </form>

        </div>
    </div>
{% endblock %}
