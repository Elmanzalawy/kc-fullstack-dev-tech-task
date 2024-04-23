<?php

require_once 'Model.php';

#[\AllowDynamicProperties]
class Category implements Model
{
    public $id;
    public $name;
    public $parent_id;
    public $count_of_courses;
    public $created_at;
    public $updated_at;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->parent_id = $data['parent_id'];
        $this->count_of_courses = $data['count_of_courses'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }

    /**
     * get all categories
     * 
     * @throws Exception
     * @return array
     */
    public static function get()
    {
        $query = "SELECT categories.id, categories.name, categories.parent_id, COUNT(courses.course_id) AS count_of_courses, categories.created_at, categories.updated_at
            FROM categories
            LEFT JOIN courses ON categories.id = courses.category_id
            GROUP BY categories.id";

        $statement = $GLOBALS['db_connection']->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

        $categoriesList = [];
        foreach ($categories as $category) {
            array_push($categoriesList, new Category($category));
        }

        if(empty($categoriesList)){
            throw new \Exception('No categories found.');
        }

        return $categoriesList;
    }
    
    /**
     * find category by id
     *
     * @param  mixed $id
     * @throws Exception
     * @return Category
     */
    public static function find($id)
    {
        $query = "SELECT categories.id, categories.name, categories.parent_id, COUNT(courses.course_id) AS count_of_courses, categories.created_at, categories.updated_at
            FROM categories
            LEFT JOIN courses ON categories.id = courses.category_id
            WHERE categories.id='$id'
            -- LIMIT 1
            GROUP BY categories.id";

        $statement = $GLOBALS['db_connection']->prepare($query);
        $statement->execute();
        $category = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(empty($category)){
            throw new \Exception('Category not found.');
        }
        
        return new Category($category[0]);
    }
}
