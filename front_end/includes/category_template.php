    <?php if (empty($category->subcategories)) { ?>
        <p style="padding-left: 0.93rem;">
            <a 
                href="?category=<?= $category->id ?>"
                <?php 
                    if(isset($_GET['category']) && $_GET['category'] == $category->id){
                        echo "style='background-color:skyblue;'";
                    }
                ?>
            ><?= $category->name ?></a>
            <?php if ($category->count_of_courses > 0) { ?>
                <span class="badge"><?= $category->count_of_courses ?></span>
            <?php } ?>
        </p>
    <?php } else { ?>
        <details open style="padding-left: 0.93rem;">
            <summary>
                <a 
                    href="?category=<?= $category->id ?>"
                    <?php 
                    if(isset($_GET['category']) && $_GET['category'] == $category->id){
                        echo "style='background-color:skyblue;'";
                    }
                    ?>
                ><?= $category->name ?></a>
                <?php if ($category->count_of_courses > 0) { ?>
                    <span class="badge"><?= $category->count_of_courses ?></span>
                <?php
                }
                ?>
            </summary>

            <?php
            foreach ($category->subcategories as $category) {
                include('category_template.php');
            }
            ?>
        </details>
    <?php } ?>