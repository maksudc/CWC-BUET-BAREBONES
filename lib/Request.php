<?php

/**
 * Process the incoming HTTP request
 */
class Request {

    public $uri;
    public $supportedHttpMethods = array('GET', 'POST');
    public $defaultMethod = 'GET';
    public $requestData;
    public $resources = array('Events');
    public $method;

    public function __construct($requestData = array()) {
        $this->requestData = $requestData;
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function loadResource() {


        if (in_array($this->method, $this->supportedHttpMethods)) {
            $resource_uri = explode('/', $this->uri);

            $index = in_array('api', $resource_uri) + 1;

            $index++;
            $resource = $resource_uri[$index];

            $index++;

            for ($j=0,$i = $index; $i < count($resource_uri); $i++,$j++) {
                $param[$j] = $resource_uri[$i];
            }
            
            $class = ucfirst($resource) . 'Resource';

            return new $class($param);
        }
    }

}
