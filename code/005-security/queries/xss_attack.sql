INSERT INTO `posts` (`id`, `title`, `body`, `user_id`)
VALUES
    (2, 'Another post', '<script>alert(\'XSS Attack!!\')</script>', 1);
