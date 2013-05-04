<?php

class EventResource extends Resource {

    public function __construct($parameters) {
        parent::__construct($parameters);
    }

    public function get($request) {

        $params = $this->get_parameters();

       // if (count($params) == 1)
        {

            $event_id = $params[0];

            $event = App::getRepository('Event')->getEventById($event_id);

            $response = new Response($request);

            $response->addHeader('Content-Type', 'application/json');
            $response->body = json_encode($event);

            return $response;
        }
    }

}

?>
