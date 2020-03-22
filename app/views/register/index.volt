{% include "layouts/cabecera.volt" %}
<div class="solid-form">
    <div class="solid-form l-container w-70" id="solid-form-container">

        <div class="l-row">

            <div class="l-col-12 pad-0">

                <div class="form-header">
                    <div class="l-row">
                    </div>

                    <div class="form-body">         
                        {{ form('register', 'id': 'registerForm', 'class': 'solid-form') }}
                        <fieldset>
                            <legend> REGISTRARSE </legend>
                            <span> Si ya tiene una cuenta. <a href="/aurora.simple/session/index" class="text-info"> Log in </a></span>


                            <section>

                                <div class="l-row">
                                    <div class="l-col-6">
                                        <div class="form-group form-group-select" data-icon="&#xf078">
                                            <label for="tipo"> TIPO USUARIO </label>
                                            <div class="l-pos-r">

                                                {{ form.render('tipo', ['class': 'form-element form-element-icon multi-select']) }}
                                                <i class="fa fa-list fa-absolute fa-background"></i>
                                            </div>
                                            {{ form.messages('tipo') }}

                                        </div>
                                    </div>

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
                            </section>
                            <section>
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
                                        </div>
                                    </div>
                                </div>    
                            </section>
                        </fieldset>
                        <fieldset>
                            <section>
                                <div class="l-row">
                                    <div class="l-col-12">
                                        <div class="form-group">
                                            <label for="name"> RAZON SOCIAL O NOMBRE COMERCIAL </label> 
                                            <div class="l-pos-r">

                                                {{ form.render('name', ['class': 'form-element form-element-icon']) }}
                                                <i class="fa fa-user-secret fa-absolute fa-background"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="l-row">
                                    <div class="l-col-12">
                                        <div class="form-group">
                                            <label for="name"> CORREO ELECTRONICO </label> 
                                            <div class="l-pos-r">

                                                {{ form.render('email', ['class': 'form-element form-element-icon',  'type': 'email']) }}
                                                <i class="fa fa-envelope fa-absolute fa-background"></i>
                                            </div>
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
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </fieldset>
                        <fieldset>
                            <legend> SOLO SI ES EMPLEADO </legend>

                            <div class="l-row">
                                <div class="l-col-6">
                                    <div class="l-col-12">
                                        <div class="form-group form-group-radio">
                                            <div class="l-pos-r">
                                                <input type="radio" class="form-element" id="opt5" name="educ"> 
                                                <span class="radio-svg-1 solid"></span>
                                                <label for="opt5"> Punto de Venta </label>
                                                <svg viewBox="-5.525 -1.505 42 42">
                                                <path d="M11.111,7.936c0,0-15.478,3.565-9.898,19.284c4.824,13.594,21.219,9.725,24.87,7.493c5.24-3.203,8.339-3.204,7.203-18.602
                                                      C32.33,4.979,16.69-0.411,12.256,0.024">
                                                </path>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="l-col-12">

                                        <div class="form-group form-group-radio">

                                            <div class="l-pos-r">
                                                <input type="radio" class="form-element" id="opt6" name="educ"> 
                                                <span class="radio-svg-1 solid"></span>
                                                <label for="opt6"> Representante </label>
                                                <svg viewBox="-5.525 -1.505 42 42">
                                                <path d="M11.111,7.936c0,0-15.478,3.565-9.898,19.284c4.824,13.594,21.219,9.725,24.87,7.493c5.24-3.203,8.339-3.204,7.203-18.602
                                                      C32.33,4.979,16.69-0.411,12.256,0.024">
                                                </path>
                                                </svg>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="l-col-12">

                                        <div class="form-group form-group-radio">

                                            <div class="l-pos-r">
                                                <input type="radio" class="form-element" id="opt7" name="educ"> 
                                                <span class="radio-svg-1 solid"></span>
                                                <label for="opt7"> Administrativo </label>
                                                <svg viewBox="0 -1.505 42 42">
                                                <path d="M11.111,7.936c0,0-15.478,3.565-9.898,19.284c4.824,13.594,21.219,9.725,24.87,7.493c5.24-3.203,8.339-3.204,7.203-18.602
                                                      C32.33,4.979,16.69-0.411,12.256,0.024">
                                                </path>
                                                </svg>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </fieldset>
                        <footer>
                            {{ submit_button('Registrarse', 'class': 'btn btn-primary') }}
                            <p class="help-block">Al ingresar al sistema, usted acepta los terminos y condiciones de su uso.</p>
                        </footer>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end forma -->
