DROP TABLE IF EXISTS `user_profiles`;

CREATE TABLE `user_profiles` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `first_name` varchar(256) DEFAULT NULL,
    `last_name` varchar(256) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_profiles` (`id`, `first_name`, `last_name`)
VALUES
    (1,'Gary','Renes'),

UPDATE `users` SET user_profile_id = 1 WHERE id = 1;
