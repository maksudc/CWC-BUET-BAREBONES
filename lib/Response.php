<?php

/**
 * Provides the data of the outgoing HTTP response
 */
class Response {
    const OK = 200;
    const CREATED = 201;
    const UNAUTHORIZED = 401;
    const NOTFOUND = 404;

    public $request;
    public $code = Response::OK;
    public $headers = array();
    public $body;

    public function __construct($request) {
        $this->request = $request;
    }

    public function addHeader($header, $value) {
        $this->headers[] = $header . ': ' . $value;
    }

    public function output() {

        foreach ($this->headers as $header) {

            header($header);
        }
        echo $this->body;
    }

}