<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router as ruta;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaData;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Events\Manager as EventsManager;

class Services extends \base\Services {

    /**
     * We register the events manager
     */
    protected function initDispatcher() {
        $eventsManager = new EventsManager;

        /**
         * Check if the user is allowed to access certain action using the SecurityPlugin
         */
        $eventsManager->attach('dispatch:beforeDispatch', new SecurityPlugin);

        /**
         * Handle exceptions and not-found exceptions using NotFoundPlugin
         */
        $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);

        $dispatcher = new Dispatcher;
        $dispatcher->setEventsManager($eventsManager);
//        var_dump($dispatcher);
        return $dispatcher;
    }

    /**
     * The URL component is used to generate all kind of urls in the application
     */
    protected function initUrl() {
        $url = new UrlProvider();
        $url->setBaseUri($this->get('config')->application->baseUri);
        return $url;
    }

    protected function initView() {
        $view = new View();

        $view->setViewsDir(APP_PATH . $this->get('config')->application->viewsDir);

        $view->registerEngines(array(
            ".volt" => 'volt'
        ));

        return $view;
    }

    /**
     * Setting up volt
     */
    protected function initSharedVolt($view, $di) {
        $volt = new VoltEngine($view, $di);

        $volt->setOptions(array(
            "compiledPath" => APP_PATH . "cache/volt/"
        ));

        $compiler = $volt->getCompiler();
        $compiler->addFunction('is_a', 'is_a');
        $compiler->addFilter('number_format', 'number_format');
        $compiler->addFilter('date', 'date');
        $compiler->addFunction('strtotime', 'strtotime');

        return $volt;
    }

    /**
     * Database connection is created based in the parameters defined in the configuration file
     */
    protected function initDb() {
        $config = $this->get('config')->get('database')->toArray();

        $dbClass = 'Phalcon\Db\Adapter\Pdo\\' . $config['adapter'];
        unset($config['adapter']);

        return new $dbClass($config);
    }

    /**
     * If the configuration specify the use of metadata adapter use it or use memory otherwise
     */
    protected function initModelsMetadata() {
        return new MetaData();
    }

    /**
     * Start the session the first time some component request the session service
     */
    protected function initSession() {
        $session = new SessionAdapter();
        $session->start();
        return $session;
    }

    /**
     * Register the flash service with custom CSS classes
     */
    protected function initFlashSession() {
        return new FlashSession(array(
            'error' => 'bg-danger text-white',
            'success' => 'bg-success text-white',
            'notice' => 'bg-info text-white',
            'warning' => 'bg-warning text-black'
        ));
    }

    /**
     * Register the flash service with custom CSS classes
     */
    protected function initFlash() {
        return new Flash(array(
            'error' => 'bg-danger text-white',
            'success' => 'bg-success text-white',
            'notice' => 'bg-info text-white',
            'warning' => 'bg-warning text-black'
        ));
    }

    /**
     * Register a user component
     */
    protected function initElements() {
        return new Elements();
    }

    /**
     * Registra otros componentes
     */

    protected function initRouter() {
        $em = new EventsManager();
        $router = new ruta();
        $router->add(
                '/:controller/:action/:params', [
            'controller' => 1,
            'action' => 2,
            'params' => 3
                ]
        );

        $em->attach('router', new RouterListener);
        $router->setEventsManager($em);

        return $router;
    }

}
