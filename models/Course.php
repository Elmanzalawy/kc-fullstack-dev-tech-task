<?php

class Course
{
    public $course_id;
    public $title;
    public $description;
    public $category_id;
    public $image_preview;
    public $created_at;
    public $updated_at;

    public function __construct($data)
    {
        $this->course_id = $data['course_id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->category_id = $data['category_id'];
        $this->image_preview = $data['image_preview'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
