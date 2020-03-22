<?php

class Contribuyente extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************

    protected $Id;
    protected $TimeCreated;
    protected $TimeModified;
    protected $LastAccess;
    protected $Ruc;
    protected $Razon;
    protected $NombreComercial;
    protected $DirMatriz;
    protected $DirEmisor;
    protected $CodEmisor;
    protected $Punto;
    protected $Resolucion;
    protected $LlevaContabilidad;
    protected $Logo;
    protected $Ambiente;
    protected $Emision;
    protected $Contingencia;
    protected $Licencia;
    protected $Password;

// **********************
// GETTER METHODS
// **********************


    function getId() {
        return $this->Id;
    }

    function getTimeCreated() {
        return $this->TimeCreated;
    }

    function getTimeModified() {
        return $this->TimeModified;
    }

    function getLastAccess() {
        return $this->LastAccess;
    }

    function getRuc() {
        return $this->Ruc;
    }

    function getRazon() {
        return $this->Razon;
    }

    function getNombreComercial() {
        return $this->NombreComercial;
    }

    function getDirMatriz() {
        return $this->DirMatriz;
    }

    function getDirEmisor() {
        return $this->DirEmisor;
    }

    function getCodEmisor() {
        return $this->CodEmisor;
    }

    function getPunto() {
        return $this->Punto;
    }

    function getResolucion() {
        return $this->Resolucion;
    }

    function getLlevaContabilidad() {
        return $this->LlevaContabilidad;
    }

    function getLogo() {
        return $this->Logo;
    }

    function getAmbiente() {
        return $this->Ambiente;
    }

    function getEmision() {
        return $this->Emision;
    }

    function getContingencia() {
        return $this->Contingencia;
    }

    function getLicencia() {
        return $this->Licencia;
    }

    function getPassword() {
        return $this->Password;
    }

// **********************
// SETTER METHODS
// **********************


    function setId($Id) {
        $this->Id = $Id;
    }

    function setTimeCreated($TimeCreated) {
        $this->TimeCreated = $TimeCreated;
    }

    function setTimeModified($TimeModified) {
        $this->TimeModified = $TimeModified;
    }

    function setLastAccess($LastAccess) {
        $this->LastAccess = $LastAccess;
    }

    function setRuc($Ruc) {
        $this->Ruc = $Ruc;
    }

    function setRazon($Razon) {
        $this->Razon = $Razon;
    }

    function setNombreComercial($NombreComercial) {
        $this->NombreComercial = $NombreComercial;
    }

    function setDirMatriz($DirMatriz) {
        $this->DirMatriz = $DirMatriz;
    }

    function setDirEmisor($DirEmisor) {
        $this->DirEmisor = $DirEmisor;
    }

    function setCodEmisor($CodEmisor) {
        $this->CodEmisor = $CodEmisor;
    }

    function setPunto($Punto) {
        $this->Punto = $Punto;
    }

    function setResolucion($Resolucion) {
        $this->Resolucion = $Resolucion;
    }

    function setLlevaContabilidad($LlevaContabilidad) {
        $this->LlevaContabilidad = $LlevaContabilidad;
    }

    function setLogo($Logo) {
        $this->Logo = $Logo;
    }

    function setAmbiente($Ambiente) {
        $this->Ambiente = $Ambiente;
    }

    function setEmision($Emision) {
        $this->Emision = $Emision;
    }

    function setContingencia($Contingencia) {
        $this->Contingencia = $Contingencia;
    }

    function setLicencia($Licencia) {
        $this->Licencia = $Licencia;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }

    public function initialize() {
        $this->setSchema("mecanica");
        $this->setSource("contribuyente");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'contribuyente';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contribuyente[]|Contribuyente|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Contribuyente|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
