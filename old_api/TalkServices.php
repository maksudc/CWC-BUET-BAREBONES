<?php

/**
 * @author SALEH
 * Returns the talks corresponding to an event having specific id..
 */
$app->get('/event/:eventId/talks', function($eventId) use($app) {
            require_once 'TalkRepository.php';

            $event = new TalkRepository($app->db);
            $talks = $event->getTalksByEvent($eventId);
            print_r($talks);
            $data = json_encode($talks);
            //print_r($data);
        });

/**
 * @author SALEH
 * Returns the talks corresponding to a specific event id..
 */
$app->get('/talk/:talk_id/rating', function($talk_id) use($app) {
            require_once 'TalkRepository.php';

            $talk = new TalkRepository($app->db);
            $rating = $talk->getRating($talk_id);
            //echo $rating;
            print_r($rating);
            $data = json_encode($rating);
            //print_r($data);
        });

/**
 * @author SALEH
 * Returns the talk corresponding to a specific talk id..
 */
$app->get('/talk/:talk_id', function($talk_id) use($app) {
            require_once 'TalkRepository.php';

            $talks = new TalkRepository($app->db);
            $talk = $talks->getTalkById($talk_id);
            //echo $rating;
            print_r($talk);
            $data = json_encode($talk);
            //print_r($data);
        });
/**
 * @author SALEH
 * Creates new talks..
 */
$app->post('/talk/create', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = (array) $data;

            require_once 'TalkRepository.php';
            $talk_info = new TalkRepository($app->db);
            $talk_info->create($array_data);
        });

/**
 * @author SALEH
 * Returns the search result for specified information..
 */
$app->post('/talk/search', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = (array) $data;

            require_once 'TalkRepository.php';
            $talk_info = new TalkRepository($app->db);
            echo $talk_info->getSearchResul($array_data);
        });

/**
 * @author SALEH
 * Increments total comments for a specified talk..
 */
$app->post('/talk/inc_comment', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);

            require_once 'TalkRepository.php';
            $talk_info = new TalkRepository($app->db);
            $talk_info->incrementTotalComments($data);
        });

/**
 * @author SALEH
 * Update talks..
 */
$app->put('/talk/update', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = (array) $data;

            require_once 'TalkRepository.php';
            $talk_info = new TalkRepository($app->db);
            $talk_info->update($array_data);
        });

/**
 * @author SALEH
 * Delete a particular talk..
 */
$app->delete('/talk/delete', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = $data;

            require_once 'TalkRepository.php';
            $talk_info = new TalkRepository($app->db);
            $talk_info->delete($array_data);
        });
