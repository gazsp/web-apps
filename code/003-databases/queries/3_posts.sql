CREATE TABLE `posts` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(1024) DEFAULT NULL,
    `body` text DEFAULT NULL,
    `user_id` int(11) unsigned DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
