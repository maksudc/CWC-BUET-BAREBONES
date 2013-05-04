<?php

class TalkRepository {

    /**
     * @var Sparrow
     */
    protected $db;

    public function __construct(Sparrow $db) {
        $this->db = $db;
    }

    public function getTalksByEvent($eventId) {
        $eventId = strip_tags($this->db->escape($eventId));
        $eventId = intval($eventId);
        return $this->db->from('talks')
                ->where('event_id = ', $eventId)
                ->many();
    }

    public function getTalkById($talkId) {
        $talkId = strip_tags($this->db->escape($talkId));
        return $this->db->from('talks')
                ->where('talk_id = ', $talkId)
                ->one();
    }

    public function create($data) {
        $this->db->from('talks')
                ->insert($data)
                ->execute();

        return $this->db->insert_id;
    }

    public function update($data) {
        $event_id = strip_tags($this->db->escape($data['event_id']));
        $talk_id = strip_tags($this->db->escape($data['talk_id']));

        unset($data['event_id']);
        unset($data['talk_id']);

        return $this->db->from('talks')
                ->where('event_id', $event_id)
                ->where('talk_id', $talk_id)
                ->update($data)
                ->execute();
    }

    public function getTalkbySearch($data) {
        return $this->db->from('talks')
                ->where($data)
                ->many();
    }

    public function delete($talk_id) {
        return $this->db->from('talks')
                ->where('talk_id = ', $talk_id)
                ->delete()
                ->execute();
    }

    public function incrementTotalComments($talk_id) {
        $user_id = $_SESSION['user']['user_id'];
        $talk_id = strip_tags($this->db->escape($data['talk_id']));
        $current = $this->db->from('talks')
                ->where('talk_id  = ', $talk_id)
                ->one();
        $total = $current['total_comments'] + 1;

        $data['total_comments'] = $total;

        return $this->db->from('talks')
                ->where('talk_id = ',$talk_id)
                ->update($data)
                ->execute();
    }

    public function getRating($id) {

        return $this->db->from('talks')
                ->where('talk_id = ', $id)
                ->select('total_comments')
                ->one();
    }

    public function getSearchResult($data) {
        return $this->db->from('talks')
                ->where('|title %', $data['title'])
                ->where('|speaker %', $data['speaker'])
                ->where('|slide_link', $data['slide_link'])
                ->where('|event_id', $data['event_id'])
                ->many();
    }

}