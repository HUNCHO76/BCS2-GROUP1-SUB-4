<?php
if (isset($_POST['submit_likes'])) {
    require "db.inc.php";

    // Input data
    $user_id = $_GET['user']; // Assuming data is coming from a form
    $post_id = $_GET['post'];

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user already liked the post
    $check_sql = "SELECT * FROM likes WHERE like_user_id = ? AND like_post_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ii", $user_id, $post_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // User already liked the post
        header('Location: ../feed.php?error=already_liked');
        exit();
    }

    // Insert data into likes table
    $sql = "INSERT INTO likes (like_user_id, like_post_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $post_id);

    if ($stmt->execute()) {
        header('Location: ../feed.php?message=like_sent');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statements and connection
    $check_stmt->close();
    $stmt->close();
    $conn->close();
}

?>