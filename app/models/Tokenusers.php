<?php

class Tokenusers extends \Phalcon\Mvc\Model
{

    protected $ListID;

    protected $userEmail;

    protected $accessTokenKey;

    protected $tokenType;

    protected $refreshToken;

    protected $accessTokenExpiresAt;

    protected $refreshTokenExpiresAt;

    protected $accessTokenValidationPeriod;

    protected $refreshTokenValidationPeriod;

    protected $clientID;

    protected $clientSecret;

    protected $realmID;

    protected $estado;

    public function setListID($listID)
    {
        $this->ListID = $listID;

        return $this;
    }

    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function setAccessTokenKey($accessTokenKey)
    {
        $this->accessTokenKey = $accessTokenKey;

        return $this;
    }

    public function setTokenType($tokenType)
    {
        $this->tokenType = $tokenType;

        return $this;
    }

    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    public function setAccessTokenExpiresAt($accessTokenExpiresAt)
    {
        $this->accessTokenExpiresAt = $accessTokenExpiresAt;

        return $this;
    }

    public function setRefreshTokenExpiresAt($refreshTokenExpiresAt)
    {
        $this->refreshTokenExpiresAt = $refreshTokenExpiresAt;

        return $this;
    }

    public function setAccessTokenValidationPeriod($accessTokenValidationPeriod)
    {
        $this->accessTokenValidationPeriod = $accessTokenValidationPeriod;

        return $this;
    }

    public function setRefreshTokenValidationPeriod($refreshTokenValidationPeriod)
    {
        $this->refreshTokenValidationPeriod = $refreshTokenValidationPeriod;

        return $this;
    }

    public function setClientID($clientID)
    {
        $this->clientID = $clientID;

        return $this;
    }

    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    public function setRealmID($realmID)
    {
        $this->realmID = $realmID;

        return $this;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getListID()
    {
        return $this->ListID;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function getAccessTokenKey()
    {
        return $this->accessTokenKey;
    }

    public function getTokenType()
    {
        return $this->tokenType;
    }

    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    public function getAccessTokenExpiresAt()
    {
        return $this->accessTokenExpiresAt;
    }

    public function getRefreshTokenExpiresAt()
    {
        return $this->refreshTokenExpiresAt;
    }

    public function getAccessTokenValidationPeriod()
    {
        return $this->accessTokenValidationPeriod;
    }

    public function getRefreshTokenValidationPeriod()
    {
        return $this->refreshTokenValidationPeriod;
    }

    public function getClientID()
    {
        return $this->clientID;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function getRealmID()
    {
        return $this->realmID;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mecanica");
        $this->setSource("tokenusers");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tokenusers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tokenusers[]|Tokenusers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tokenusers|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
