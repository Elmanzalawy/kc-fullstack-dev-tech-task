<?php

require_once '../models/Course.php';
require_once '../database.php';

class CourseController
{
    /**
     * Get all courses
     *
     * @return array
     */
    public function getCourses()
    {
        try {
            return Course::get();
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Get course by ID
     *
     * @param  mixed $id
     * @return Course|array
     */
    public function getCourseById($id)
    {
        try {
            return Course::find($id);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
