<?php

/**
 * @author Md. Maksud Alam Chowdhury
 *
 * creating a new event
 */
$app->post('/event/create', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $data = (array) $data;

            require_once 'EventRepository.php';
            $event = new EventRepository($app->db);
            echo $event->create($data);
        });


/**
 * @author Md. Maksud Alam Chowdhury
 *
 * updating a specified event
 */
$app->put('/event/update', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $data = (array) $data;

            require_once 'EventRepository.php';
            $event = new EventRepository($app->db);
            $event->updateEvent($data);
        });
$app->put('/event/attendee/inc', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);

            $event_id = $data;

            require_once 'EventRepository.php';
            $event = new EventRepository($app->db);
            $event->incrementTotalAttending($event_id);
        });
$app->put('/event/comment/inc', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);

            $event_id = $data;

            require_once 'EventRepository.php';
            $event = new EventRepository($app->db);
            echo $event->incrementTotalComments($event_id);
        });

/**
 * @author Md. Maksud Alam Chowdhury
 *
 * deleting an event
 */
$app->delete('/event/delete', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $data = (array) $data;

            require_once 'EventRepository.php';
            $event = new EventRepository($app->db);
            $event->deleteEvent($data['event_id']);
        });

/**
 * @author Md.Maksud Alam Chowdhury
 *
 * Combining a event with multiple categories threough
 * adding a single event with iterative category.
 *
 */
$app->post('/event_category/create', function()use($app) {

            $data = $app->request()->getBody();
            $data = json_decode($data);
            $data = (array) $data;

            require_once 'EventCategoryRepository.php';
            $event_category = new EventCategoryRepository($app->db);
            $event_category->add($data['event_id'], $data['category_id']);
        });

/**
 * @author Munna
 * Creating new Event Object
 */
$app->get('/events', function() use($app) {
            require_once 'EventRepository.php';

            $event = new EventRepository($app->db);

            $data = json_encode($event->getEvents());

            echo $data;
        });


/**
 * @author Md.Maksud Alam Chowdhury
 * @property this service is oriented to give all the events in a selected category
 *
 * @param categoryId
 * @return array of events entity
 */
$app->get('/events/category/:categoryId', function($categoryId) use($app) {

            require_once 'EventRepository.php';

            $event = new EventRepository($app->db);
            $data = $event->getActiveEventsByCategory($categoryId);
            $data = json_encode($data);
            echo $data;
        });



/**
 * @author Maksud Alam Chowdhury
 * @abstract aims to serve the pagination . returns the events for current page number(offset)
 * @param offset
 * @return events corresponding to maximum events that can be showed ina page.
 */
$app->get('/events/pagination/:offset', function($offset) use($app) {
            require_once 'EventRepository.php';

            $event = new EventRepository($app->db);

            $data = $event->getActiveEventsForPagination($offset);

            $data = json_encode($data);

            echo $data;
        });


/**
 * @author Md.Maksud Alam Chowdhury
 *
 * the followiing service is for retrieving a single event corresponding to event_id
 *
 * @param event_id
 * @return event entity;
 */
$app->get('/event/:event_id', function($event_id)use($app) {

            require_once 'EventRepository.php';
            $event = new EventRepository($app->db);

            $data = $event->getEventById($event_id);
            $data = json_encode($data);

            echo $data;
        });

/**
 * @author Md.Maksud Alam Chowdhury
 *
 * This service provides all the events corresponding to a user;
 *
 * @param user_id
 * @return events initiated by a single user;
 */
$app->get('/events/user/:userId', function($userId) use($app) {
            require_once 'EventRepository.php';

            $event = new EventRepository($app->db);
            $data = $event->getEventsByUserId($userId);
            $data = json_encode($data);

            echo $data;
        });


/**
 * @author Md.Maksud ALam Chowdhury
 *
 * service findign out total number of attendees.
 *
 * @param eventId
 * @return number of attendees.
 */
$app->get('/event/:eventId/attendee', function($eventId)use($app) {
            require_once 'EventRepository.php';

            $event = new EventRepository($app->db);
            $data = $event->getNumberOfAttendeesByID($eventId);
            $data = json_encode($data);
            echo $data;
        });
?>