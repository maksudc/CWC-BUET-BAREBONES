<?php

/**
 * @author Md.Maksud Alam Chowdhury
 *
 * finding all the comments associated with a talk
 *
 * @param $talkId
 * @return comment entity
 */
$app->get('/comments/talk/:talkId', function($talkId)use($app) {
            require_once 'CommentRepository.php';

            $comment = new CommentRepository($app->db);
            $data = $comment->getCommentsByTalk($talkId);
            $data = json_encode($data);

            echo $data;
        });

/**
 * @author Md.Maksud Alam Chowdhury
 *
 * finding  comments associated with a event identitified by eventId.
 *
 * @param $eventId
 * @return  array of commments.
 */
$app->get('/comments/event/:eventId', function($eventId)use($app) {
            require_once 'CommentRepository.php';

            $comment = new CommentRepository($app->db);
            $data = $comment->getEventComments($eventId);
            $data = json_encode($data);

            echo $data;
        });

/**
 * @author Md.Maksud Alam Chowdhury
 *
 * Adding a new Comment body to the database .Which can be either  of talk comment or
 * event comment
 */
$app->post('/comment/create', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $data = (array) $data;

            require_once 'CommentRepository.php';
            $comment = new CommentRepository($app->db);
            $comment->create($data);

        });


/**
 * @author Md. Maksud Alam Chowdhury
 *
 * entry point for an event comment
 * note that the comment body might be in another place and iinternally
 * taht is stored in another table
 */
$app->post('/event_comment/create', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $data = (array) $data;

            require_once 'CommentRepository.php';
            $comment = new CommentRepository($app->db);
            $comment->createEventComment($data);
        });
?>