<?php

class DatabaseSeeder
{
    public static function migrate()
    {
        $query = "CREATE TABLE `categories` (
            `id` VARCHAR(255),
            `parent_id` VARCHAR(255), 
            `name` VARCHAR(255) NOT NULL,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        );";

        $statement = $GLOBALS['db_connection']->prepare($query);
        $statement->execute();

        $query = "CREATE TABLE `courses` (
            `course_id` VARCHAR(255),
            `title` VARCHAR(255), 
            `description` LONGTEXT NOT NULL,
            `image_preview` VARCHAR(255) NOT NULL,
            `category_id` VARCHAR(255),
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`course_id`)
        );";

        $statement = $GLOBALS['db_connection']->prepare($query);
        $statement->execute();
    }

    public static function seed()
    {
        self::seedCategories();
        self::seedCourses();
    }

    public static function seedCategories()
    {
        // Read the JSON file
        $json = file_get_contents('./data/categories.json');

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
        $json = file_get_contents('./data/course_list.json');

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