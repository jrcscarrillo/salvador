<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class LicenciaController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Licencias');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
    }

    public function newAction() {
    }

    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Licencia', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "Id";

        $licencia = Licencia::find($parameters);
        if (count($licencia) == 0) {
            $this->flash->notice("The search did not find any licencia");

            $this->dispatcher->forward([
               "controller" => "licencia",
               "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
           'data' => $licencia,
           'limit' => 10,
           'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function editAction($Id) {
        if (!$this->request->isPost()) {

            $licencia = Licencia::findFirstById($Id);
            if (!$licencia) {
                $this->flash->error("licencia was not found");

                $this->dispatcher->forward([
                   'controller' => "licencia",
                   'action' => 'index'
                ]);

                return;
            }

            $this->view->Id = $licencia->getId();

            $this->tag->setDefault("Id", $licencia->getId());
            $this->tag->setDefault("Ruc", $licencia->getRuc());
            $this->tag->setDefault("NumeroLicencia", $licencia->getNumerolicencia());
            $this->tag->setDefault("FechaInicio", $licencia->getFechainicio());
            $this->tag->setDefault("FechaFin", $licencia->getFechafin());
            $this->tag->setDefault("Establecimiento", $licencia->getEstablecimiento());
            $this->tag->setDefault("PuntoEmision", $licencia->getPuntoemision());
            $this->tag->setDefault("UserIn", $licencia->getUserin());
            $this->tag->setDefault("FechaLogin", $licencia->getFechalogin());
            $this->tag->setDefault("Field1", $licencia->getField1());
            $this->tag->setDefault("Field2", $licencia->getField2());
            $this->tag->setDefault("Estado", $licencia->getEstado());
        }
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
               'action' => 'index'
            ]);

            return;
        }

        $licencia = new Licencia();
        $licencia->setRuc($this->request->getPost("Ruc"));
        $licencia->setEstablecimiento($this->request->getPost("Establecimiento"));
        $licencia->setPuntoEmision($this->request->getPost("PuntoEmision"));

        $estado = 'ACTIVO';
        $user = 'NINGUNO';
        $fecha = date('Y-m-d');
        $renewalDate = (new DateTime($fecha))->add(new DateInterval('P1Y'))
                                           ->sub(new DateInterval('P1D'))
                                           ->format('Y-m-d');
        $licencia->setUserIn($user);
        $licencia->setFechaLogin($fecha);
        $licencia->setEstado($estado);

        $numero = $this->claves->guid();

        $licencia->setNumeroLicencia($numero);
        $licencia->setFechaInicio($fecha);
        $licencia->setFechaFin($renewalDate);

        if (!$licencia->save()) {
            foreach ($licencia->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "licencia",
               'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("El nuevo numero de licencia es: " . $numero . ' expira el: ' . $renewalDate);

        $this->dispatcher->forward([
           'action' => 'index'
        ]);
    }

    public function saveAction() {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward([
                  'action' => 'index'
            ]);
        }

        $Id = $this->request->getPost("Id");
        $licencia = Licencia::findFirstById($Id);

        if (!$licencia) {
            $this->flash->error("licencia does not exist " . $Id);

            $this->dispatcher->forward([
               'action' => 'index'
            ]);

            return;
        }

        $licencia->setRuc($this->request->getPost("Ruc"));
        $licencia->setNumerolicencia($this->request->getPost("NumeroLicencia"));
        $licencia->setFechainicio($this->request->getPost("FechaInicio"));
        $licencia->setFechafin($this->request->getPost("FechaFin"));
        $licencia->setEstablecimiento($this->request->getPost("Establecimiento"));
        $licencia->setPuntoemision($this->request->getPost("PuntoEmision"));
        $licencia->setUserin($this->request->getPost("UserIn"));
        $licencia->setFechalogin($this->request->getPost("FechaLogin"));
        $licencia->setField1($this->request->getPost("Field1"));
        $licencia->setField2($this->request->getPost("Field2"));
        $licencia->setEstado($this->request->getPost("Estado"));


        if (!$licencia->save()) {

            foreach ($licencia->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "licencia",
               'action' => 'edit',
               'params' => [$licencia->getId()]
            ]);

            return;
        }

        $this->flash->success("licencia was updated successfully");

        $this->dispatcher->forward([
           'action' => 'index'
        ]);
    }

    public function deleteAction($Id) {
        $licencia = Licencia::findFirstById($Id);
        if (!$licencia) {
            $this->flash->error("licencia was not found");

            $this->dispatcher->forward([
               'action' => 'index'
            ]);

            return;
        }

        if (!$licencia->delete()) {

            foreach ($licencia->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("licencia was deleted successfully");

        $this->dispatcher->forward([
           'action' => "index"
        ]);
    }

}
