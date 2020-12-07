<?php

define('POSTS_PER_PAGE', 10);

function posts($page = 1)
{
    if ($page < 1) {
        $page = 1;
    }

    $limit = POSTS_PER_PAGE;
    $offset = ($page - 1) * $limit;

    $query = "
        SELECT posts.id, posts.title, posts.body
        FROM posts
        ORDER BY created_at DESC
        LIMIT $limit
        OFFSET $offset
    ";

    // Return all the posts as an array of arrays
    $result = db()->query($query)->fetchAll();

    return $result;
}

function postCount()
{
    $query = "SELECT COUNT(id) as count FROM posts";

    $result = db()->query($query)->fetch();

    return $result['count'];
}

function pageCount($count)
{
    return $count % POSTS_PER_PAGE;
}
