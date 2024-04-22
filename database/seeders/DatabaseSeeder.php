<?php

class DatabaseSeeder
{
    public static function seed()
    {
        self::seedCategories();
        self::seedCourses();
    }

    public static function seedCategories()
    {
        // Read the JSON file
        $json = file_get_contents('../data/categories.json');

        // Decode the JSON file
        $jsonData = json_decode($json, true);

        foreach ($jsonData as $obj) {
            $query = "INSERT INTO categories (id, parent_id, name) VALUES (:id, :parent_id, :name)";

            $statement = $GLOBALS['db_connection']->prepare($query);
            $statement->execute([
                ':id' => $obj['id'],
                ':name' => $obj['name'],
                ':parent_id' => $obj['parent'],
            ]);
        }
    }

    public static function seedCourses()
    {
        // Read the JSON file
        $json = file_get_contents('../data/course_list.json');

        // Decode the JSON file
        $jsonData = json_decode($json, true);

        foreach($jsonData as $obj){
            $query = "INSERT INTO courses (course_id, title, description, image_preview, category_id) VALUES (:course_id, :title, :description, :image_preview, :category_id)";

            $statement = $GLOBALS['db_connection']->prepare($query);
            $statement->execute([
                ':course_id' => $obj['course_id'],
                ':title' => $obj['title'],
                ':description' => $obj['description'],
                ':image_preview' => $obj['image_preview'],
                ':category_id' => $obj['category_id'],                
            ]);
        }
    }
}