<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbox</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-box" id="chat-box">
            <!-- Tin nhắn sẽ được hiển thị ở đây -->
        </div>
        <input type="text" id="user-input" placeholder="Nhập tin nhắn...">
        <button onclick="sendMessage()">Gửi</button>
    </div>

    <script>
        function sendMessage() {
            var userInput = document.getElementById("user-input").value;
            if (userInput.trim() === "") {
                alert("Vui lòng nhập tin nhắn!");
                return;
            }

            // Gửi tin nhắn từ khách hàng đến máy chủ của admin thông qua WebSocket
            var socket = new WebSocket("ws://localhost:3000");
            socket.onopen = function(event) {
                console.log("Kết nối tới máy chủ chat đã được mở.");
                // Gửi tin nhắn khi kết nối thành công
                socket.send(userInput);
                socket.close();
            };

            // Thêm tin nhắn của khách hàng vào hộp chat
            var chatBox = document.getElementById("chat-box");
            var userMessage = document.createElement("p");
            userMessage.innerText = "Bạn: " + userInput;
            chatBox.appendChild(userMessage);
            // Cuộn xuống dòng tin nhắn mới nhất
            chatBox.scrollTop = chatBox.scrollHeight;

            // Xóa nội dung trường nhập sau khi gửi
            document.getElementById("user-input").value = "";
        }
    </script>
</body>
</html>
