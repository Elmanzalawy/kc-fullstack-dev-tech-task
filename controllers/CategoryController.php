<?php

require_once '../models/Category.php';
require_once '../database.php';

class CategoryController
{    
    /**
     * Get all categories
     *
     * @return array
     */
    public function getCategories()
    {
        try {
            return Category::get();
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
    
    /**
     * Get category by ID
     *
     * @param  mixed $id
     * @return Category|array
     */
    public function getCategoryById($id)
    {
        try{
            return Category::find($id);
        }
        catch(\Exception $e){
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
