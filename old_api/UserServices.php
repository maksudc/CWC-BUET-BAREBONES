<?php

/**
 * @author SALEH
 * Returns user name by his id..
 */
$app->get('/user/name/:id', function($id) use($app) {
            require_once 'UserRepository.php';

            $user = new UserRepository($app->db);
            $name = $user->getNameByID($id);

            $data = json_encode($name);
            echo $data;
        });
/**
 * @author SALEH
 * Returns user name under a specific email id..
 */
$app->get('/user/name/email/:email', function($email) use($app) {
            require_once 'UserRepository.php';

            $user = new UserRepository($app->db);
            $name = $user->getUserByEmail($email);
            $data = json_encode($name);

            echo $data;
        });

/**
 * @author SALEH
 * Returns user photo..
 */
$app->get('user/user_photo', function($email) use($app) {
            require_once 'UserRepository.php';

            $user = new UserRepository($app->db);
            $photo = $user->getPhoto();
            $data = json_encode($photo);

            echo $data;
        });

/**
 * @author SALEH
 * Creates new user..
 */
$app->post('/user/create', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = (array) $data;

            require_once 'UserRepository.php';
            $user_info = new UserRepository($app->db);
            $user_info->create($array_data);
        });

/**
 * @author SALEH
 * Creates new user..
 */
$app->post('/user/insert_photo', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);

            require_once 'UserRepository.php';
            $photo_info = new UserRepository($app->db);
            $photo_info->insertPhoto($data);
        });

/**
 * @author SALEH
 * Updates user name..
 */
$app->put('/user/update_name', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $array_data = (array) $data;
            extract($array_data);

            require_once 'UserRepository.php';
            extract($array_data);
            $user_info = new UserRepository($app->db);
            echo $user_info->updateName($name, $email);
        });

/**
 * @author SALEH
 * Updates user photo..
 */
$app->put('/user/update_photo', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);

            require_once 'UserRepository.php';
            $user_info = new UserRepository($app->db);
            $user_info->updatePhoto($data);
        });

/**
 * @author SALEH
 * Create User Profile..
 */
$app->post('/user/create', function () use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);

            require_once 'UserRepository.php';
            $photo_info = new UserRepository($app->db);
            $photo_info->create($data);
        });


