<?php

/**
 * @author SALEH
 * Returns user id by event id..
 */
$app->get('/attendee/id/:event_id', function($event_id) use($app) {
            require_once 'AttendeeRepository.php';

            $attendee = new AttendeeRepository($app->db);
            $user_id = $attendee->getUserIDByEventID($event_id);
            $data = json_encode($user_id);

            echo $data;
        });

/**
 * @author SALEH
 * Returns user id by event id..
 */
$app->get('/attendee/event_id', function() use($app) {
            require_once 'AttendeeRepository.php';

            $attendee = new AttendeeRepository($app->db);
            $event_id = $attendee->getEventIDbyUserID();
            $data = json_encode($event_id);
            echo $data;
            //print_r($data);
        });

/**
 * @author SALEH
 * Insert new attendee for a particular event..
 */
$app->post('/attendee/add', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = (array) $data;

            require_once 'AttendeeRepository.php';
            $add_attendee = new AttendeeRepository($app->db);
            echo $add_attendee->insertAttendee($array_data);
        });

