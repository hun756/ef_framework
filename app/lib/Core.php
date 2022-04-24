<?php

/**
 * @brief
 *  Application Care Clas
 *  It creates url formatter.
 */
class Core {
    protected $currentController = 'Welcome'; /* default */
    protected $currentMethod = 'Index'; /* default */
    protected $params = [];

    public function __construct() {
        $uri = $this->getUrL();

        if(file_exists('./app/controller/' . ucwords($uri[0]) . '.php')) {
            $this->currentController = ucwords($uri[0]);

            // Now unset index
            unset($uri[0]);
        }

        // insert controller
        require_once('./app/controller/' . $this->currentController . '.php');

        // instantiate
        $this->controller = new $this->currentController;

        // seconda checking, uri parameters (For method)
        if(isset($uri[1])) {
            if (method_exists($this->currentController, $uri[1])) {
                $this->currentMethod = $uri[1];

                // unset index 1
                unset($uri[1]);
            }
        }

        // next parse param in uri
        $this->params = $uri ? array_values($uri) : [];

        // callback with parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }
    

    public function getUrl() {
        if(isset($_SERVER['REQUEST_URI'])) {
            $url = substr(rtrim($_SERVER['REQUEST_URI'], '/'), 1);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            throw new Exception('Error while parsing uri.');
        }
    }
}