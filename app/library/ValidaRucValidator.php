<?php

use Phalcon\Validation as validador;
use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;

/**
 * Description of ValidaRucValidator
 *
 * @author Juan Carrillo
 */
class ValidaRucValidator extends Validator implements ValidatorInterface {

    /**
     * 
     * @param Phalcon\Validation $validator
     * @param type $attribute
     * @return boolean
     */
    public function validate(Phalcon\Validation $validator, $attribute) {
        //obtain the name of the field 
        $punto = $this->getOption("punto");
        $ruc = $this->getOption("ruc");

        //obtain field value
        $valor_punto = $validator->getValue($punto);
        $valor_ruc = $validator->getValue($ruc);

        // obtain the input field value
        $value = $validator->getValue($attribute);

        //try to obtain message defined in a validator
        $message = $this->getOption('message');

        //check if the value is valid
        $contribuyente = Contribuyente::findFirst(
                        [
                            "conditions" => "Ruc = ?1 AND Punto = ?2 AND CodEmisor = ?3",
                            "bind" => [
                                1 => $valor_ruc,
                                2 => $valor_punto,
                                3 => $valor
                            ]
                        ]
        );
        if ($contribuyente) {
            $message = 'Ya existe este contribuyente en nuestra base de datos';
            $validator->appendMessage(new Message($message, $attribute, 'basededatos'));
        }

        if (count($validator->getMessages())) {
            return false;
        }
        return true;
    }

}
