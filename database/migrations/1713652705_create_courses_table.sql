    -- up
    CREATE TABLE `courses` (
        `course_id` VARCHAR(255),
        `title` VARCHAR(255), 
        `description` LONGTEXT NOT NULL,
        `image_preview` VARCHAR(255) NOT NULL,
        `category_id` VARCHAR(255),
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`course_id`)
    );

    -- seed
    INSERT INTO `courses` (`course_id`, `title`, `description`, `image_preview`, `category_id`)
    VALUES ('372e5666-7b4f-4057-a4ae-ed3077b374c2', 'Course 1', 'lorem ipsum', 'https://placehold.co/600x400', '08b646a7-160b-4b57-854e-3513db6dc8ef')

    -- down
    DROP TABLE `courses`;
