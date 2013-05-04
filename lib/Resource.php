<?php

/**
 * Base resource class
 */
abstract class Resource {

    private $parameters;

    public function __construct($parameters) {

        $this->parameters = $parameters;
    }

    public function exec($request) {

        $method = strtolower($request->method);
        return $this->$method($request);
    }

    public function get_parameters() {

        return $this->parameters;
    }

}
