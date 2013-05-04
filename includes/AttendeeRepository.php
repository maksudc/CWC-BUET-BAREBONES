<?php

class AttendeeRepository {

    /**
     * @var Sparrow
     */
    protected $db;

    public function __construct(Sparrow $db) {
        $this->db = $db;
    }

    public function insertAttendee($data) {
        $data['event_id'] = strip_tags($this->db->escape($data['event_id']));
        $data['user_id'] = strip_tags($this->db->escape($_SESSION['user']['user_id']));

        $this->db->from('attendees')
                ->insert($data)
                ->execute();

        return $this->db->insert_id;
    }

    public function getUserIDbyEventID($id) {

        return $this->db->from('attendees')
                ->where('event_id = ', $id)
                ->select('user_id')
                ->one();
    }

    public function getEventIDbyUserID() {

        $id = $this->db->escape($_SESSION['user']['user_id']);
        return $this->db->from('attendees')
                ->where('user_id = ', $id)
                ->select('event_id')
                ->one();
    }

    public function getUserByEventID($id) {
        $id = strip_tags($this->db->escape($id));
        $event_id = array('event_id' => $id);
        $user_id = array('user_id');
        return $this->db->from('attendees')
                ->where($event_id)
                ->select($user_id)
                ->many();
    }

}