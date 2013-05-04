<?php

class EventRepository {

    /**
     * @var Sparrow
     */
    protected $db;

    public function __construct(Sparrow $db) {
        $this->db = $db;
    }

    public function getActiveEvents() {
        return $this->db->from('events')
                ->where('is_active = ', 1)
                ->many();
    }

    public function getActiveEventsForPagination($off=0) {
        $off = strip_tags($this->db->escape($off));
        return $this->db->from('events')
                ->limit(3)
                ->offset($off)
                ->where('is_active = ', 1)
                ->many();
    }

    public function getEvents() {
        // $off=strip_tags($this->db->escape($off));
        return $this->db->from('events')
                ->where('is_active = ', 1)
                ->many();
    }

    public function search_event_by_title($title) {

        return $this->db->from('events')
                ->where('title = ', $title)
                ->select('event_id')
                ->one();
    }
    
     public function search_event_by_start_date($start_date) {

        return $this->db->from('events')
                ->where('start_date = ', $start_date)
                ->select('event_id')
                ->one();
    }
    
     public function search_event_by_end_date($end_date) {

        return $this->db->from('events')
                ->where('end_date = ', $end_date)
                ->select('event_id')
                ->one();
    }
    
    public function search_event_by_href($href) {

        return $this->db->from('events')
                ->where('href = ', $href)
                ->select('event_id')
                ->one();
    }

    public function getActiveEventsByCategory($categoryId) {

        $temp = $this->db->from('event_category')
                ->where('category_id = ', $categoryId)
                ->many();


        foreach ($temp as $row) {
            $data[] = $this->db->from('events')
                    ->where('event_id = ', $row['event_id'])
                    ->one();
        }

        return $data;
    }

    public function getEventById($event_id) {
        $event_id = strip_tags($this->db->escape($event_id));
        $event_id = intval($event_id);
        return $this->db->from('events')
                ->where('event_id =', $event_id)
                ->one();
    }

    public function getEventsByUserId($user_id='') {

        if (empty($user_id))
            $user_id = $_SESSION['user']['user_id'];
        return $this->db->from('events')
                ->where('user_id = ', $user_id)
                ->where('is_active = ', 1)
                ->select()
                ->many();
    }

    public function incrementTotalAttending($event_id) {
        $event_id = strip_tags($this->db->escape($event_id));
        $user_id = $_SESSION['user']['user_id'];
        $current = $this->db->from('events')
                ->where('event_id', $event_id)
                ->where('user_id', $user_id)
                ->one();
        $total = $current['total_attending'] + 1;
        $data['total_attending'] = $total;

        return $this->db->from('events')
                ->where('event_id', $event_id)
                ->where('user_id', $user_id)
                ->update($data)
                ->execute();
    }

    public function incrementTotalComments($event_id) {
        $event_id = strip_tags($this->db->escape($event_id));
        $user_id = $_SESSION['user']['user_id'];

        $current = $this->db->from('events')
                ->where('event_id', $event_id)
                ->one();
        $total = $current['total_comments'] + 1;

        $data['total_comments'] = $total;

        return $this->db->from('events')
                ->where('event_id', $event_id)
                ->update($data)
                ->execute();
    }

    public function create($data) {
        $data['user_id'] = $_SESSION['user']['user_id'];

        $this->db->from('events')
                ->insert($data)
                ->execute();

        return $this->db->insert_id;
    }
    

    public function updateEvent($data) {

        $user_id = $_SESSION['user']['user_id'];
        $event_id = strip_tags($this->db->escape($data['event_id']));
        unset($data['event_id']);

        return $this->db->from('events')
                ->update($data)
                ->where('user_id', $user_id)
                ->where('event_id', $event_id)
                ->execute();
    }

    public function deleteEvent($event_id) {
        $user_id = $_SESSION['user']['user_id'];
        return $this->db->from('events')
                ->where('user_id', $user_id)
                ->where('event_id', $event_id)
                ->delete()
                ->execute();
    }

    /**
     * @author Saleh
     * 
     */
    public function getNumberOfAttendeesByID($id) {
        $id = strip_tags($this->db->escape($id));
        return $this->db->from('events')
                ->join('attendees', array('events.event_id' => 'attendees.event_id'))
                ->where('events.event_id', $id)
                ->select('count(*)')
                ->one();
    }

    public function getEventSearchResult($data) {


        return $this->db->from('events')
                ->where('|title %', $data['title'])
                ->where('|location %', $data['location'])
                ->where('|href %', $data['href'])
                ->where('|category_id = ', $data['category_id'])
                ->many();
    }

}

