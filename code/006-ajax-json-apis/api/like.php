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
	// Response data - echo back what was sent for now
    $response = [
        'id' => $data['id'],
        'liked' => $data['like']
    ];

    // 201 - created
    response($response, 201);
}
else {
	// 400 - Bad request - missing 'liked' / 'id' from request JSON
    response([], 400);
}
