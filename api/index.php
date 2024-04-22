<?php

require_once '../controllers/CategoryController.php';
require_once '../controllers/CourseController.php';

establishConnection();
registerHeaders();
registerRoutes();

/**
 * establish DB connection
 *
 * @return void
 */
function establishConnection()
{
    $database = new Database();
    $GLOBALS['db_connection'] = $database->getConnection();
}

/**
 * register HTTP response headers for API
 *
 * @return void
 */
function registerHeaders()
{
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
}

/**
 * Register API routes
 *
 * @return void
 */
function registerRoutes()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);

    // handle missing URL components
    if (!isset($uri[1])) {
        return [
            'error' => 'invalid endpoint.'
        ];
    }

    // category endpoints
    if ($uri[1] === "categories") {
        $categoryController = new CategoryController();

        //get specific category
        if (isset($uri[2])) {
            $category = $categoryController->getCategoryById($uri[2]);
            echo json_encode($category);
        }
        // get all categories
        else {
            $categories = $categoryController->getCategories();
            echo json_encode($categories);
        }
    } 
    // course endpoints
    elseif ($uri[1] === "courses") {
        $courseController = new CourseController();

        if (isset($uri[2])) {
            $courses = $courseController->getCourseById($uri[2]);
            echo json_encode($courses);
        } else {
            $courses = $courseController->getCourses();
            echo json_encode($courses);
        }
    } else {
        echo json_encode([
            'error' => 'invalid endpoint.'
        ]);
    }
}
