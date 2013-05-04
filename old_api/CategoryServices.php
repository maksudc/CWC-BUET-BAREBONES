<?php
/**
 * @author Md.Maksud AlamChowdhury
 *
 * finds all the categories.
 */
$app->get('/categories', function()use($app) {
            require_once 'CategoryRepository.php';

            $category = new CategoryRepository($app->db);
            $data = $category->getAllCategories();
            $data = json_encode($data);
            
            echo $data;
        });


/**
 * @author Md.Maksud Alam Chowdhury
 *
 * finding a specific category by its id;
 *
 * @param $categoryId
 * @return category information
 */
$app->get('/category/:categoryId', function($categoryId) use($app) {
            require_once 'CategoryRepository.php';

            $category = new CategoryRepository($app->db);
            $data = $category->getCategoryById($categoryId);
            $data = json_encode($data);

            echo $data;
        });

/**
 * @author Md.Maksud Alam Chowdhury
 *
 * creating new category by admin
 *
 */
$app->post('/category/create', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);

            $data = (array) $data;

            require_once 'CategoryRepository.php';
            $category = new CategoryRepository($app->db);
            $category->addCategory($data);
        });

/**
 * @author Md.Maksud Alam Chowdhury
 *
 * Service for deleting a category
 */
$app->delete('/category/delete', function()use($app) {
            $data = $app->request()->getBody();
            $data = json_decode($data);
            $data = (array) $data;

            require_once 'CategoryRepository.php';
            $category = new CategoryRepository($app->db);
            $category->deleteCategory($data);
        });
?>
