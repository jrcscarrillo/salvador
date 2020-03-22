<div class="form-body">
    <div class="form-header">

        <h1 class="margin-bottom-0"> REGISTRO INICIAL </h1>
        <span> Reuerde esto es muy importante! </span>

    </div>

    {{ form('session/primeravez', 'id':'primeravez', 'class':'solid-form')}}

    <fieldset>
        <legend> CONTRIBUYENTE </legend>
        <section>


            <div class="l-row">
                <div class="l-col-6">
                    <div class="form-group">
                        <label for="Ruc"> NUMERO RUC <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("Ruc", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('Ruc') }}
                    </div>
                </div>
                <div class="l-col-3">
                    <div class="form-group">
                        <label for="CodEmisor"> ESTABLECIMIENTO <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("CodEmisor", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('CodEmisor') }}
                    </div>
                </div>
                <div class="l-col-3">
                    <div class="form-group">
                        <label for="Punto"> PUNTO EMISION <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("Punto", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('Punto') }}
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="l-row">
                <div class="l-col-12">
                    <div class="form-group">
                        <label for="Razon"> RAZON SOCIAL <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("Razon", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('Razon') }}
                    </div>
                </div>
            </div>
            <div class="l-row">
                <div class="l-col-12">
                    <div class="form-group">
                        <label for="NombreComercial"> NOMBRE COMERCIAL <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("NombreComercial", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('NombreComercial') }}
                    </div>
                </div>
            </div>
            <div class="l-row">
                <div class="l-col-12">
                    <div class="form-group">
                        <label for="DirMatriz"> DIRECCION MATRIZ <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("DirMatriz", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('DirMatriz') }}
                    </div>
                </div>
            </div>
            <div class="l-row">
                <div class="l-col-12">
                    <div class="form-group">
                        <label for="DirEmisor"> DIRECCION ESTABLECIMIENTO <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("DirEmisor", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('DirEmisor') }}
                    </div>
                </div>
            </div>


        </section>
    </fieldset>
    <fieldset>
        <section>
            <div class="l-row">
                <div class="l-col-3">
                    <div class="form-group">
                        <label for="Resolucion"> NUMERO RESOLUCION <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("Resolucion", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('Resolucion') }}
                    </div>
                </div>
                <div class="l-col-3">
                    <div class="form-group">
                        <label for="LlevaContabilidad"> LLEVA CONTABILIDAD <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("LlevaContabilidad", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('LlevaContabilidad') }}
                    </div>
                </div>
                <div class="l-col-3">
                    <div class="form-group">
                        <label for="Ambiente"> AMBIENTE <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("Ambiente", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('Ambiente') }}
                    </div>
                </div>
                <div class="l-col-3">
                    <div class="form-group">
                        <label for="Emision"> EMISION <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label>
                        <div class="l-pos-r">
                            {{ form.render("Emision", ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('Emision') }}
                    </div>
                </div>
            </div>
        </section>
    </fieldset>
    <fieldset>
        <legend> ADMINISTRADOR </legend>
        <section>
            <div class="l-row">
                <div class="l-col-6">
                    <div class="form-group form-group-select" data-icon="&#xf078">
                        <label for="tipoId"> TIPO IDENTIFICACION </label>
                        <div class="l-pos-r">
                            {{ form.render('tipoId', ['class': 'form-element form-element-icon multi-select']) }}
                            <i class="fa fa-address-card fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('tipoId') }}
                    </div>
                </div>
            </div>
            <div class="l-row">
                <div class="l-col-6">
                    <div class="form-group">
                        <label for="numeroId"> NUMERO IDENTIFICACION </label>
                        <div class="l-pos-r">

                            {{ form.render('numeroId', ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user-circle fa-absolute fa-background"></i>
                        </div>
                        {{ form.messages('numeroId') }}
                    </div>
                </div>
                <div class="l-col-6">
                    <div class="form-group">
                        <label for="username"> NOMBRE USUARIO </label>
                        <div class="l-pos-r">

                            {{ form.render('username', ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user fa-absolute fa-background"></i>
                        </div>
                            {{ form.messages('username') }}
                    </div>
                </div>
            </div>

        </section>
        <section>
            <div class="l-row">
                <div class="l-col-12">
                    <div class="form-group">
                        <label for="name"> RAZON SOCIAL O NOMBRE COMERCIAL </label>
                        <div class="l-pos-r">

                            {{ form.render('name', ['class': 'form-element form-element-icon']) }}
                            <i class="fa fa-user-secret fa-absolute fa-background"></i>
                        </div>
                            {{ form.messages('name') }}
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="l-row">
                <div class="l-col-12">
                    <div class="form-group">
                        <label for="email"> CORREO ELECTRONICO </label>
                        <div class="l-pos-r">

                            {{ form.render('email', ['class': 'form-element form-element-icon', 'type': 'email']) }}
                            <i class="fa fa-envelope fa-absolute fa-background"></i>
                        </div>
                            {{ form.messages('email') }}
                    </div>
                </div>
            </div>
        </section>
    </fieldset>
    <fieldset>
        <section>
            <div class="l-row">
                <div class="l-col-6">
                    <div class="form-group">
                        <label for="password"> PALABRA SECRETA </label>
                        <div class="l-pos-r">

                            {{ form.render('password', ['class': 'form-element form-element-icon', 'type': 'password']) }}
                            <i class="fa fa-key fa-absolute fa-background"></i>
                        </div>
                            {{ form.messages('password') }}
                    </div>
                </div>
                <div class="l-col-6">
                    <div class="form-group">
                        <label for="repeatPassword"> CONFIRME PALABRA SECRETA </label>
                        <div class="l-pos-r">

                            {{ password_field('repeatPassword', 'class': 'form-element form-element-icon', 'type': 'password') }}
                            <i class="fa fa-key fa-absolute fa-background"></i>
                            </label>
                        </div>
                            {{ form.messages('repeatPassword') }}
                    </div>
                </div>
            </div>
        </section>
    </fieldset>
    <div class="l-row margin-0">
        <div class="l-col-12">
            <div class="form-group">
                {{ submit_button('Registro Inicial', 'class': 'btn btn-success btn-flat w-50 l-inline-block') }}
            </div>
        </div>
    </div>
    </form>
</div>