<?php
// Get the request body (JSON data)
$json_data = file_get_contents('php://input');

// Decode the JSON data
$new_story = json_decode($json_data, true);

// Read the existing JSON file
$json_file = 'sentences.json';
$json_contents = file_get_contents($json_file);
$stories = json_decode($json_contents, true);

// Append the new story to the array
$stories[] = $new_story;

// Encode the updated array as JSON
$json_data = json_encode($stories, JSON_PRETTY_PRINT);

// Write the JSON data back to the file
file_put_contents($json_file, $json_data);

// Send a success response
http_response_code(200);
echo json_encode(array('message' => 'Story saved successfully'));
?>
