    -- up
    CREATE TABLE `categories` (
        `id` VARCHAR(255),
        `parent_id` VARCHAR(255), 
        `name` VARCHAR(255) NOT NULL,
        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    );

    -- down
    DROP TABLE `categories`;