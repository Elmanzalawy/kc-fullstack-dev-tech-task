-- up
CREATE TABLE `categories` (
    `id` VARCHAR(255),
    `parent_id` VARCHAR(255), 
    `name` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

-- seed
INSERT INTO `categories` (`id`, `parent_id`, `name`)
VALUES  ('91aad7bb-5885-4a25-bbdc-046dd4b2a9e6', NULL, 'Technology'),
        ('c4064741-d191-49c5-b141-7943d063cfc3', '91aad7bb-5885-4a25-bbdc-046dd4b2a9e6', 'Software Development'),
            ('622dccb6-236d-4eb2-b9e8-21972793bd50', 'c4064741-d191-49c5-b141-7943d063cfc3', 'Hardware Engineering 2'),
                ('5dcbebbe-167c-4dde-b532-29e061f03ffa', '622dccb6-236d-4eb2-b9e8-21972793bd50', 'Hardware Engineering 3'),
        ('9da2e701-f0d3-4f30-8d05-11ab54245c54', NULL, 'Education'),
            ('fadf6005-bc2e-4abe-9d4d-2142de75e92c', '9da2e701-f0d3-4f30-8d05-11ab54245c54', 'Higher Education'), 
            ('51b426ac-a193-4b7e-b701-bc97d1c9409d', '9da2e701-f0d3-4f30-8d05-11ab54245c54', 'K-12 Education'),
        ('75aef85-55b4-4967-ae56-b14cd4d2159f', NULL, 'Health & Wellness'),
            ('08b646a7-160b-4b57-854e-3513db6dc8ef', '75aef85-55b4-4967-ae56-b14cd4d2159f', 'Fitness & Nutrition'),
            ('dc3a38b1-75c4-4706-9ef2-a99b2dbe8422', '75aef85-55b4-4967-ae56-b14cd4d2159f', 'Mental Health'),
        ('0a0a4827-6644-429c-b0a7-096739b72c0e', NULL, 'Arts & Entertainment'), 
            ('23dcb82c-09db-4017-9cc8-7e21e6922b5c', '0a0a4827-6644-429c-b0a7-096739b72c0e', 'Visual Arts'),
            ('3fa71446-28da-449b-a34d-b75324d656d1', '0a0a4827-6644-429c-b0a7-096739b72c0e', 'Performing Arts'),
        ('da2ed247-5113-4b57-b9cd-98d4726238db', NULL, 'Science & Nature'), 
            ('b067108e-c659-4ca6-9116-c0fb2877321a', 'da2ed247-5113-4b57-b9cd-98d4726238db', 'Bioligy'),
            ('c9a33b20-471f-41f9-bd27-008e4b2824a1', 'da2ed247-5113-4b57-b9cd-98d4726238db', 'Physics'),
        ('77a4ea53-1f7e-419b-add4-6d91a4f0a7c9', NULL, 'Food & Cooking'), 
            ('784c90e7-93fc-4787-a84f-58d2056993d5', '77a4ea53-1f7e-419b-add4-6d91a4f0a7c9', 'Recipes'),
            ('813f00fe-054c-4540-a220-304c037adb2b', '77a4ea53-1f7e-419b-add4-6d91a4f0a7c9', 'Culinary Techniques'),
        ('5c788c0f-ba32-4bcb-959b-d3c715ec4825', NULL, 'Travel & Tourism'), 
            ('f52158b9-5410-40ab-927b-d3b80f1c10cc', '5c788c0f-ba32-4bcb-959b-d3c715ec4825', 'Destinations'),
            ('6e0fea23-f5ba-495f-b71c-bb091c02c36a', '5c788c0f-ba32-4bcb-959b-d3c715ec4825', 'Travel Tips')

-- down
DROP TABLE `categories`;