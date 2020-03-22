
                        <div class="form-body">
                            <div class="form-header">

                                <h1 class="margin-bottom-0"> LOGIN </h1>
                                <span> Un gusto tenerlo de regreso! </span>

                            </div>

                            {{ form('session/start', 'id':'login', 'class':'solid-form')}}
                            <div class="l-row">
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="estab"> ESTABLECIMIENTO <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label> 
                                        <div class="l-pos-r">
                                             {{ form.render("estab", ['class': 'form-element form-element-icon']) }}
{#                                            {{ text_field('email', 'type': "email", 'class':'form-element form-element-icon', 'id':"email", 'name':"email", 'placeholder':"Email") }}#}
                                            <i class="fa fa-user fa-absolute fa-background"></i> 
                                        </div> 
                                            {{ form.messages('estab') }}
                                    </div>
                                </div>
                                <div class="l-col-6">
                                    <div class="form-group">
                                        <label for="punto"> PUNTO DE EMISION <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label> 
                                        <div class="l-pos-r">
                                             {{ form.render("punto", ['class': 'form-element form-element-icon']) }}
{#                                            {{ text_field('email', 'type': "email", 'class':'form-element form-element-icon', 'id':"email", 'name':"email", 'placeholder':"Email") }}#}
                                            <i class="fa fa-user fa-absolute fa-background"></i> 
                                        </div> 
                                            {{ form.messages('punto') }}
                                    </div>
                                </div>
                            </div>
                            <div class="l-row">
                                <div class="l-col-12">
                                    <div class="form-group">
                                        <label for="ruc"> NUMERO RUC <a href="#" class="text-info l-float-right pad-right-12px"> SRI </a></label> 
                                        <div class="l-pos-r">
                                             {{ form.render("ruc", ['class': 'form-element form-element-icon']) }}
{#                                            {{ text_field('email', 'type': "email", 'class':'form-element form-element-icon', 'id':"email", 'name':"email", 'placeholder':"Email") }}#}
                                            <i class="fa fa-user fa-absolute fa-background"></i> 
                                        </div> 
                                            {{ form.messages('ruc') }}
                                    </div>
                                </div>
                            </div>
                            <div class="l-row">
                                <div class="l-col-12">
                                    <div class="form-group">
                                        <label for="email"> EMAIL <a href="#" class="text-info l-float-right pad-right-12px"> Recuerdeme </a></label> 
                                        <div class="l-pos-r">
                                             {{ form.render("email", ['class': 'form-element form-element-icon']) }}
{#                                            {{ text_field('email', 'type': "email", 'class':'form-element form-element-icon', 'id':"email", 'name':"email", 'placeholder':"Email") }}#}
                                            <i class="fa fa-user fa-absolute fa-background"></i> 
                                        </div> 
                                            {{ form.messages('email') }}
                                    </div>
                                </div>
                            </div>
                            <div class="l-row">
                                <div class="l-col-12">
                                    <div class="form-group">
                                        <label for="password"> PASSWORD <a href="#" class="text-info l-float-right pad-right-12px"> Reset </a></label>
                                        <div class="l-pos-r">
                                             {{ form.render("password", ['class': 'form-element form-element-icon']) }}
{#                                            {{ password_field('password', 'type': "password", 'class':"form-element form-element-icon", 'id':"password", 'name':"password", 'placeholder':"Password") }}#}
                                            <i class="fa fa-key fa-absolute fa-background"></i>
                                        </div>  
                                            {{ form.messages('password') }}
                                    </div>
                                </div>
                            </div>
                            <div class="l-row">
                                <div class="l-col-12">
                                    <div class="form-group form-group-switch">
                                        <div class="switch-container">
                                            <label for="remember" class="switch switch-short switch-left-right">
                                                <input class="switch-input" type="checkbox" id="remember" name="remember">
                                                <span class="switch-label" data-on="yes" data-off="no"></span> 
                                                <span class="switch-handle"></span> 
                                            </label>
                                        </div>
                                        <div class="switch-description">
                                            <label> Mantengame en el sistema. </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="l-row margin-0">
                                <div class="l-col-12">
                                    <div class="form-group">
                                        {{ submit_button('Login', 'class': 'btn btn-success btn-flat w-50 l-inline-block') }}
                                        {{ link_to('register', ' Registrarse ', 'class': 'btn btn-primary btn-large') }}
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

