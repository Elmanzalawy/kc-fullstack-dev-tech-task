<?php

class Course
{
    public $id;
    public $name;
    public $description;
    public $category_id;
    public $category_name;
    public $preview;
    public $created_at;
    public $updated_at;

    public function __construct($data)
    {
        $this->id = $data['course_id'];
        $this->name = $data['title'];
        $this->description = $data['description'];
        $this->category_id = $data['category_id'];
        $this->category_name = $data['category_name'];
        $this->preview = $data['image_preview'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }


    /**
     * get all courses
     * 
     * @throws Exception
     * @return array
     */
    public static function get()
    {
        $query = "SELECT courses.course_id, courses.category_id, courses.title, courses.description, courses.image_preview, categories.name as category_name, courses.created_at, courses.updated_at
            FROM courses
            LEFT JOIN categories ON courses.category_id = categories.id
            GROUP BY courses.course_id";

        $statement = $GLOBALS['db_connection']->prepare($query);
        $statement->execute();
        $courses = $statement->fetchAll(PDO::FETCH_ASSOC);

        $coursesList = [];
        foreach ($courses as $course) {
            array_push($coursesList, new Course($course));
        }

        if (empty($coursesList)) {
            throw new \Exception('No courses found.');
        }

        return $coursesList;
    }

    /**
     * find course by id
     *
     * @param  mixed $id
     * @throws Exception
     * @return Course
     */
    public static function find($id)
    {
        $query = "SELECT courses.course_id, courses.category_id, courses.title, courses.description, courses.image_preview, categories.name, courses.created_at, courses.updated_at
            FROM courses
            LEFT JOIN categories ON courses.category_id = categories.id
            WHERE courses.course_id='$id'
            -- LIMIT 1
            GROUP BY courses.course_id";

        $statement = $GLOBALS['db_connection']->prepare($query);
        $statement->execute();
        $course = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($course)) {
            throw new \Exception('Course not found.');
        }

        return new Course($course[0]);
    }
}
