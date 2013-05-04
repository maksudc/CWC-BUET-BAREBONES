<?php

class EventsResource extends Resource {

    public function __construct($parameters) {
        parent::__construct($parameters);
    }

    public function get($request) {

        /**
         * corresponds to /events
         */
        if (count($this->get_parameters() == 0)) {
            $events = App::getRepository('Event')->getActiveEvents();
            $response = new Response($request);
            $response->addHeader('Content-type', 'application/json');
            $response->body = json_encode($events);
            return $response;
        }

        $params = $this->get_parameters();

        /**
         * corresponds to /events/user/:userid
         */
        if ($params[0] == 'user') {

            $user_id = $params[1];

            $events = App::getRepository('Event')->getEventsByUserId($user_id);

            $response = new Response($request);
            $response->addHeader('Content-Type', 'application/json');
            $response->body = json_encode($events);

            return $response;
        }
    }

}