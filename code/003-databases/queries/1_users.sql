DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(256) DEFAULT NULL,
    `password` varchar(256) DEFAULT NULL,
    -- User profile id
    `user_profile_id` int(11) unsigned,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `password`)
VALUES
    (1,'admin@example.com','password'),
    (2,'user@example.com','password');
