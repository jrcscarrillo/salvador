<?php

/**
 * SessionController
 *
 * Allows to authenticate users
 */
class SessionController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Sign In');
        parent::initialize();
    }

    public function indexAction() {

        /**
         *      Si no existen usuarios ni contribuyentes es primera vez que la aplicacion sera instalada
         *      se permite ingresar la empresa, su licencia y al administrador
         */
        $primeravez = 'NO';
        $users = Users::find();
        $contribuyente = Contribuyente::find();

        if ($users->count() === 0) {
            $usuario = ' --No hay usuarios-- ';
        }
        if ($contribuyente->count() === 0) {
            $usuario .= ' --No hay contribuyente-- ';
        }
        if ($users->count() === 0 || $contribuyente->count() === 0) {
            $primeravez = 'SI';
            $form = new PrimeraVezForm;
        } else {
            $form = new SessionForm;
        }
        var_dump($primeravez . $usuario);
        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {

                if ($form->getMessages()) {
                    foreach ($form->getMessages() as $message) {
//                        $this->flash->error((string) $message);
                    }
                }
            }
        }

        $this->view->primeravez = $primeravez;
        $this->view->form = $form;
    }

    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(Users $user) {
        $this->session->set('auth', array(
            'id' => $user->id,
            'username' => $user->username,
            'tipo' => $user->tipo,
            'tipoId' => $user->tipoId,
            'numeroId' => $user->numeroId,
            'email' => $user->email,
            'qbid' => $user->qbid,
            'name' => $user->name
        ));
    }

    /**
     * Register an authenticated ruc into session data
     *
     * @param Contribuyente     Ruc CodEmisor Punto
     */
    private function _registerRuc(Contribuyente $ruc) {
        $this->session->set('contribuyente', array(
            'id' => $ruc->Id,
            'estab' => $ruc->CodEmisor,
            'punto' => $ruc->Punto,
            'ruc' => $ruc->Ruc,
            'razon' => $ruc->Razon,
            'emision' => $ruc->Emision,
            'ambiente' => $ruc->Ambiente,
            'NombreComercial' => $ruc->NombreComercial,
            'DirMatriz' => $ruc->DirMatriz,
            'DirEmisor' => $ruc->DirEmisor,
            'Resolucion' => $ruc->Resolucion,
            'LlevaContabilidad' => $ruc->LlevaContabilidad
        ));
    }

    public function primeravezAction() {

        $usuario = new Users();
        $contribuyente = new Contribuyente();
        $licencia = new Licencia();

        $ruc = $this->request->getPost('Ruc');
        $estab = $this->request->getPost('CodEmisor');
        $punto = $this->request->getPost('Punto');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $name = $this->request->getPost("name");
        $username = $this->request->getPost("username");
        $tipo = "ADMINISTRADOR";
        $qbid = "{My Admin and IRS identification";
        $numeroId = $this->request->getPost('numeroId');
        $tipoId = $this->request->getPost('tipoId');
        $tipoemp = "Administrador";
        $Active = "Y";

        $fecha = date("d-m-Y H:m:s");

        $Ambiente = $this->request->getPost('Ambiente');
        $CodEmisor = $this->request->getPost('CodEmisor');
        $Contingencia = $this->request->getPost('Contingencia');
        $DirEmisor = $this->request->getPost('DirEmisor');
        $DirMatriz = $this->request->getPost('DirMatriz');
        $Emision = $this->request->getPost('Emision');
        $LastAccess = $fecha;
        $Licencia = "{This is a Temporal Number}";
        $LlevaContabilidad = $this->request->getPost('LlevaContabilidad');
        $Logo = "LOGO";
        $NombreComercial = $this->request->getPost('NombreComercial');
        $Password = sha1($this->request->getPost('Password'));
        $Punto = $this->request->getPost('Punto');
        $Resolucion = $this->request->getPost('Resolucion');
        $Razon = $this->request->getPost('Razon');

        $usuario->setActive($Active);
        $usuario->setEmail($email);
        $usuario->setName($name);
        $usuario->setNumeroId($numeroId);
        $usuario->setPassword($password);
        $usuario->setQbid($qbid);
        $usuario->setTipo($tipo);
        $usuario->setTipoId($tipoId);
        $usuario->setTipoemp($tipoemp);
        $usuario->setUsername($username);
        $mensaje = "Mensaje => ";
        try {
            if (!$usuario->save()) {
                foreach ($usuario->getMessages() as $message) {
                    $mensaje .= $message;
                }
                $this->view->error = $mensaje . ' Este Usuario no se ha podido registrar';
                return $this->dispatcher->forward(
                                [
                                    "action" => "index",
                                ]
                );
            }
        } catch (Exception $ex) {
            
        }


        $contribuyente->setRazon($Razon);
        $contribuyente->setAmbiente($Ambiente);
        $contribuyente->setCodEmisor($CodEmisor);
        $contribuyente->setContingencia($Contingencia);
        $contribuyente->setDirEmisor($DirEmisor);
        $contribuyente->setDirMatriz($DirMatriz);
        $contribuyente->setEmision($Emision);
        $contribuyente->setLastAccess($LastAccess);
        $contribuyente->setLicencia($Licencia);
        $contribuyente->setLlevaContabilidad($LlevaContabilidad);
        $contribuyente->setLogo($Logo);
        $contribuyente->setNombreComercial($NombreComercial);
        $contribuyente->setPassword($Password);
        $contribuyente->setPunto($Punto);
        $contribuyente->setResolucion($Resolucion);
        $contribuyente->setRuc($ruc);
        $contribuyente->setTimeCreated($fecha);
        $contribuyente->setTimeModified($fecha);
        $mensaje = "Mensaje => ";
        try {
            if (!$contribuyente->save()) {
                foreach ($contribuyente->getMessages() as $message) {
                    $mensaje .= $message;
                }
                $this->view->error = $mensaje . ' Este Contribuyente no se ha podido registrar';
                return $this->dispatcher->forward(
                                [
                                    "action" => "index",
                                ]
                );
            }
        } catch (Exception $ex) {
            
        }

        $licencia->setEstablecimiento($CodEmisor);
        $licencia->setEstado($Active);
        $licencia->setFechaInicio($fecha);
        $licencia->setFechaLogin($fecha);
        $licencia->setNumeroLicencia($Licencia);
        $licencia->setPuntoEmision($Punto);
        $licencia->setUserIn($email);
        $licencia->setRuc($ruc);
        $startDate = date_add($fecha, date_interval_create_from_date_string("45 days"));
        $licencia->setFechaFin($startDate);
        $mensaje = "Mensaje => ";
        try {
            if (!$licencia->save()) {
                foreach ($licencia->getMessages() as $message) {
                    $mensaje .= $message;
                }
                $this->view->error = $mensaje . ' Esta Licencia no se ha podido registrar';
                return $this->dispatcher->forward(
                                [
                                    "action" => "index",
                                ]
                );
            }
        } catch (Exception $ex) {
            
        }

        return $this->dispatcher->forward(
                        [
                            "controller" => "home",
                            "action" => "index",
                        ]
        );
    }

    /**
     * This action authenticate and logs an user into the application
     *
     */
    public function startAction() {

        $ruc = $this->request->getPost('ruc');
        $estab = $this->request->getPost('estab');
        $punto = $this->request->getPost('punto');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = Users::findFirst(array(
                    "(email = :email: OR username = :email:) AND password = :password: AND active = 'Y'",
                    'bind' => array('email' => $email, 'password' => sha1($password))
        ));
        $ruc = Contribuyente::findFirst(array(
                    "Ruc = :ruc:  AND CodEmisor = :estab: AND Punto = :punto:",
                    'bind' => array('ruc' => $ruc, 'estab' => $estab, 'punto' => $punto)
        ));

        if ($user and $ruc) {
            $this->_registerSession($user);
            $this->_registerRuc($ruc);
            $this->view->success = 'Welcome ' . $user->name;

            switch ($user->tipo) {
                case 'PROVEEDOR':
                    return $this->dispatcher->forward(
                                    [
                                        "controller" => "home",
                                        "action" => "index",
                                    ]
                    );
                    break;

                case 'CLIENTE':
                    return $this->dispatcher->forward(
                                    [
                                        "controller" => "home",
                                        "action" => "index",
                                    ]
                    );
                    break;

                default:


                    $ticket = Aticket::findFirst(array(
                                "Estado = :estado:",
                                "bind" => array("estado" => "GRABADO")
                    ));
                    if ($ticket) {
                        $this->session->set('pendiente', array(
                            "estado" => "GRABADO",
                            "TxnID" => $ticket->getTxnID(),
                            "RefNumber" => $ticket->getRefNumber()
                        ));
                    }
                    $pago = Receivepayment::findFirst(array(
                                "Status = :estado:",
                                "bind" => array("estado" => "GRABADO")
                    ));
                    if ($pago) {
                        $this->session->set('pagopendiente', array(
                            "estado" => "GRABADO",
                            "RefNumber" => $pago->getRefNumber(),
                            "TxnID" => $pago->getTxnID()
                        ));
                    }
//                $caja = Cashier::findFirst(array(
//                            "Estado = :estado:",
//                            "bind" => array("estado" => "ABIERTO")
//                ));
//                if ($caja) {
//                    $this->session->set('cajaabierta', array(
//                        "estado" => "ABIERTO",
//                        "RefNumber" => $caja->getRefNumber()
//                    ));
//                }
                    return $this->dispatcher->forward(
                                    [
                                        "controller" => "home",
                                        "action" => "index",
                                    ]
                    );
                    break;
            }
        }

//        $this->flash->error('No existen ni la direccion de correo ni la palabra clave - Vuelva ha intentarlo');
        return $this->dispatcher->forward(
                        [
                            "controller" => "session",
                            "action" => "index",
                        ]
        );
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction() {

//        $this->flash->success('Hasta Luego!');
        $this->view->success = 'Hasta Luego!';

        $this->session->remove('auth');
        $this->session->remove('ruc');
        $this->session->remove('sessionAccessToken');
        $this->session->destroy();

        return $this->dispatcher->forward(
                        [
                            "controller" => "session",
                            "action" => "index"
                        ]
        );
    }

}
