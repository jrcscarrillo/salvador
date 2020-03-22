<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use QuickBooksOnline\API\Data\IPPCompanyInfo;
use QuickBooksOnline\API\Facades\CompanyInfo;
use QuickBooksOnline\API\Facades\Customer;
use QuickBooksOnline\API\Facades\Item;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Facades\Payment;
use QuickBooksOnline\API\Facades\Account;

const INCOME_ACCOUNT_TYPE = "Income";
const INCOME_ACCOUNT_SUBTYPE = "SalesOfProductIncome";
const EXPENSE_ACCOUNT_TYPE = "Cost of Goods Sold";
const EXPENSE_ACCOUNT_SUBTYPE = "SuppliesMaterialsCogs";
const ASSET_ACCOUNT_TYPE = "Other Current Asset";
const ASSET_ACCOUNT_SUBTYPE = "Inventory";

class YourcodeController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Conexion QB');
        parent::initialize();
    }

    public function indexventasAction() {
        $this->session->conditions = null;
        $this->view->form = new YourCodeForm;
        $usuario = $this->session->get('auth', 'id');
        $this->tag->setDefault('userId', $usuario['id']);
    }

    public function conexionAction() {
        
        $config = $this->claves->pasaConfigToken();

        $dataService = $this->claves->pasaDataServiceToken($config);

        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
        $authUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();
        $authorizationCodeUrl = $authUrl;

        $this->session->set('authUrl', $authUrl);

        header('Location: ' . $authorizationCodeUrl);
        exit();
    }

    public function continuarAction() {

        
        $config = $this->claves->pasaConfigToken();

        $dataService = $this->claves->pasaDataServiceToken($config);

        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
        $parseUrl = $this->parseAuthRedirectUrl($_SERVER['QUERY_STRING']);

        /*
         * Update the OAuth2Token
         */
        $accessToken = $OAuth2LoginHelper->exchangeAuthorizationCodeForToken($parseUrl['code'], $parseUrl['realmId']);
        $dataService->updateOAuth2Token($accessToken);

        /*
         * Setting the accessToken for session variable
         */
        $this->session->set('sessionAccessToken', $accessToken);
        $this->view->parseUrl = $parseUrl . '  server ' . $_SERVER['QUERY_STRING'];
        $this->view->accessTokenJson = $accessToken;
        $accessTokenValue = $accessToken->getAccessToken();
        $refreshTokenValue = $accessToken->getRefreshToken();
        $this->session->accesoToken = $accessTokenValue;
        $this->session->refrescoToken = $refreshTokenValue;
        $this->view->accesoToken = $accessTokenValue;
        $this->view->refrescoToken = $refreshTokenValue;
        return $this->dispatcher->forward(
                        [
                            "controller" => "yourcode",
                            "action" => "empresa",
                        ]
        );
    }

    function parseAuthRedirectUrl($url) {
        parse_str($url, $qsArray);
        return array(
            'code' => $qsArray['code'],
            'realmId' => $qsArray['realmId']
        );
    }

    public function empresaAction() {

        
        $config = $this->claves->pasaConfigToken();

        $dataService = $this->claves->pasaDataServiceToken($config);


        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
        $authUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();

        // Store the url in PHP Session Object;
        $this->session->authUrl = $authUrl;
        $sessionAccessToken = $this->session->sessionAccessToken;
        //set the access token using the auth object
        if (isset($sessionAccessToken)) {

            $accessTokenJson = array('token_type' => 'bearer',
                'access_token' => $sessionAccessToken->getAccessToken(),
                'refresh_token' => $sessionAccessToken->getRefreshToken(),
                'x_refresh_token_expires_in' =>
                $sessionAccessToken->getRefreshTokenExpiresAt(),
                'expires_in' => $sessionAccessToken->getAccessTokenExpiresAt()
            );
            $dataService->updateOAuth2Token($sessionAccessToken);
            $oauthLoginHelper = $dataService->getOAuth2LoginHelper();
            $CompanyInfo = new IPPCompanyInfo();
            $CompanyInfo = $dataService->getCompanyInfo();
            $this->session->companyInfo = $CompanyInfo;
            $accessTokenValue = $sessionAccessToken->getAccessToken();
            $refreshTokenValue = $sessionAccessToken->getRefreshToken();
            $accessTokenExpiresAt = $sessionAccessToken->getAccessTokenExpiresAt();
            $accessTokenValidationPeriod = $sessionAccessToken->getAccessTokenValidationPeriodInSeconds();
            $refreshTokenExpiresAt = $sessionAccessToken->getRefreshTokenExpiresAt();
            $refreshTokenValidationPeriod = $sessionAccessToken->getRefreshTokenValidationPeriodInSeconds();
            $realmID = $sessionAccessToken->getRealmID();
            $estado = 'ACTIVO';
            $tokenType = 'bearer';
            $this->session->accesoToken = $accessTokenValue;
            $this->session->refrescoToken = $refreshTokenValue;
            $this->view->companyInfo = $CompanyInfo;
            $this->view->accesoToken = $accessTokenValue;
            $this->view->refrescoToken = $refreshTokenValue;
            $this->view->segundosA = strtotime($accessTokenExpiresAt);
            $this->view->segundosR = strtotime($refreshTokenExpiresAt);
            $nombreComercial = $CompanyInfo->CompanyName;
            $this->view->nombreComercial = $nombreComercial;
            $this->session->nombreComercial = $nombreComercial;
            
            /**
             *  Se eliminan todas las ocurrencias de tokens por usuario
             *  Y se genera una nueva fila en la tabla 'tokenusers'
             *  
             */

            $usuario = $this->session->auth;
            
            $this->borraUsuario($usuario['email']);

            $TokenUsuario = new Tokenusers();

            $TokenUsuario->setUserEmail($usuario['email']);
            $TokenUsuario->setClientID($config['client_id']);
            $TokenUsuario->setClientSecret($config['client_secret']);
            $TokenUsuario->setAccessTokenKey($accessTokenValue);
            $TokenUsuario->setRefreshToken($refreshTokenValue);
            $TokenUsuario->setAccessTokenExpiresAt($accessTokenExpiresAt);
            $TokenUsuario->setAccessTokenValidationPeriod($accessTokenValidationPeriod);
            $TokenUsuario->setRefreshTokenExpiresAt($refreshTokenExpiresAt);
            $TokenUsuario->setRefreshTokenValidationPeriod($refreshTokenValidationPeriod);
            $TokenUsuario->setRealmID($realmID);
            $TokenUsuario->setEstado($estado);
            $TokenUsuario->setTokenType($tokenType);

            if (!$TokenUsuario->save()) {
                foreach ($TokenUsuario->getMessages() as $message) {
                    $this->flash->error($message);
                }

                return $this->dispatcher->forward(
                                [
                                    "controller" => "yourcode",
                                    "action" => "indexventas",
                                ]
                );
            }
        }
    }

    public function borraUsuario($email) {

        $usuarios = Tokenusers::find(
                        [
                            'conditions' => 'userEmail = :email:',
                            'bind' => [
                                'email' => $email
                            ]
                        ]
        );

        foreach ($usuarios as $usuario) {
            $usuario->delete();
        }
    }

    public function refrescarAction() {
        
        $config = $this->claves->pasaConfigToken();

        $dataService = $this->claves->pasaDataServiceToken($config);


        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
        $authUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();

        /*
         * Retrieve the accessToken value from session variable
         */
        $accessToken = $this->session->sessionAccessToken;
        $oauth2LoginHelper = new OAuth2LoginHelper($accessToken->getclientID(), $accessToken->getClientSecret());
        $newAccessTokenObj = $oauth2LoginHelper->
                refreshAccessTokenWithRefreshToken($accessToken->getRefreshToken());
        $newAccessTokenObj->setRealmID($accessToken->getRealmID());
        $newAccessTokenObj->setBaseURL($accessToken->getBaseURL());
        $this->session->sessionAccessToken = $newAccessTokenObj;
        return $this->dispatcher->forward(
                        [
                            "controller" => "yourcode",
                            "action" => "empresa",
                        ]
        );
    }

}
