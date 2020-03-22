<?php

class Geocliente extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************

    protected $CustomerRefListID;
    protected $CustomerRefFullName;
    protected $SalesRepRefListID;
    protected $SalesRepRefFullName;
    protected $CustomerMoreInfo;
    protected $Latitude;
    protected $Longitude;
    protected $Address;
    protected $Featured;

    
    function __construct() {
        $this->Address = 'Sin Direccion';
        $this->CustomerMoreInfo = 'No hay mas informacion';
        $this->CustomerRefFullName = 'Sin datos del cliente';
        $this->CustomerRefListID = 'Sin id del cliente';
        $this->Featured = 0;
        $this->Latitude = 0;
        $this->Longitude = 0;
        $this->SalesRepRefFullName = 'No hay vendedor asociado';
        $this->SalesRepRefListID = 'No hay id del vendedor';
    }
// **********************
// GETTER METHODS
// **********************


    function getCustomerRefListID() {
        return $this->CustomerRefListID;
    }

    function getCustomerRefFullName() {
        return $this->CustomerRefFullName;
    }

    function getSalesRepRefListID() {
        return $this->SalesRepRefListID;
    }

    function getSalesRepRefFullName() {
        return $this->SalesRepRefFullName;
    }

    function getCustomerMoreInfo() {
        return $this->CustomerMoreInfo;
    }

    function getLatitude() {
        return $this->Latitude;
    }

    function getLongitude() {
        return $this->Longitude;
    }

    function getAddress() {
        return $this->Address;
    }

    function getFeatured() {
        return $this->Featured;
    }

// **********************
// SETTER METHODS
// **********************


    function setCustomerRefListID($CustomerRefListID) {
        $this->CustomerRefListID = $CustomerRefListID;
    }

    function setCustomerRefFullName($CustomerRefFullName) {
        $this->CustomerRefFullName = $CustomerRefFullName;
    }

    function setSalesRepRefListID($SalesRepRefListID) {
        $this->SalesRepRefListID = $SalesRepRefListID;
    }

    function setSalesRepRefFullName($SalesRepRefFullName) {
        $this->SalesRepRefFullName = $SalesRepRefFullName;
    }

    function setCustomerMoreInfo($CustomerMoreInfo) {
        $this->CustomerMoreInfo = $CustomerMoreInfo;
    }

    function setLatitude($Latitude) {
        $this->Latitude = $Latitude;
    }

    function setLongitude($Longitude) {
        $this->Longitude = $Longitude;
    }

    function setAddress($Address) {
        $this->Address = $Address;
    }

    function setFeatured($Featured) {
        $this->Featured = $Featured;
    }

    public function initialize() {
        $this->setSchema("mecanica");
        $this->setSource("geocliente");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'geocliente';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Geoclienteaux[]|Geoclienteaux|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Geoclienteaux|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
