<?php
// Твой токен Telegram-бота
$token = "7515834470:AAFpVu67GM7YAdHe456p78-lUCI45yV-XBM"; // ← вставь сюда новый токен (НЕ публикуй его в открытом виде)
$chat_id = "315136156"; // ← сюда твой chat_id

// Получаем данные из формы
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$comment = htmlspecialchars($_POST['comment']);
$items = htmlspecialchars($_POST['items']);
$total = htmlspecialchars($_POST['total']);

// Формируем текст сообщения
$text = "🧵 Новый заказ:\n";
$text .= "👤 Имя: $name\n";
$text .= "📞 Телефон: $phone\n";
$text .= "🛍 Товары: $items\n";
$text .= "💬 Комментарий: $comment\n";
$text .= "💰 Сумма: $total";

// Отправка сообщения через Telegram Bot API
$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($text);
$response = file_get_contents($url);

// Ответ клиенту
if ($response) {
    echo "OK";
} else {
    http_response_code(500);
    echo "Ошибка при отправке";
}
?>
