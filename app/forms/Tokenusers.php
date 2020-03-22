<?php

class Tokenusers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $ListID;

    /**
     *
     * @var string
     */
    protected $userEmail;

    /**
     *
     * @var string
     */
    protected $accessTokenKey;

    /**
     *
     * @var string
     */
    protected $tokenType;

    /**
     *
     * @var string
     */
    protected $refreshToken;

    /**
     *
     * @var integer
     */
    protected $accessTokenExpiresAt;

    /**
     *
     * @var integer
     */
    protected $refreshTokenExpiresAt;

    /**
     *
     * @var integer
     */
    protected $accessTokenValidationPeriod;

    /**
     *
     * @var integer
     */
    protected $refreshTokenValidationPeriod;

    /**
     *
     * @var string
     */
    protected $clientID;

    /**
     *
     * @var string
     */
    protected $clientSecret;

    /**
     *
     * @var string
     */
    protected $realmID;

    /**
     *
     * @var string
     */
    protected $estado;

    /**
     * Method to set the value of field ListID
     *
     * @param integer $listID
     * @return $this
     */
    public function setListID($listID)
    {
        $this->ListID = $listID;

        return $this;
    }

    /**
     * Method to set the value of field userEmail
     *
     * @param string $userEmail
     * @return $this
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Method to set the value of field accessTokenKey
     *
     * @param string $accessTokenKey
     * @return $this
     */
    public function setAccessTokenKey($accessTokenKey)
    {
        $this->accessTokenKey = $accessTokenKey;

        return $this;
    }

    /**
     * Method to set the value of field tokenType
     *
     * @param string $tokenType
     * @return $this
     */
    public function setTokenType($tokenType)
    {
        $this->tokenType = $tokenType;

        return $this;
    }

    /**
     * Method to set the value of field refreshToken
     *
     * @param string $refreshToken
     * @return $this
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * Method to set the value of field accessTokenExpiresAt
     *
     * @param integer $accessTokenExpiresAt
     * @return $this
     */
    public function setAccessTokenExpiresAt($accessTokenExpiresAt)
    {
        $this->accessTokenExpiresAt = $accessTokenExpiresAt;

        return $this;
    }

    /**
     * Method to set the value of field refreshTokenExpiresAt
     *
     * @param integer $refreshTokenExpiresAt
     * @return $this
     */
    public function setRefreshTokenExpiresAt($refreshTokenExpiresAt)
    {
        $this->refreshTokenExpiresAt = $refreshTokenExpiresAt;

        return $this;
    }

    /**
     * Method to set the value of field accessTokenValidationPeriod
     *
     * @param integer $accessTokenValidationPeriod
     * @return $this
     */
    public function setAccessTokenValidationPeriod($accessTokenValidationPeriod)
    {
        $this->accessTokenValidationPeriod = $accessTokenValidationPeriod;

        return $this;
    }

    /**
     * Method to set the value of field refreshTokenValidationPeriod
     *
     * @param integer $refreshTokenValidationPeriod
     * @return $this
     */
    public function setRefreshTokenValidationPeriod($refreshTokenValidationPeriod)
    {
        $this->refreshTokenValidationPeriod = $refreshTokenValidationPeriod;

        return $this;
    }

    /**
     * Method to set the value of field clientID
     *
     * @param string $clientID
     * @return $this
     */
    public function setClientID($clientID)
    {
        $this->clientID = $clientID;

        return $this;
    }

    /**
     * Method to set the value of field clientSecret
     *
     * @param string $clientSecret
     * @return $this
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Method to set the value of field realmID
     *
     * @param string $realmID
     * @return $this
     */
    public function setRealmID($realmID)
    {
        $this->realmID = $realmID;

        return $this;
    }

    /**
     * Method to set the value of field estado
     *
     * @param string $estado
     * @return $this
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Returns the value of field listID
     *
     * @return integer
     */
    public function getListID()
    {
        return $this->ListID;
    }

    /**
     * Returns the value of field userEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Returns the value of field accessTokenKey
     *
     * @return string
     */
    public function getAccessTokenKey()
    {
        return $this->accessTokenKey;
    }

    /**
     * Returns the value of field tokenType
     *
     * @return string
     */
    public function getTokenType()
    {
        return $this->tokenType;
    }

    /**
     * Returns the value of field refreshToken
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Returns the value of field accessTokenExpiresAt
     *
     * @return integer
     */
    public function getAccessTokenExpiresAt()
    {
        return $this->accessTokenExpiresAt;
    }

    /**
     * Returns the value of field refreshTokenExpiresAt
     *
     * @return integer
     */
    public function getRefreshTokenExpiresAt()
    {
        return $this->refreshTokenExpiresAt;
    }

    /**
     * Returns the value of field accessTokenValidationPeriod
     *
     * @return integer
     */
    public function getAccessTokenValidationPeriod()
    {
        return $this->accessTokenValidationPeriod;
    }

    /**
     * Returns the value of field refreshTokenValidationPeriod
     *
     * @return integer
     */
    public function getRefreshTokenValidationPeriod()
    {
        return $this->refreshTokenValidationPeriod;
    }

    /**
     * Returns the value of field clientID
     *
     * @return string
     */
    public function getClientID()
    {
        return $this->clientID;
    }

    /**
     * Returns the value of field clientSecret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Returns the value of field realmID
     *
     * @return string
     */
    public function getRealmID()
    {
        return $this->realmID;
    }

    /**
     * Returns the value of field estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("carrillo_dbaurora");
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
