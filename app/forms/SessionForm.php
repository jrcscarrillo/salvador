<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class SessionForm extends Form {

    public function initialize() {


        $ruc = new Text("ruc");
        $ruc->setLabel("Registro Unico de Contribuyentes");
        $ruc->setFilters(array('striptags', 'string'));
        $ruc->addValidators(array(
            new PresenceOf(array(
                'message' => 'No ha ingresado el numero del RUC'
                    )),
            new ValidaLicenciaValidator(array(
                'establecimiento' => 'estab',
                'puntoemision' => 'punto',
                'message' => 'debe ingresar un numero de RUC valido'
                    ))
        ));
        $this->add($ruc);

        $estab = new Text("estab");
        $estab->setLabel("Numero Establecimiento");
        $estab->setFilters(array('striptags', 'string'));
        $estab->addValidators(array(
            new PresenceOf(array(
                'message' => 'No ha ingresado el numero del Establecimiento'
                    ))
        ));
        $this->add($estab);

        $punto = new Text("punto");
        $punto->setLabel("Numero Punto de Emision");
        $punto->setFilters(array('striptags', 'string'));
        $punto->addValidators(array(
            new PresenceOf(array(
                'message' => 'No ha ingresado el numero del Punto de Emision'
                    ))
        ));
        $this->add($punto);


        $email = new Text("email");
        $email->setLabel("Correo Electronico");
        $email->setFilters(array('striptags', 'string'));
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'No ha ingresado la direccion de correo'
                    )),
            new Email(array(
                'message' => 'debe ingresar una direccion de correo valida'
                    ))
        ));
        $this->add($email);

        $password = new Password("password");
        $password->setLabel("Password");
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar una palabra clave'
                    )),
            new ValidaUserValidator(array(
                'correo' => 'email',
                'message' => 'El Email o el password no han sido registrados vuelva ha intentarlo'
                    ))
        ));

        $this->add($password);
    }

    public function messages($nombre) {
        if ($this->hasMessagesFor($nombre)) {
            foreach ($this->getMessagesFor($nombre) as $mensaje) {
                $this->flash->error($mensaje);
            }
        }
    }

}
