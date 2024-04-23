<?php
foreach ($categoriesTree as $category) { 
    addCategory($category);

} 

function addCategory($category){
    include('./includes/category_template.php');
}
?>