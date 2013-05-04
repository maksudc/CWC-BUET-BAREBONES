<?php

class UserRepository {

    /**
     * @var Sparrow
     */
    protected $db;

    public function __construct(Sparrow $db) {
        $this->db = $db;
    }

    public function getUserByEmail($email) {
        $email = $this->db->escape($email);
        return $this->db->from('users')
                ->where('email = ', $this->db->escape($email))
                ->one();
    }

    public function getUserNameByEmail($email) {
        $email = $this->db->escape($email);
        return $this->db->from('users')
                ->where(array('email' => $this->db->escape($email)))
                ->select(array('name'))
                ->one();
    }

    public function create($email) {

        return $this->db->from('users')
                ->insert(array('email' => $this->db->escape($email)))
                ->execute();
    }

    public function updatePhoto($target) {
        $data['user_id'] = $this->db->escape($_SESSION['user']['user_id']);
        $update_data = array('user_photo' => $this->db->escape($target));

        return $this->db->from('user_photo')
                ->where($data)
                ->update($update_data)
                ->execute();
    }

    public function updateName($name, $email) {
        $query_str = $this->db->from('users')
                ->where(array('email' => $this->db->escape($email)))
                ->update(array('name' => $this->db->escape($name)))
                ->execute();
        return TRUE;
    }

    public function insertPhoto($target_link) {
        $data['user_id'] = $this->db->escape($_SESSION['user']['user_id']);
        $data['user_photo'] = $this->db->escape($target_link);

        return $this->db->from('user_photo')
                ->insert($data)
                ->execute();
    }

    public function getPhoto() {
        $data['user_id'] = $this->db->escape($_SESSION['user']['user_id']);
        $image = array('user_photo');

        return $this->db->from('user_photo')
                ->where($data)
                ->select($image)
                ->one();
    }

    public function getIDFromUserPhoto() {
        $data['user_id'] = $this->db->escape($_SESSION['user']['user_id']);
        $id = array('user_photo');
        return $this->db->from('user_photo')
                ->where($data)
                ->select($id)
                ->one();
    }

    public function getPhotoByID($id) {
        $field['user_id'] = $id;
        $data = array('user_photo');
        return $this->db->from('user_photo')
                ->where($field)
                ->select($data)
                ->one();
    }
    
    public function getNameByID($id){
     
        return $this->db->from('users')
                ->where('user_id = ',$id)
                ->select('name')
                ->one();
    }

}
