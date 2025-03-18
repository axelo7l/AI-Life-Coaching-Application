<?php
require 'db_connection.php'; // Ensure this connects to your database

$apiKey = "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"; // Replace with your OpenAI API key
$url = "https://api.openai.com/v1/chat/completions";

$data = [
    "model" => "gpt-4",
    "messages" => [["role" => "system", "content" => "Give a short motivational advice"]],
    "max_tokens" => 50
];

$options = [
    "http" => [
        "header" => "Content-Type: application/json\r\n" .
                    "Authorization: Bearer $apiKey\r\n",
        "method" => "POST",
        "content" => json_encode($data)
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    echo json_encode(["error" => "Failed to fetch advice"]);
} else {
    $responseData = json_decode($response, true);
    $advice = $responseData["choices"][0]["message"]["content"];
    echo json_encode(["advice" => $advice]);
}
?>