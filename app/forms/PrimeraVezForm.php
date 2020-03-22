<?php

use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Uniqueness;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Regex;

class PrimeraVezForm extends Form
{

    public function initialize($entity = null, $options = array())
    {


        $Ruc = new Numeric("Ruc");
        $Ruc->setLabel("RUC");
        $Ruc->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar el numero del RUC del Contribuyente'
            ))
        ));
        $this->add($Ruc);

        $Razon = new Text("Razon");
        $Razon->setLabel("Razon Social");
        $Razon->setFilters(array('striptags', 'string'));
        $Razon->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar la Razon Social del Contribuyente'
            ))
        ));
        $this->add($Razon);

        $NombreComercial = new Text("NombreComercial");
        $NombreComercial->setLabel("Nombre Comercial");
        $NombreComercial->setFilters(array('striptags', 'string'));
        $NombreComercial->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar el Nombre Comercial del Contribuyente'
            ))
        ));
        $this->add($NombreComercial);

        $DirMatriz = new Text("DirMatriz");
        $DirMatriz->setLabel("Direccion Matriz");
        $DirMatriz->setFilters(array('striptags', 'string'));
        $DirMatriz->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar el Direccion Comercial de la Matriz del Contribuyente'
            ))
        ));
        $this->add($DirMatriz);

        $DirEmisor = new Text("DirEmisor");
        $DirEmisor->setLabel("Direccion Establecimiento");
        $DirEmisor->setFilters(array('striptags', 'string'));
        $DirEmisor->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar el Direccion Comercial de la Matriz del Contribuyente'
            ))
        ));
        $this->add($DirEmisor);

        $CodEmisor = new Numeric("CodEmisor");
        $CodEmisor->setLabel("Establecimiento");
        $CodEmisor->setFilters(array('int'));
        $CodEmisor->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe indicar el Codigo del Establecimiento'
            )),
            new Regex(array(
                'pattern' => '/^\d{3}$/',
                'message' => 'El Codigo del Establecimiento no corresponde a la notacion requerida por el SRI'
            )),
            new StringLength(
                [
                    'max' => 3,
                    'min' => 3,
                    'messageMaximum' => "La longitud del campo son 3 caracteres",
                    'messageMinimum' => "La longitud del campo son 3 caracteres"
                ]
            )
        ));
        $this->add($CodEmisor);

        $Punto = new Numeric("Punto");
        $Punto->setLabel("Punto Emision");
        $Punto->setFilters(array('int'));
        $Punto->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar el Numero del punto de emision del Contribuyente'
            )),
            new Regex(array(
                'pattern' => '/^\d{3}$/',
                'message' => 'El Codigo del Punto de Emision no corresponde a la notacion requerida por el SRI'
            )),
            new StringLength(
                [
                    'max' => 3,
                    'min' => 3,
                    'messageMaximum' => "La longitud del campo son 3 caracteres",
                    'messageMinimum' => "La longitud del campo son 3 caracteres"
                ]
            )
        ));
        $this->add($Punto);

        $Resolucion = new Numeric("Resolucion");
        $Resolucion->setLabel("Resolucion");
        $Resolucion->setFilters(array('int'));
        $Resolucion->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar el Numero de Resolucion del Contribuyente'
            ))
        ));
        $this->add($Resolucion);

        $LlevaContabilidad = new Select("LlevaContabilidad", array("SI" => "SI", "NO" => "NO"));
        $LlevaContabilidad->setLabel("Lleva Contabilidad");
        $LlevaContabilidad->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar -SI- o -NO- para la contabilidad del Contribuyente'
            ))
        ));
        $this->add($LlevaContabilidad);

        $Ambiente = new Select("Ambiente", array("1" => "PRUEBAS", "2" => "PRODUCCION"));
        $Ambiente->setLabel("Ambiente");
        $Ambiente->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar -1- o -2- para el proceso en el SRI'
            ))
        ));
        $this->add($Ambiente);

        $Emision = new Select("Emision", array("1" => "NORMAL", "2" => "CONTINGENCIA"));
        $Emision->setLabel("Emision");
        $Emision->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar -1- o -2- para el proceso en el SRI'
            ))
        ));
        $this->add($Emision);

        $tipoId = new Select("tipoId", array("1" => "RUC", "2" => "CEDULA", "3" => "PASAPORTE"));
        $tipoId->setLabel("Tipo ID");
        $tipoId->addValidators(array(
            new PresenceOf(array(
                'message' => 'Debe ingresar -1- o -2- o -3- para el proceso en el SRI'
            ))
        ));
        $this->add($tipoId);

        $numeroId = new Text('numeroId');
        $numeroId->setLabel('Numero Identificacion');
        $numeroId->setFilters(array('striptags', 'string'));
        $numeroId->addValidators(array(
            new PresenceOf(array(
                'message' => 'Numero de identificacion es necesario'
            ))
        ));
        $this->add($numeroId);

        // Name
        $name = new Text('name');
        $name->setLabel('Nombres o Razon Social');
        $name->setFilters(array('alphanum'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ingrese sus nombres o la razon social de la empresa'
            )),
        ));
        $this->add($name);

        // Name
        $username = new Text('username');
        $username->setLabel('Nombre de Usuario');
        $username->setFilters(array('alphanum'));
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => 'Ingrese la identificacion de usuario deseada'
            )),
        ));
        $this->add($username);

        // Email
        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->setFilters('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'La direccion de su correo electronico es necesaria'
            )),
            new Email(array(
                'message' => 'El formato de su direccion de correo es invalida'
            )),
        ));
        $this->add($email);

        // Password
        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password es necesaria'
            ))
        ));
        $this->add($password);

        // Confirm Password
        $repeatPassword = new Password('repeatPassword');
        $repeatPassword->setLabel('Repeat Password');
        $repeatPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'Confirmar la password es necesario -esta invalida-'
            ))
        ));
        $this->add($repeatPassword);
    }

    public function messages($nombre)
    {
        if ($this->hasMessagesFor($nombre)) {
            foreach ($this->getMessagesFor($nombre) as $mensaje) {
                $this->flash->error($mensaje);
            }
        }
    }
}
