<div class="card">
    <span class="category-label"><?= $course->category_name ?></span>

    <img src="<?= $course->preview ?>" alt="<?= $course->name ?>" loading="lazy">
    <div class="card-body">
        <h3><?= $course->name ?></h3>
        <p><?= $course->description ?></p>
    </div>
</div>