    <div id="course-catalog">
        <?php
        if (!empty($courses)) {
            foreach ($courses as $course) {
                include('course_card_template.php');
            }
        } else {
        ?>
        <!-- <p id="courses-not-found-message">No courses found.</p> -->
        <?php } ?>
    </div>