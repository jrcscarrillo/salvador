<?php

use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;

class ValidaLicenciaValidator extends Validator implements ValidatorInterface {

    /**
     *
     * @param  Validation $validator
     * @param  string $attribute
     *
     * @return boolean
     */
    public function validate(Phalcon\Validation $validator, $attribute) {
        //obtain the name of the field 
        $elestab = $this->getOption("establecimiento");

        //obtain field value
        $elestab_value = $validator->getValue($elestab);

        //obtain the name of the field 
        $elpunto = $this->getOption("puntoemision");

        //obtain field value
        $elpunto_value = $validator->getValue($elpunto);

        // obtain the input field value
        $elruc_value = $validator->getValue($attribute);

        //try to obtain message defined in a validator
        $message = $this->getOption('message');

        //check if the value is valid
        $contribuyente = Contribuyente::findFirst(array(
                    "Ruc = :ruc:  AND CodEmisor = :estab: AND Punto = :punto:",
                    'bind' => array('ruc' => $elruc_value, 'estab' => $elestab_value, 'punto' => $elpunto_value)
        ));
        if (!$contribuyente) {
            $message = 'NO estan registrados en nuestra base de datos el Ruc o el Establecimiento o el Punto de Emision- Vuelva ha intentarlo';
            $validator->appendMessage(new Message($message, $attribute, 'rucerror'));
        } else {

            $ruc = $contribuyente->Ruc;
            $estab = $contribuyente->CodEmisor;
            $punto = $contribuyente->Punto;
            $nrolic = $contribuyente->Licencia;
            $licencia = Licencia::findFirst(array(
                        "Ruc = :ruc: AND Establecimiento = :estab: AND PuntoEmision = :punto:",
                        'bind' => array('ruc' => $ruc, 'estab' => $estab, 'punto' => $punto)
            ));
            if (!$licencia) {
                $message = 'Este contribuyente no tiene registrada un Numero de Licencia en nuestra base de datos';
                $validator->appendMessage(new Message($message, $attribute, 'nolicencia'));
            }
            $fecha = date('Y-m-d');
            if ($licencia->NumeroLicencia != $nrolic) {
                $message = 'Este Numero de Licencia no se encuentra registrada en nuestra base de datos';
                $validator->appendMessage(new Message($message, $attribute, 'licenciainvalida'));
            }
            if ($licencia->FechaFin < $fecha) {
                $message = 'Este Numero de Licencia ha expirado en nuestra base de datos';
                $validator->appendMessage(new Message($message, $attribute, 'licenciaexpirada'));
            }
        }

        if (count($validator->getMessages())) {
            return false;
        }
        return true;
    }

}
