<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class TokenusersController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for tokenusers
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Tokenusers', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $tokenusers = Tokenusers::find($parameters);
        if (count($tokenusers) == 0) {
            $this->flash->notice("The search did not find any tokenusers");

            $this->dispatcher->forward([
                "controller" => "tokenusers",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $tokenusers,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a tokenuser
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $tokenuser = Tokenusers::findFirstByListID($ListID);
            if (!$tokenuser) {
                $this->flash->error("tokenuser was not found");

                $this->dispatcher->forward([
                    'controller' => "tokenusers",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $tokenuser->getListid();

            $this->tag->setDefault("ListID", $tokenuser->getListid());
            $this->tag->setDefault("userEmail", $tokenuser->getUseremail());
            $this->tag->setDefault("accessTokenKey", $tokenuser->getAccesstokenkey());
            $this->tag->setDefault("tokenType", $tokenuser->getTokentype());
            $this->tag->setDefault("refreshToken", $tokenuser->getRefreshtoken());
            $this->tag->setDefault("accessTokenExpiresAt", $tokenuser->getAccesstokenexpiresat());
            $this->tag->setDefault("refreshTokenExpiresAt", $tokenuser->getRefreshtokenexpiresat());
            $this->tag->setDefault("accessTokenValidationPeriod", $tokenuser->getAccesstokenvalidationperiod());
            $this->tag->setDefault("refreshTokenValidationPeriod", $tokenuser->getRefreshtokenvalidationperiod());
            $this->tag->setDefault("clientID", $tokenuser->getClientid());
            $this->tag->setDefault("clientSecret", $tokenuser->getClientsecret());
            $this->tag->setDefault("realmID", $tokenuser->getRealmid());
            $this->tag->setDefault("estado", $tokenuser->getEstado());
            
        }
    }

    /**
     * Creates a new tokenuser
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "tokenusers",
                'action' => 'index'
            ]);

            return;
        }

        $tokenuser = new Tokenusers();
        $tokenuser->setuserEmail($this->request->getPost("userEmail"));
        $tokenuser->setaccessTokenKey($this->request->getPost("accessTokenKey"));
        $tokenuser->settokenType($this->request->getPost("tokenType"));
        $tokenuser->setrefreshToken($this->request->getPost("refreshToken"));
        $tokenuser->setaccessTokenExpiresAt($this->request->getPost("accessTokenExpiresAt"));
        $tokenuser->setrefreshTokenExpiresAt($this->request->getPost("refreshTokenExpiresAt"));
        $tokenuser->setaccessTokenValidationPeriod($this->request->getPost("accessTokenValidationPeriod"));
        $tokenuser->setrefreshTokenValidationPeriod($this->request->getPost("refreshTokenValidationPeriod"));
        $tokenuser->setclientID($this->request->getPost("clientID"));
        $tokenuser->setclientSecret($this->request->getPost("clientSecret"));
        $tokenuser->setrealmID($this->request->getPost("realmID"));
        $tokenuser->setestado($this->request->getPost("estado"));
        

        if (!$tokenuser->save()) {
            foreach ($tokenuser->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "tokenusers",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("tokenuser was created successfully");

        $this->dispatcher->forward([
            'controller' => "tokenusers",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a tokenuser edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "tokenusers",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $tokenuser = Tokenusers::findFirstByListID($ListID);

        if (!$tokenuser) {
            $this->flash->error("tokenuser does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "tokenusers",
                'action' => 'index'
            ]);

            return;
        }

        $tokenuser->setuserEmail($this->request->getPost("userEmail"));
        $tokenuser->setaccessTokenKey($this->request->getPost("accessTokenKey"));
        $tokenuser->settokenType($this->request->getPost("tokenType"));
        $tokenuser->setrefreshToken($this->request->getPost("refreshToken"));
        $tokenuser->setaccessTokenExpiresAt($this->request->getPost("accessTokenExpiresAt"));
        $tokenuser->setrefreshTokenExpiresAt($this->request->getPost("refreshTokenExpiresAt"));
        $tokenuser->setaccessTokenValidationPeriod($this->request->getPost("accessTokenValidationPeriod"));
        $tokenuser->setrefreshTokenValidationPeriod($this->request->getPost("refreshTokenValidationPeriod"));
        $tokenuser->setclientID($this->request->getPost("clientID"));
        $tokenuser->setclientSecret($this->request->getPost("clientSecret"));
        $tokenuser->setrealmID($this->request->getPost("realmID"));
        $tokenuser->setestado($this->request->getPost("estado"));
        

        if (!$tokenuser->save()) {

            foreach ($tokenuser->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "tokenusers",
                'action' => 'edit',
                'params' => [$tokenuser->getListid()]
            ]);

            return;
        }

        $this->flash->success("tokenuser was updated successfully");

        $this->dispatcher->forward([
            'controller' => "tokenusers",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a tokenuser
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $tokenuser = Tokenusers::findFirstByListID($ListID);
        if (!$tokenuser) {
            $this->flash->error("tokenuser was not found");

            $this->dispatcher->forward([
                'controller' => "tokenusers",
                'action' => 'index'
            ]);

            return;
        }

        if (!$tokenuser->delete()) {

            foreach ($tokenuser->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "tokenusers",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("tokenuser was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "tokenusers",
            'action' => "index"
        ]);
    }

}
