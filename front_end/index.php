    <?php
    require_once './database.php';
    require_once './models/Category.php';
    require_once './models/Course.php';
    require_once './database/seeders/DatabaseSeeder.php';

    $database = new Database();
    $db_connection = $database->getConnection();
    /**
     * Uncomment the following line to seed mock data
     */
    // DatabaseSeeder::migrate();
    // DatabaseSeeder::seed();

    $categories = Category::get();
    $GLOBALS['categories'] = $categories;
    $courses = Course::get();

    $categoriesTree = [];

    // insert main categories with no parent_id
    foreach ($categories as $category) {
        $category->subcategories = [];
        if (empty($category->parent_id)) {
            $categoriesTree[$category->id] = $category;
        }
    }

    // recursively add subcategories
    foreach ($categoriesTree as $key => $cat) {
        $cat->subcategories = getSubcategories($cat);
    }

    function getSubcategories($parentCategory)
    {
        $subcategories = [];
        foreach ($GLOBALS['categories'] as $key => $cat) {
            if ($cat->parent_id == $parentCategory->id) {
                $cat->subcategories = getSubcategories($cat);
                $subcategories[$cat->id] = $cat;
            }
        }

        return $subcategories;
    }

    // filter courses based on selected category
    if (isset($_GET['category'])) {
        $courses = array_filter($courses, function ($course) {
            return $course->category_id == $_GET['category'];
        });

        foreach($categories as $category){
            if($category->id == $_GET['category']){
                $title = $category->name;
            }
        }
    }else{
        $title = 'Course Catalog';
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/util.css" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <h1 id="title-header" class="align-center"><a href="/"><?= $title ?></a></h1>
            <div class="flex-container">
                <main>
                    <?php require_once('./includes/courses_catalog.php'); ?>
                </main>
                <aside>
                    <?php require_once('./includes/side_menu.php'); ?>
                </aside>
            </div>
        </div>
    </body>

    </html>