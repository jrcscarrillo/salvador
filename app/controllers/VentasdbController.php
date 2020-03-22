<?php

class VentasdbController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Ventas');
        parent::initialize();
    }

    public function indexAction() {
        /**
         *      controlacceso revisa que este un usuario logeado, que el contribuyente este seleccionado
         *      que tenga una licencia valida
         *      @var session $pendiente
         */
        $estado = $this->claves->controlacceso();
        if ($estado === 'OK') {
            
        } else {

            return $this->dispatcher->forward([
                        "controller" => "index",
                        "action" => "index"
            ]);
        }
        $pendiente = $this->session->get('pendiente');
        if ($pendiente['estado'] === 'GRABADO') {
            $valores = array();
            $valores['refnumber'] = $pendiente['RefNumber'];
            $valores['iva'] = 0;
            $valores['siniva'] = 0;
            $valores['coniva'] = 0;
            $valores['subtotal'] = 0;
            $this->session->set('valores', $valores);
            $this->flash->notice('Tiene un pedido de venta sin cerrar' . ' ESTADO: ' . $pendiente['estado'] . ' NRO. PEDIDO: ' . $pendiente['RefNumber']);
            return $this->dispatcher->forward([
                        "action" => "cabecera",
            ]);
        }

        $parameters = array('order' => 'TimeModified DESC', 'limit' => 1);
        $invoice = new Invoice();
        $invoice = Invoice::findFirst($parameters);

        $form = new NuevoTicketForm;

        $estado = 'INIT';
        if ($this->request->isPost()) {
            $CustomerRefListID = $this->request->getPost('CustomerRefListID');
            if ($form->isValid($this->request->getPost()) != false) {
                $estado = $this->grabapedido($CustomerRefListID);
                if ($estado != 'OK') {
                    $this->flash->error((string) $estado);
                    return $this->dispatcher->forward([
                                "controller" => "home",
                                "action" => "index",
                    ]);
                }
                return $this->dispatcher->forward([
                            "action" => "cabecera",
                ]);
            } else {
                if ($form->getMessages()) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                }
            }
        }
        $this->view->hayonohay = "SI";
        if (!$invoice) {
            $this->view->hayonohay = "NO";
        }
        $this->view->form = $form;
        $this->view->invoice = $invoice;
    }

    /**
     *  Buscar la ultima factura
     */
    public function grabapedido($CustomerRefListID) {


        $ruc = $this->session->get('contribuyente');

        $tipocod = 'NUM' . $ruc['estab'] . $ruc['punto'];
        $calificado = 'TICKET';
        $numero = $this->claves->numeroenserie($tipocod, $calificado);
        $tipocod = 'NUM' . $ruc['estab'] . $ruc['punto'];
        $calificado = 'FACTURA';
        $numfact = $this->claves->numeroenserie($tipocod, $calificado);
        $clave = $ruc['estab'] . '-' . $ruc['punto'] . '-' . $numfact;
        $doc = $this->claves->generaDoc($clave);
        $refNumber = $doc['estab'] . '-' . $doc['punto'] . '-' . $doc['documento'];
        $fecha = date('Y-m-d H:m:s');
        $cero = 0;

        $cliente = Customer::findFirstByListID($CustomerRefListID);
        if (!$cliente) {
            return 'Que paso con el input? ' . $CustomerRefListID;
        }

        $pedido = new Aticket();
        $pedido->setTxnID($refNumber);
        $pedido->setTimeCreated($fecha);
        $pedido->setTimeModified($fecha);
        $pedido->setEstab($ruc['estab']);
        $pedido->setPunto($ruc['punto']);
        $pedido->setFestab($ruc['estab']);
        $pedido->setFpunto($ruc['punto']);
        $pedido->setGestab($ruc['estab']);
        $pedido->setGpunto($ruc['punto']);
        $pedido->setCustomerRefListID($cliente->ListID);
        $pedido->setCustomerRefFullName($cliente->Name);
        $pedido->setConIva(0);
        $pedido->setEstado('GRABADO');
        $pedido->setIva(0);
        $pedido->setNroFactura('No Procesado');
        $pedido->setRefNumber($numero);
        $pedido->setFnumero($numfact);
        $pedido->setFtipo('unica');
        $pedido->setGtipo('Sin Guia');
        $pedido->setSinIva(0);
        $pedido->setSubTotal(0);
        $pedido->setTxnDate(date('Y-m-d', strtotime($fecha)));
        if (!$pedido->save()) {
            foreach ($pedido->getMessages() as $message) {
                return $message;
            }
        }


        $valores = array();
        $valores['refnumber'] = $pedido->getTxnID();
        $valores['iva'] = $pedido->getIva();
        $valores['siniva'] = $pedido->getSinIva();
        $valores['coniva'] = $pedido->getConIva();
        $valores['subtotal'] = $pedido->getSubTotal();
        $this->session->set('valores', $valores);
        $this->session->set('pendiente', array(
            "estado" => 'GRABADO',
            "RefNumber" => $refNumber
        ));
        return 'OK';
    }

    public function opciondbAction() {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                            [
                                "action" => "index",
                            ]
            );
        }

        $ruc = $this->session->get('contribuyente');

        $tipocod = 'NUM' . $ruc['estab'] . $ruc['punto'];
        $calificado = 'TICKET';
        $numero = $this->claves->numeroenserie($tipocod, $calificado);
        $tipocod = 'NUM' . $ruc['estab'] . $ruc['punto'];
        $calificado = 'FACTURA';
        $numfact = $this->claves->numeroenserie($tipocod, $calificado);
        $clave = $ruc['estab'] . '-' . $ruc['punto'] . '-' . $numfact;
        $doc = $this->claves->generaDoc($clave);
        $refNumber = $doc['estab'] . '-' . $doc['punto'] . '-' . $doc['documento'];
        $fecha = date('Y-m-d H:m:s');
        $cero = 0;

        $cliente = Customer::findFirstByListID($this->request->getPost('CustomerRefListID'));
        if (!$cliente) {
            $this->flash->success('Que paso con el input? ' . $this->request->getPost('CustomerRefListID'));
            return $this->dispatcher->forward([
                        'controller' => "home",
                        'action' => 'index'
            ]);
        }

        $pedido = new Aticket();
        $pedido->setTxnID($refNumber);
        $pedido->setTimeCreated($fecha);
        $pedido->setTimeModified($fecha);
        $pedido->setEstab($ruc['estab']);
        $pedido->setPunto($ruc['punto']);
        $pedido->setFestab($ruc['estab']);
        $pedido->setFpunto($ruc['punto']);
        $pedido->setGestab($ruc['estab']);
        $pedido->setGpunto($ruc['punto']);
        $pedido->setCustomerRefListID($cliente->ListID);
        $pedido->setCustomerRefFullName($cliente->Name);
        $pedido->setConIva(0);
        $pedido->setEstado('GRABADO');
        $pedido->setIva(0);
        $pedido->setNroFactura('No Procesado');
        $pedido->setRefNumber($numero);
        $pedido->setFnumero($numfact);
        $pedido->setFtipo('unica');
        $pedido->setGtipo('Sin Guia');
        $pedido->setSinIva(0);
        $pedido->setSubTotal(0);
        $pedido->setTxnDate(date('Y-m-d', strtotime($fecha)));
        if (!$pedido->save()) {
            foreach ($pedido->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }


        $valores = array();
        $valores['refnumber'] = $pedido->getRefNumber();
        $valores['iva'] = $pedido->getIva();
        $valores['siniva'] = $pedido->getSinIva();
        $valores['coniva'] = $pedido->getConIva();
        $valores['subtotal'] = $pedido->getSubTotal();
        $this->session->set('valores', $valores);
        $this->session->set('pendiente', array(
            "estado" => 'GRABADO',
            "RefNumber" => $refNumber
        ));
        return $this->dispatcher->forward([
                    'action' => 'cabecera',
                    'params' => [$refNumber]
        ]);

//        $this->view->cliente = $cliente->ListID;
//        $this->view->nombre = $cliente->Name;
//        $this->view->refnumber = $numero;
    }

    public function cabeceraAction() {

        $ruc = $this->session->get('contribuyente');
        $valores = $this->session->get('valores');
        $refNumber = $valores['refnumber'];

        $ticket = new Aticket();
        $ticket = Aticket::findFirstByTxnID($refNumber);

        if (!$ticket) {
            $this->flash->warning("no se ha encontrado el nuevo pedido ERROR" . $refNumber);

            return $this->dispatcher->forward([
                        'controller' => 'home',
                        'action' => 'index'
            ]);
        }

        $TxnID = $ticket->getTxnID();
        $form = new VentaCabeceraForm;

        if (!$this->request->isPost() || $this->request->getPost('CustomerRefListID')) {

            $this->tag->setDefault("tipofactura", $ticket->getFtipo());
            $this->tag->setDefault("numerofactura", $ticket->getFnumero());
            $this->tag->setDefault("frecuencia", $ticket->getFfrecuencia());
            $this->tag->setDefault("formapago", $ticket->getFplazo());
            $this->tag->setDefault("tipoguia", $ticket->getGtipo());
            $this->tag->setDefault("numeroguia", $ticket->getGnumero());
            $this->tag->setDefault("referencia", $ticket->getReferencia());
            $this->tag->setDefault("notacomprador", $ticket->getNotasComprador());
            $this->tag->setDefault("condiciones", $ticket->getTerminosCondiciones());
            $this->tag->setDefault("fechaemision", $ticket->getTxnDate());
        } else {


        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {

                $fecha = $this->request->getPost('fechaemision');
                $ticket->Ftipo = $this->request->getPost('tipofactura');
                $ticket->Gtipo = $this->request->getPost('tipoguia');
                $ticket->Ffrecuencia = $this->request->getPost('frecuencia');
                $ticket->Fnumero = intval($this->request->getPost('numerofactura'));
                $ticket->Gnumero = intval($this->request->getPost('numeroguia'));
                $ticket->Fplazo = $this->request->getPost('formapago');
                $ticket->Referencia = $this->request->getPost('referencia');
                $ticket->NotasComprador = $this->request->getPost('notacomprador');
                $ticket->TerminosCondiciones = $this->request->getPost('condiciones');
                $ticket->TxnDate = date('Y-m-d', strtotime($fecha));

                if ($ticket->save()) {

                    return $this->dispatcher->forward([
                                'action' => 'productos',
                                'params' => [$refNumber]
                    ]);
                } else {
                    $messages = $ticket->getMessages();
                    foreach ($messages as $message) {
                        $this->flash->error((string) $message);
                    }
                }
            }
        }

        }

        $this->view->form = $form;
        $this->view->ticket = $ticket;
        $this->view->ruc = $ruc;
    }

    public function productosAction($refNumber) {

        $this->flash->clear();
        $ticket = Aticket::findFirstByTxnID($refNumber);

        if (!$ticket) {
            $this->flash->warning("no se ha encontrado el nuevo pedido ERROR" . $refNumber);

            return $this->dispatcher->forward([
                        'action' => 'index'
            ]);
        }
        // array("28" => "Servicios", "29" => "Inventarios", "30" => "No inventario",  "31" => "Terminado",  "32" => "Activo Fijo",  "33" => "Otros"));
        $ftipo = array();
        $tipofactura = $ticket->Ftipo;
        if ($tipofactura === '28') {
            $destipo = 'Service';
        } elseif ($tipofactura === '29') {
            $destipo = 'Inventory';
        } elseif ($tipofactura === '30') {
            $destipo = 'NonInventory';
        } elseif ($tipofactura === '31') {
            $destipo = 'Assembly';
        } elseif ($tipofactura === '32') {
            $destipo = 'Asset';
        } elseif ($tipofactura === '33') {
            $destipo = 'OtherCharge';
        }

        $ftipo['tipofactura'] = $tipofactura;
        $ftipo['destipo'] = $destipo;
        $this->session->set('tipofactura', $ftipo);
        $valores = $this->session->get('valores');
        $ruc = $this->session->get('contribuyente');

        if (!$valores) {
            $valores = array();
        }

        $valores['refnumber'] = $ticket->getTxnID();
        $valores['iva'] = 0;
        $valores['siniva'] = 0;
        $valores['coniva'] = 0;
        $valores['subtotal'] = 0;

        $TxnID = $ticket->getTxnID();
        $form = new TicketProductoForm;
        $parameters = array('conditions' => '[IDKEY] = :clave:', 'bind' => array('clave' => $TxnID));
        $ticketline = Aticketline::find($parameters);

        foreach ($ticketline as $producto) {
            $valores['iva'] = $valores['iva'] + $producto->Iva;
            $valores['subtotal'] = $valores['subtotal'] + $producto->SubTotal;
        }

        $this->session->set('valores', $valores);
        $this->view->ticket = $ticket;
        $this->view->form = $form;
        $this->view->ruc = $ruc;
        $this->view->ftipo = $destipo;
        $this->view->ticketline = $ticketline;
        $this->tag->setDefault('qty', '');
    }

    public function masproductosAction($refNumber) {

        $valores = $this->session->get('valores');

        if (!$valores) {

            $valores = array();
            $valores['siniva'] = 0;
            $valores['coniva'] = 0;
        }

        if (!$this->request->isPost()) {

            return $this->dispatcher->forward([
                        'controller' => "ventas",
                        'action' => 'productos',
                        'params' => [$refNumber]
            ]);
        }

        $form = new TicketProductoForm;
        $ticketline = new Aticketline();
        $ticket = Aticket::findFirstByTxnID($refNumber);
        $parameters = $this->request->getPost('ItemRefListID');
        $item = Items::findFirstByquickbooks_listid($parameters);

        if (!$item) {

            $this->flash->error('TREMENDO ERROR llame urgentemente al Administrador');
        }


        $data = $this->request->getPost();

        if (!$form->isValid($data)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                        "action" => "productos",
                        "params" => [$refNumber]
            ]);
        }

        /**
         * @tutorial procesar linea de producto
         * @param string $item->type    El tipo de factura proviene del Quickbooks (inventarios, producto terminado, servicios ..)
         * @param string $ticketline->Qty Cuando es por servicios o otros cargos se puede facturar solo por valor por lo que la cantidad es 1
         */
        $clave = $refNumber . $this->request->getPost("ItemRefListID");
        $fecha = date('Y-m-d H:m:s');
        $ticketline->setTxnLineID($clave);
        $ticketline->setTimeCreated($fecha);
        $ticketline->setTimeModified($fecha);
        $ticketline->setItemRefListID($this->request->getPost("ItemRefListID"));
        $ticketline->setItemRefFullName($item->getsales_desc());

        if ($item->gettipo() === 'Assembly') {

            $ticketline->setQty($this->request->getPost("qty"));
            $ticketline->setPrice($item->getsales_price());
            $ticketline->setSubTotal($item->getsales_price() * $this->request->get('qty'));
            $ticketline->setIva(($item->getsales_price() * $this->request->get('qty')) * 12 / 100);
        } else {

            $ticketline->setQty(1);
            $ticketline->setPrice($this->request->getPost("qty"));
            $ticketline->setSubTotal($this->request->get('qty'));
            $ticketline->setIva(($this->request->get('qty')) * 12 / 100);
        }

        $ticketline->setIDKEY($ticket->TxnID);
        $ticketline->setEstado('ACTIVO');

        $valores['refnumber'] = $refNumber;
        $valores['subtotal'] = $valores['subtotal'] + $item->getsales_price() * $this->request->get('qty');
        $valores['iva'] = $valores['iva'] + ($item->getsales_price() * $this->request->get('qty')) * 12 / 100;
        $this->session->set('valores', $valores);

        if (!$ticketline->save()) {

            foreach ($ticketline->getMessages() as $message) {

                $this->flash->error($message . " codigo " . $this->request->getPost('ItemRefListID') . " Producto " . $item->getsales_desc());
            }

            return $this->dispatcher->forward([
                        'action' => 'productos',
                        'params' => [$refNumber]
            ]);
        }

        return $this->dispatcher->forward([
                    'action' => 'productos',
                    'params' => [$refNumber]
        ]);
    }

    public function delproductoAction($TxnLineID) {
        $ticketline = Aticketline::findFirstByTxnLineID($TxnLineID);
        $ticketline->delete();
        $valores = $this->session->get('valores');
        $refNumber = $valores['refnumber'];
        return $this->dispatcher->forward([
                    'action' => 'productos',
                    'params' => [$refNumber]
        ]);
    }

    public function facturarAction($RefNumber) {

        $valores = $this->session->get('valores');
        $ftipo = $this->session->get('tipofactura');
        $contribuyente = $this->session->get('contribuyente');
        $ticket = new Aticket();
        $ticket = Aticket::findFirstByTxnID($valores['refnumber']);
        if (!$ticket) {
            $this->flash->error('Que esta pasando con ' . $valores['refnumber'] . ' o sera ' . $RefNumber);
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $cliente = new Customer();
        $cliente = Customer::findFirstByListID($ticket->getCustomerRefListID());

        if (!$cliente) {
            $this->flash->success('No hay cliente? ' . $ticket->getCustomerRefListID());
            return $this->dispatcher->forward([
                        'controller' => "home",
                        'action' => 'index'
            ]);
        }
        $invoice = new Invoice();
        $fecha = date('Y-m-d H:m:s');
        $invoice->setAppliedAmount($valores['subtotal'] + $valores['iva']);
        $invoice->setBalanceRemaining($valores['subtotal'] + $valores['iva']);
        $invoice->setBillAddressAddr1($cliente->getBillAddressAddr1());
        $invoice->setBillAddressCity($cliente->getBillAddressCity());
        $invoice->setBillAddressCountry($cliente->getBillAddressCountry());
        $invoice->setBillAddressPostalCode($cliente->getBillAddressPostalCode());
        $invoice->setBillAddressState($cliente->getBillAddressState());
        $invoice->setCustomerRefFullName($cliente->getFullName());
        $invoice->setCustomerRefListID($cliente->getListID());
        $invoice->setClassRefFullName($cliente->getClassRefFullName());
        $invoice->setClassRefListID($cliente->getClassRefListID());
        $invoice->setCustomField1($cliente->getCustomField1());
        $invoice->setCustomField2(substr($ticket->getNotasComprador(), 0, 49));
        $invoice->setCustomField3(substr($ticket->getTerminosCondiciones(), 0, 49));
        $invoice->setCustomField9($cliente->getCustomField9());
        $invoice->setCustomField10('SIN IMPRIMIR');
        $invoice->setCustomField11($cliente->getPhone());
        $invoice->setCustomField12($cliente->getEmail());
        $invoice->setCustomField13('sin firmar');
        $invoice->setCustomField14('sin firmar');
        $invoice->setCustomField15('SIN FIRMAR');
        $invoice->setCustomerSalesTaxCodeRefFullName($cliente->getSalesTaxCodeRefFullName());
        $invoice->setCustomerSalesTaxCodeRefListID($cliente->getSalesTaxCodeRefListID());
        $formapago = array("0" => "0", "1" => "7", "2" => "15", "3" => "30", "4" => "45", "6" => "60", "7" => "90");
        $DueDate = date('Y-m-d H:m:s', strtotime($fecha . '+ ' . $formapago[$ticket->getFplazo()] . ' days'));
        $invoice->setDueDate($DueDate);
        $EditSequence = rand(1000, 10000000);
        $invoice->setEditSequence($EditSequence);
//        $invoice->setItemSalesTaxRefFullName($ItemSalesTaxRef_FullName);
//        $invoice->setItemSalesTaxRefListID($ItemSalesTaxRef_ListID);
        $invoice->setMemo($ticket->getReferencia());
//        $invoice->setOther($Other);
        $invoice->setRefNumber($ticket->getRefNumber());
        $invoice->setSalesRepRefFullName($cliente->getSalesRepRefFullName());
        $invoice->setSalesRepRefListID($cliente->getSalesRepRefListID());
//        $invoice->setSalesTaxPercentage();
        $invoice->setSalesTaxTotal($valores['iva']);
        $invoice->setStatus('GRABADO');
        $invoice->setSubtotal($valores['subtotal']);
        $invoice->setTermsRefFullName($cliente->getTermsRefFullName());
        $invoice->setTermsRefListID($cliente->getTermsRefListID());
        $invoice->setTimeCreated($fecha);
        $invoice->setTimeModified($fecha);
        $invoice->setTxnDate($ticket->getTxnDate());
        $invoice->setTxnNumber($ticket->getFnumero());
        $invoice->setCustomField8($ticket->getGestab() . '-' . $ticket->getGpunto() . '-' . $ticket->getGnumero());
        $invoice->setTxnID($ticket->getTxnID());
        /**
         *  Vamos a guardar el tipo de facturacion en el campo other
         *  Ponemos en ese campo el valor del Quickbooks
         */
        $invoice->setOther($ftipo['destipo']);
        if (!$invoice->save()) {
            foreach ($invoice->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }
        $parameters = array('conditions' => 'IDKEY = :clave:', 'bind' => array('clave' => $ticket->getTxnID()));
        $productos = Aticketline::find($parameters);
        $i = 0;
        foreach ($productos as $producto) {
            $item = new Items();
            $item = Items::findFirstByquickbooks_listid($producto->getItemRefListID());
            $i++;
            $invoicedetail = new Invoicelinedetail();
            $invoicedetail->setTxnLineID($ticket->getTxnID() . '-' . $i);
            $invoicedetail->setAmount($producto->getSubTotal());
            $invoicedetail->setClassRefFullName($cliente->getClassRefFullName());
            $invoicedetail->setClassRefListID($cliente->getClassRefListID());
            $invoicedetail->setDescription($item->getsales_desc());
            $invoicedetail->setIDKEY($ticket->getTxnID());
            $invoicedetail->setItemRefFullName($item->getfullname());
            $invoicedetail->setItemRefListID($item->getquickbooks_listid());
            $invoicedetail->setQuantity($producto->getQty());
            $invoicedetail->setRate($producto->getPrice());
            $invoicedetail->setSalesTaxCodeRefFullName($item->getsales_tax_code_ref_fullname());
            $invoicedetail->setSalesTaxCodeRefListID($item->getsales_tax_code_ref_listid());
            $invoicedetail->setUnitOfMeasure($item->getunit_of_measure_set_ref_fullname());

            if (!$invoicedetail->save()) {
                foreach ($invoicedetail->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                    'controller' => "index",
                    'action' => 'index'
                ]);

                return;
            }
        }

        /**
         *  Una vez facturado se procede a actualizar el pedido directo en los archivos de pedidos aticket
         */
        $ticket->Iva = $valores['iva'];
        $ticket->SubTotal = $valores['subtotal'];
        $ticket->setEstado("FACTURADO");
        if (!$ticket->save()) {
            foreach ($ticket->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $this->session->set('vinode', 'Proceso Ventas');
        $this->session->remove('pendiente');
        $this->view->invoice = $invoice;
        $this->view->contribuyente = $contribuyente;
        $this->view->cliente = $cliente;
        $this->view->ticket = $ticket;
        $this->view->productos = $productos;
    }

}
