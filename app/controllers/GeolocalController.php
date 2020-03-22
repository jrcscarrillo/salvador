<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class GeoclienteController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Mensajes');
        parent::initialize();
    }

    public function indexAction($CustomerRefListID) {

        $cliente = Customer::findFirstByListID($CustomerRefListID);
        if ($cliente) {
            $this->view->ID = $CustomerRefListID;
            $this->view->cliente = $cliente->Name;
            $this->view->address = $cliente->BillAddress_City . ', ' . $cliente->BillAddress_Country . ', ' . $cliente->BillAddress_Addr1;
            $this->session->set('geocliente', array(
                'ID' => $CustomerRefListID,
                'cliente' => $cliente->Name,
                'direccion' => $cliente->BillAddress_Addr1
            ));
        } else {
            $this->view->ID = $CustomerRefListID;
            $this->view->cliente = "No paso el nombre";
            $this->view->address = "No paso la direccion";
            $this->session->set('geocliente', array(
                'ID' => $CustomerRefListID,
                'cliente' => 'NO PASO EL NOMBRE',
                'direccion' => 'NO PASO LA DIRECCION'
            ));
        }

        $mensajes = $this->session->get('cabecera');
        $datos = 'Esperando su Respuesta';
        $this->view->datos = $datos;
    }

    public function searchAction() {

        $geoclientes = Geocliente::find();
        $this->view->geoclientes = $geoclientes;
    }

    public function mapaAction() {


        $lon = isset($_POST['longitude']) ? (int) $_POST['longitude'] : '';
        $lat = isset($_POST['lattitude']) ? (int) $_POST['lattitude'] : '';

        $errors = [];
        if ($lon == '') {
            $errors[] = 'longitude';
        }
        if ($lat == '') {
            $errors[] = 'lattitude';
        }

        if (!empty($errors)) {
            if ($this->is_ajax_request()) {
                $result_array = array('errors' => $errors);
                $datos = json_encode($result_array);
            } else {
                $datos .= "There were errors on: " . implode(', ', $errors);
            }
        }

        $datos .= 'Posicionamiento = Longitud : ' . $lon . '  latitud : ' . $lat;

        if ($this->is_ajax_request()) {
            $this->view->datos = $datos;
        } else {
            $this->view->datos = $datos;
        }
    }

    public function is_ajax_request() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    public function centroAction() {
        
    }

    public function geolocsimpleAction() {
        
    }

    public function longYlatiAction() {
        
    }

    public function longYlatiRespAction() {
        
    }

    public function pixelcoordAction() {
        
    }

    public function codificarAction() {

        $geo = $this->session->get('geocliente');
        $ListID = $geo['ID'];
        $params = array("conditions" => "ListID = ?1", "bind" => array(1 => $ListID));
        $cliente = Customer::findFirst($params);
        if (!$cliente) {
            $this->view->error = "customer was not found " . $ListID;
                $this->dispatcher->forward([
                    'controller' => "home",
                    'action' => 'index'
                ]);

                return;
        }

        $Featured = 1;
//        $geocliente = new Geocliente();
//        $geocliente->setCustomerRefListID($this->request->getPost('ID'));
//        $cliente->BillAddress_Addr1 ? $address = $cliente->BillAddress_Addr1 : $address = "No hay nombre del cliente";
//        $geocliente->setAddress($address);
//
//        $cliente->FullName ? $nombre = $cliente->FullName : $nombre = "No hay nombre del cliente";
//        $geocliente->setCustomerMoreInfo($this->request->getPost('mascliente'));
//        $geocliente->setCustomerRefFullName($nombre);
//        $geocliente->setCustomerRefListID($this->request->getPost('ID'));
//        $geocliente->setLatitude($this->request->getPost('latitud'));
//        $geocliente->setLongitude($this->request->getPost('longitud'));
//
//        $cliente->SalesRepRef_FullName ? $vendedor = $cliente->SalesRepRef_FullName : $vendedor = "";
//        $geocliente->setSalesRepRefFullName($vendedor);
//
//        $cliente->SalesRepRef_ListID ? $vendedorid = $cliente->SalesRepRef_ListID : $vendedorid = "No hay id vendedor";
//        $geocliente->setSalesRepRefListID($vendedorid);
//        $geocliente->setFeatured($Featured);
//
//        if (!$geocliente->save()) {
//
//            foreach ($geocliente->getMessages() as $message) {
//                $this->view->error = $message;
//            }
//
//            $this->dispatcher->forward([
//                'controller' => "home",
//                'action' => 'index'
//            ]);
//
//            return;
//        }

        $this->view->cliente = $cliente;
//        $this->view->geocliente = $geocliente;
    }

}
