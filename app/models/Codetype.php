<?php

class Codetype extends \Phalcon\Mvc\Model {

    protected $id;
    protected $tipoCod;
    protected $type;
    protected $codeValue;

    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    public function setTipoCod($tipoCod) {
        $this->tipoCod = $tipoCod;

        return $this;
    }

    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    public function setCodeValue($codeValue) {
        $this->codeValue = $codeValue;

        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getTipoCod() {
        return $this->tipoCod;
    }

    public function getType() {
        return $this->type;
    }

    public function getCodeValue() {
        return $this->codeValue;
    }

    public function initialize() {
        $this->setSchema("mecanica");
        $this->setSource("codetype");
    }

    public function getSource() {
        return 'codetype';
    }

    public function numeroenserie($tipocod, $calificado) {
        $parameters = array('conditions' => '[tipoCod] = ?1 AND [type] = ?2', 'bind' => array(1 => $tipocod, 2 => $calificado));
        $numero = Codetype::findFirst($parameters);
        if ($numero) {
         $codeValue = $numero->codeValue;           
        } else {
            $codeValue = 0;
        }

        $codeValue++;
        return $codeValue;
    }
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
