<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PaymentController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Pagos');
        parent::initialize();
    }

    public function indexAction() {
        /**
         *      controlacceso revisa que este un usuario logeado, que el contribuyente este seleccionado
         *      que tenga una licencia valida
         *      @var session $pendiente
         */
        $estado = $this->claves->controlacceso();
        if ($estado != 'OK') {
            return $this->dispatcher->forward([
                        "controller" => "index",
                        "action" => "index"
            ]);
        }

        $this->session->conditions = null;
        $this->view->form = new BuscaPagoForm;

    }


    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Receivepayment', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "RefNumber";

        $pagos = Receivepayment::find($parameters);
        if (count($pagos) == 0) {
            $this->flash->notice("No existen pagos bajo esos parametros");

            $this->dispatcher->forward([
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $pagos,
            'limit' => 100,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }
    public function impresionAction($TxnID) {
        $parameters = array('conditions' => '[TxnID] = :txnid:', 'bind' => array('txnid' => $TxnID));
        $pago = Receivepayment::findFirst($parameters);
        if ($pago == false) {
            $this->flash->error("Este pago no existe");
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }

        $this->_registraCredito($credito);
        
        $this->respuestaSRI(1);
        $credito->setCustomField10('IMPRESO');
        if (!$credito->save()) {

            foreach ($credito->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
               'controller' => "creditmemo",
               'action' => 'index',
            ]);

            return;
        }
        return $this->dispatcher->forward(
              [
                 "controller" => "creditmemo",
                 "action" => "search",
              ]
        );
    }


}
