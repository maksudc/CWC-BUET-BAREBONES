<?php

class TalkResource extends Resource {

    public function __construct($parameters) {
        parent::__construct($parameters);
    }

    public function get($request) {

        if (count($this->get_parameters() == 1)) {
            $url = $this->get_parameters();

            $talks = App::getRepository('Talk')->getTalkById($url[0]);
            $response = new Response($request);
            $response->addHeader('Content-type', 'application/json');
            $response->body = json_encode($talks);
            return $response;
        } else if (count($this->get_parameters() == 2)) {

            $url = $this->get_parameters();

            $talks = App::getRepository('Talk')->getTalksByEvent($url[1]);
            $response = new Response($request);
            $response->addHeader('Content-type', 'application/json');
            $response->body = json_encode($talks);
            return $response;
        } else if (count($this->get_parameters() == 3)) {
            $url = $this->get_parameters();

            $talks = App::getRepository('Talk')->getTalksByEventandID($url[2], $url[3]);
            $response = new Response($request);
            $response->addHeader('Content-type', 'application/json');
            $response->body = json_encode($talks);
            return $response;
        }
    }

}