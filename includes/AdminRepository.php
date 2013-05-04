<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminRepository {

    protected $db;

    public function __construct(Sparrow $db) {
        $this->db = $db;
    }

    public function verifyLogin($data) {
        $email = strip_tags($this->db->escape($data['email']));
        $password = $data['password'];
        $salt = $email;
        $password = $password . $email;
        $password = md5($password);

        $row = $this->db->from('admin')
                        ->where('email', $email)
                        ->select(array('admin_id', 'password'))
                        ->one();

        if ($password == $row['password']) {
            return $row['admin_id'];
        } else {
            return false;
        }
    }

}

?>
