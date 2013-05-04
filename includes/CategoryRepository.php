<?php

class CategoryRepository
{
    /**
     * @var Sparrow
     */
    protected $db;

    public function __construct(Sparrow $db)
    {
        $this->db = $db;
    }

    public function getAllCategories()
    {
        return $this->db->from('categories')
                    ->many();
    }

    public function getCategoryById($categoryId)
    {
        $categoryId=strip_tags($this->db->escape($categoryId));
        return $this->db->from('categories')
                    ->where('category_id = ', $categoryId)
                    ->one();
    }

    public function addCategory($data){
        $data['title']=strip_tags($this->db->escape($data['title']));
        $this->db->from('categories')
             ->insert($data)
             ->execute();

        return;
    }

    public function deleteCategory($data){
        $title = $data['title'];
        
        $this->db->from('categories')
        ->where('title', $title)
        ->delete()
        ->execute();
        
    }
}