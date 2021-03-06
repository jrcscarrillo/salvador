<!-- begin of generated class -->
<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        geocliente
 * GENERATION DATE:  18.03.2020
 * CLASS FILE:       C:\wamp\www\genera_clase/generated_classes/class.geocliente.php
 * FOR MYSQL TABLE:  geocliente
 * FOR MYSQL DB:     mecanica
 * -------------------------------------------------------
 * CODE GENERATED BY:
 * MY PHP-MYSQL-CLASS GENERATOR
 * from: >> www.voegeli.li >> (download for free!)
 * modify: >> www.aurora-ec.net >> (download for free!)
 * -------------------------------------------------------
 *
 */

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

    public function __construct() {
        $this->Address = 'Definir Direccion real';
        $this->CustomerMoreInfo = 'Adicionar informacion fisica del establecimiento';
        $this->CustomerRefFullName = 'Nombre Comercial del Cliente';
        $this->CustomerRefListID = 'Codigo Interno Cliente';
        $this->Featured = 0;
        $this->Latitude = 'Latitud';
        $this->Longitude = 'Longitud';
        $this->SalesRepRefFullName = 'Representante de Ventas';
        $this->SalesRepRefListID = 'Representante ID';
    }

    public function setCustomerRefListID($customerRefListID) {
        $this->CustomerRefListID = $customerRefListID;

        return $this;
    }

    /**
     * Method to set the value of field CustomerRefFullName
     *
     * @param string $customerRefFullName
     * @return $this
     */
    public function setCustomerRefFullName($customerRefFullName) {
        $this->CustomerRefFullName = $customerRefFullName;

        return $this;
    }

    /**
     * Method to set the value of field SalesRepRefListID
     *
     * @param string $salesRepRefListID
     * @return $this
     */
    public function setSalesRepRefListID($salesRepRefListID) {
        $this->SalesRepRefListID = $salesRepRefListID;

        return $this;
    }

    /**
     * Method to set the value of field SalesRepRefFullName
     *
     * @param string $salesRepRefFullName
     * @return $this
     */
    public function setSalesRepRefFullName($salesRepRefFullName) {
        $this->SalesRepRefFullName = $salesRepRefFullName;

        return $this;
    }

    /**
     * Method to set the value of field CustomerMoreInfo
     *
     * @param string $customerMoreInfo
     * @return $this
     */
    public function setCustomerMoreInfo($customerMoreInfo) {
        $this->CustomerMoreInfo = $customerMoreInfo;

        return $this;
    }

    /**
     * Method to set the value of field Latitude
     *
     * @param double $latitude
     * @return $this
     */
    public function setLatitude($latitude) {
        $this->Latitude = $latitude;

        return $this;
    }

    /**
     * Method to set the value of field Longitude
     *
     * @param double $longitude
     * @return $this
     */
    public function setLongitude($longitude) {
        $this->Longitude = $longitude;

        return $this;
    }

    /**
     * Method to set the value of field Address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address) {
        $this->Address = $address;

        return $this;
    }

    /**
     * Method to set the value of field Featured
     *
     * @param integer $featured
     * @return $this
     */
    public function setFeatured($featured) {
        $this->Featured = $featured;

        return $this;
    }

    /**
     * Returns the value of field customerRefListID
     *
     * @return string
     */
    public function getCustomerRefListID() {
        return $this->CustomerRefListID;
    }

    /**
     * Returns the value of field customerRefFullName
     *
     * @return string
     */
    public function getCustomerRefFullName() {
        return $this->CustomerRefFullName;
    }

    /**
     * Returns the value of field salesRepRefListID
     *
     * @return string
     */
    public function getSalesRepRefListID() {
        return $this->SalesRepRefListID;
    }

    /**
     * Returns the value of field salesRepRefFullName
     *
     * @return string
     */
    public function getSalesRepRefFullName() {
        return $this->SalesRepRefFullName;
    }

    /**
     * Returns the value of field customerMoreInfo
     *
     * @return string
     */
    public function getCustomerMoreInfo() {
        return $this->CustomerMoreInfo;
    }

    /**
     * Returns the value of field latitude
     *
     * @return double
     */
    public function getLatitude() {
        return $this->Latitude;
    }

    /**
     * Returns the value of field longitude
     *
     * @return double
     */
    public function getLongitude() {
        return $this->Longitude;
    }

    /**
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress() {
        return $this->Address;
    }

    /**
     * Returns the value of field featured
     *
     * @return integer
     */
    public function getFeatured() {
        return $this->Featured;
    }

    /**
     * Initialize method for model.
     */
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
     * @return Geocliente[]|Geocliente|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Geocliente|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
