<?php

class IndexController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Welcome');
        parent::initialize();
    }

    public function indexAction() {
        $auth = $this->session->auth;

        if ($auth) {
            $this->view->usuario = $auth['username'];
            $this->view->rol = $auth['tipo'];
        } else {
            $this->view->usuario = 'Log in';
            $this->view->rol = 'Ingresar al Sistema';
        }

        $nombreComercial = $this->session->nombreComercial;
        if ($nombreComercial) {
            $this->view->nombreComercial = $nombreComercial;
        } else {
            $this->view->nombreComercial = 'Sin Coneccion QB';
        }
    }

}
