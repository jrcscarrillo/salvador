<?php

use Phalcon\Mvc\User\Component;
use Phalcon\Db\Adapter\Pdo\Mysql;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component {

    private $_headerMenu = array();


    public function getLoginLogout() {
        /**
         * 
         */
        $auth = $this->session->get('auth');
        if ($auth) {
            echo ('<li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Cambiar Clave</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>Ver Perfil</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i> <span>Registrarse</span></a></li>
                    <li class="nav-item"><a href="/salvador/contact/index" class="nav-link"><i data-feather="help-circle"></i> <span>Ayuda</span></a></li>
                    <li class="nav-item"><a href="/salvador/session/end" class="nav-link"><i data-feather="log-out"></i> <span>Salir</span></a></li>');
        } else {
            echo ('<li class="nav-item"><a href="register/index" class="nav-link"><i data-feather="settings"></i> <span>Registrarse</span></a></li>
                    <li class="nav-item"><a href="session/index" class="nav-link"><i data-feather="log-in"></i> <span>Login</span></a></li>');
        }
    }

    public function getMenu() {

        $auth = $this->session->get('auth');
        $ruc = $this->session->get('contribuyente');
        $cap = 'Establecimiento y Punto de Emision';
        if ($ruc) {

            $cap = $ruc['NombreComercial'] . ' E ' . $ruc['estab'] . ' P ' . $ruc['punto'];
        }

        $primeravez = true;
        $controllerName = $this->view->getControllerName();

            if ($primeravez) {
                $primeravez = false;
                $salida = "ICONOS => ";
                if ($auth) {
                    $controllerName = $this->view->getControllerName();
                    $actionName = $this->view->getActionName();
                    $tipo = $auth['tipo'];
                    $args = array('conditions' => 'modelType = ?1 AND modelDes = ?2',
                        'bind' => array(
                            1 => 6,
                            2 => $tipo),
                        'order' => 'menuGroup, menuOrder'
                    );
                    $registros = Modelos::find($args);
                    $ctrl = 'inicio';
                    foreach ($registros as $pestania) {
                        if ($ctrl === 'inicio') {
                            $it1 = '<li class="nav-label">';
                            $it1 .= $pestania->menuGroup . '</li>';
                            echo $it1;
                            $ctrl = $pestania->menuGroup;
                        }
                        if ($ctrl != $pestania->menuGroup) {
                            $it1 = '<li class="nav-label mg-t-25">';
                            $it1 .= $pestania->menuGroup . '</li>';
                            echo $it1;
                            $ctrl = $pestania->menuGroup;
                        }
                        echo '<li class="nav-item">';
                        $it1 = '<a class="nav-link" href="/salvador/' . $pestania->modelName . '/' . $pestania->actionName . '"><i data-feather="' . $pestania->featherName . '"></i> <span>' . $pestania->menuName . '</span></a></li>';
                        echo $it1;
                        $salida .= $it1;
                    }
                    
                }
            }
            $this->session->salida = $salida;
    }

    public function poneMenuModelo($tipo) {
        $args = array('conditions' => 'modelType = ?1 AND modelDes = ?2',
            'bind' => array(
                1 => 6,
                2 => $tipo),
            'order' => '[menuOrder]'
        );
        $registros = Modelos::find($args);
        $loscontroladores = array();
        foreach ($registros as $pestania) {
            $loscontroladores[$pestania->menuName] = array('controller' => $pestania->modelName, 'action' => $pestania->actionName, 'any' => true);
        }
        return $loscontroladores;
    }

    public function getTabs() {
        
    }

    public function getModelosAdicional() {
        $conn = new Mysql([
            'host' => $this->config->database->host,
            'username' => $this->config->database->username,
            'password' => $this->config->database->password,
            'dbname' => $this->config->database->dbname,
        ]);
        $control = $this->dispatcher->getControllerName();
        $accion = $this->dispatcher->getActionName();
        $sql = 'SELECT * FROM modelos WHERE modelName = ? AND actionName = ?;';
        $registros = $conn->query($sql, [$control, $accion]);
        $valido = array();
        $valido['cabecera'] = 'Sin Cabeceras';
        $valido['titulo'] = 'Sin Titulo';
        $valido['subtitulo'] = 'Sin Sub-Titulos';
        $valido['lineas'][0] = 'Sin mensajes';
        $i = 0;
        if ($registros->numRows() == 0) {
            
        } else {
            while ($modelo = $registros->fetch()) {
                switch ($modelo['modelType']) {
                    case 1:
                        $valido['cabecera'] = $modelo['modelDes'];
                    case 2:
                        $valido['titulo'] = $modelo['modelDes'];
                        break;
                    case 3:
                        $valido['subtitulo'] = $modelo['modelDes'];
                        break;
                    case 4:
                        $valido['lineas'][$i] = $modelo['modelDes'];
                        $i++;
                        break;

                    default:
                        break;
                }
            }
        }
        $this->view->descriptivo = $valido;
    }

    public function getCreditoErrors() {
        $erroresNCR = $this->session->get('erroresNCR');
        $l = count($erroresNCR) + 1;
        for ($index = 1; $index < $l; $index++) {

            echo '<div class="l-row"><div class="l-col12"><section class="alert alert-danger"><strong>' . $erroresNCR[$index]['ItemRefFullName'] . '</strong> Cantidad superior a la factura.</section></div></div>';
        }
    }

}
