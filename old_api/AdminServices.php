<?php

/**
 * @author SALEH
 * Verifies admin info & authentication..
 */
$app->post('/admin/verify', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = (array) $data;

            require_once 'AdminRepository.php';
            $admin_info = new AdminRepository($app->db);
            echo $admin_info->verifyLogin($array_data);
        });
