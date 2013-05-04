<?php


class EventCategoryRepository
{
    protected $db;

    public function __construct(Sparrow $db)
    {
        $this->db = $db;
    }
    public function add($event_id,$category_id)
    {
        $data['event_id'] = $event_id;
        $data['category_id'] = $category_id;
        $this->db->from('event_category')
                 ->insert($data)
                 ->execute();
    }
}

?>
