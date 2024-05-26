// chat.js

function sendMessage() {
    var userInput = document.getElementById("user-input").value;
    if (userInput.trim() === "") {
        alert("Vui lòng nhập tin nhắn!");
        return;
    }

    // Gửi tin nhắn từ khách hàng (người dùng) đến admin
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process_message.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === "success") {
                var chatBox = document.getElementById("chat-box");
                var userMessage = document.createElement("p");
                userMessage.innerText = "Bạn: " + userInput;
                chatBox.appendChild(userMessage);
                // Cuộn xuống dòng tin nhắn mới nhất
                chatBox.scrollTop = chatBox.scrollHeight;
                // Xóa nội dung trường nhập sau khi gửi
                document.getElementById("user-input").value = "";
            } else {
                alert("Đã xảy ra lỗi khi gửi tin nhắn!");
            }
        }
    };
    xhr.send("message=" + userInput + "&sender=1&receiver=2"); // 1 là ID của người dùng, 2 là ID của admin

    // Gửi tin nhắn từ admin đến khách hàng (người dùng)
    setTimeout(function() {
        var adminMessage = document.createElement("p");
        adminMessage.innerText = "Admin: Xin chào! Bạn cần hỗ trợ gì?";
        chatBox.appendChild(adminMessage);
        // Cuộn xuống dòng tin nhắn mới nhất
        chatBox.scrollTop = chatBox.scrollHeight;
    }, 1000);
}
