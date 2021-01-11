<?php

function getJsonData()
{
    $data = file_get_contents("php://input");

    // TRUE here turns the result in to a PHP array instead
    // of an Object
    return json_decode($data, TRUE);
}

function response($data = [], $code = 200)
{
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT);
    exit;
}

// Get the data sent from AJAX
$data = getJsonData();

if (isset($data['like']) && isset($data['id']))
{
    // This is where your database query to add / delete a like would gp
    if($data['like']) {
        // INSERT ...
    }
    {
        // DELETE ...
    }

    // If you want to display a like count in the UI, then you need to do a COUNT query here

	// Response data - echo back what was sent for now
    $response = [
        'id' => $data['id'],
        'liked' => $data['like'],
         // This should be the like count for the post - we'll just show 0 or 1 for now
        'likeCount' => $data['like'] ? 1 : 0
    ];

    // 201 - created
    response($response, 201);
}
else {
	// 400 - Bad request - missing 'liked' / 'id' from request JSON
    response([], 400);
}
