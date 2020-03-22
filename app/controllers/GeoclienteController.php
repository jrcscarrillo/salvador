<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class GeoclienteController extends ControllerBase
{

    public function initialize()
    {
        $this->tag->setTitle('GeoLocalizacion');
        parent::initialize();
    }

    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for geocliente
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Posiciones', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ClienteID";

        $posiciones = Posiciones::find($parameters);
        if (count($posiciones) == 0) {
            $this->flash->notice("The search did not find any posiciones");

            $this->dispatcher->forward([
                "controller" => "posiciones",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $posiciones,
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
     * Edits a geocliente
     *
     * @param string $CustomerRefListID
     */
    public function editAction($CustomerRefListID)
    {
        if (!$this->request->isPost()) {

            $geocliente = Geocliente::findFirstByCustomerRefListID($CustomerRefListID);
            if (!$geocliente) {
                $this->flash->error("geocliente was not found");

                $this->dispatcher->forward([
                    'controller' => "geocliente",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->CustomerRefListID = $geocliente->getCustomerreflistid();

            $this->tag->setDefault("CustomerRefListID", $geocliente->getCustomerreflistid());
            $this->tag->setDefault("CustomerRefFullName", $geocliente->getCustomerreffullname());
            $this->tag->setDefault("SalesRepRefListID", $geocliente->getSalesrepreflistid());
            $this->tag->setDefault("SalesRepRefFullName", $geocliente->getSalesrepreffullname());
            $this->tag->setDefault("CustomerMoreInfo", $geocliente->getCustomermoreinfo());
            $this->tag->setDefault("Latitude", $geocliente->getLatitude());
            $this->tag->setDefault("Longitude", $geocliente->getLongitude());
            $this->tag->setDefault("Address", $geocliente->getAddress());
            $this->tag->setDefault("Featured", $geocliente->getFeatured());
        }
    }

    /**
     * Creates a new geocliente
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "geocliente",
                'action' => 'index'
            ]);

            return;
        }

        $geocliente = new Geocliente();
        $geocliente->setCustomerRefListID($this->request->getPost("CustomerRefListID"));
        $geocliente->setCustomerRefFullName($this->request->getPost("CustomerRefFullName"));
        $geocliente->setSalesRepRefListID($this->request->getPost("SalesRepRefListID"));
        $geocliente->setSalesRepRefFullName($this->request->getPost("SalesRepRefFullName"));
        $geocliente->setCustomerMoreInfo($this->request->getPost("CustomerMoreInfo"));
        $geocliente->setLatitude($this->request->getPost("Latitude"));
        $geocliente->setLongitude($this->request->getPost("Longitude"));
        $geocliente->setAddress($this->request->getPost("Address"));
        $geocliente->setFeatured($this->request->getPost("Featured"));


        if (!$geocliente->save()) {
            foreach ($geocliente->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "geocliente",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("geocliente was created successfully");

        $this->dispatcher->forward([
            'controller' => "geocliente",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a geocliente edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "geocliente",
                'action' => 'index'
            ]);

            return;
        }

        $CustomerRefListID = $this->request->getPost("CustomerRefListID");
        $geocliente = Geocliente::findFirstByCustomerRefListID($CustomerRefListID);

        if (!$geocliente) {
            $this->flash->error("geocliente does not exist " . $CustomerRefListID);

            $this->dispatcher->forward([
                'controller' => "geocliente",
                'action' => 'index'
            ]);

            return;
        }

        $geocliente->setCustomerRefListID($this->request->getPost("CustomerRefListID"));
        $geocliente->setCustomerRefFullName($this->request->getPost("CustomerRefFullName"));
        $geocliente->setSalesRepRefListID($this->request->getPost("SalesRepRefListID"));
        $geocliente->setSalesRepRefFullName($this->request->getPost("SalesRepRefFullName"));
        $geocliente->setCustomerMoreInfo($this->request->getPost("CustomerMoreInfo"));
        $geocliente->setLatitude($this->request->getPost("Latitude"));
        $geocliente->setLongitude($this->request->getPost("Longitude"));
        $geocliente->setAddress($this->request->getPost("Address"));
        $geocliente->setFeatured($this->request->getPost("Featured"));


        if (!$geocliente->save()) {

            foreach ($geocliente->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "geocliente",
                'action' => 'edit',
                'params' => [$geocliente->getCustomerreflistid()]
            ]);

            return;
        }

        $this->flash->success("geocliente was updated successfully");

        $this->dispatcher->forward([
            'controller' => "geocliente",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a geocliente
     *
     * @param string $CustomerRefListID
     */
    public function deleteAction($CustomerRefListID)
    {
        $geocliente = Geocliente::findFirstByCustomerRefListID($CustomerRefListID);
        if (!$geocliente) {
            $this->flash->error("geocliente was not found");

            $this->dispatcher->forward([
                'controller' => "geocliente",
                'action' => 'index'
            ]);

            return;
        }

        if (!$geocliente->delete()) {

            foreach ($geocliente->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "geocliente",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("geocliente was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "geocliente",
            'action' => "index"
        ]);
    }
}
