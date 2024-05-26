<?php
// Kết nối đến cơ sở dữ liệu
include_once "config/connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message']) && isset($_POST['sender'])) {
        $message = $_POST['message'];
        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];

        $sql_insert_message = "INSERT INTO messages (sender_id, receiver_id, message) VALUES ($sender, $receiver, '$message')";
        $result_insert_message = mysqli_query($conn, $sql_insert_message);

        if ($result_insert_message) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
?>
