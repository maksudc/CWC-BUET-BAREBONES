<?php

class CommentRepository {

    /**
     * @var Sparrow
     */
    protected $db;

    public function __construct(Sparrow $db) {
        $this->db = $db;
    }

    public function getCommentsByTalk($talkId) {
        $talkId = strip_tags($this->db->escape($talkId));
        return $this->db->from('comments')
                ->join('users', array('comments.user_id' => 'users.user_id'))
                ->where('talk_id = ', $talkId)
                ->many();
    }

    public function create($data) {
        $data['user_id'] = $this->db->escape($_SESSION['user']['user_id']);
        $data['body'] = strip_tags($this->db->escape($data['body']));
        return $this->db->from('comments')
                ->insert($data)
                ->execute();
    }

    public function createEventComment($data) {
        $data['user_id'] = $this->db->escape($_SESSION['user']['user_id']);
        $data['body'] = strip_tags($this->db->escape($data['body']));
        return $this->db->from('event_comments')
                ->insert($data)
                ->execute();
    }

    public function getEventComments($eventid) {
        $eventid = strip_tags($this->db->escape($eventid));
        $eventid = intval($eventid);
        return $this->db->from('event_comments')
                ->where('event_id', $eventid)
                ->many();
    }

}