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
        // Khởi tạo kết nối WebSocket với máy chủ chat
        var socket = new WebSocket("ws://localhost:3000");

        // Xử lý khi kết nối mở
        socket.onopen = function(event) {
            console.log("Kết nối tới máy chủ chat đã được mở.");
        };

        // Xử lý khi nhận được tin nhắn mới từ khách hàng
        socket.onmessage = function(event) {
            var message = event.data;
            var chatBox = document.getElementById("chat-box");
            var messageElement = document.createElement("div");
            messageElement.innerText = message;
            chatBox.appendChild(messageElement);
            // Cuộn xuống dòng tin nhắn mới nhất
            chatBox.scrollTop = chatBox.scrollHeight;
        };

        // Xử lý khi kết nối đóng
        socket.onclose = function(event) {
            console.log("Kết nối tới máy chủ chat đã bị đóng.");
        };

        function sendMessage() {
            var userInput = document.getElementById("user-input").value;
            if (userInput.trim() === "") {
                alert("Vui lòng nhập tin nhắn!");
                return;
            }

            // Gửi tin nhắn từ khách hàng đến máy chủ qua kết nối WebSocket
            socket.send(userInput);

            // Thêm tin nhắn của khách hàng vào hộp chat
            var chatBox = document.getElementById("chat-box");
            var messageElement = document.createElement("div");
            messageElement.innerText = "Bạn: " + userInput;
            chatBox.appendChild(messageElement);
            // Cuộn xuống dòng tin nhắn mới nhất
            chatBox.scrollTop = chatBox.scrollHeight;

            // Xóa nội dung trường nhập sau khi gửi
            document.getElementById("user-input").value = "";
        }
    </script>
</body>
</html>
