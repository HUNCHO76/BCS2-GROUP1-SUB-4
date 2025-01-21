<?php

// Include database connection file
require_once 'db.inc.php'; // Update with your actual database connection script

if (isset($_POST['btn-comment'])) {
    // Retrieve the comment from the form
    $comment = trim($_POST['comment']); // Sanitizing input
    $user_id = $_GET['id']; // Assuming the user ID is stored in the session
    $post_id = $_GET['post']; // Assuming post ID is passed via POST or modify as needed

    // Validate input
    if (empty($comment)) {
        header("Location: ../feed.php?error=emptycomment");
        exit();
    }

    // Prepare SQL query to insert the comment
    $sql = "INSERT INTO comments (userId, postId, caption) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("iis", $user_id, $post_id, $comment);

        // Execute the query
        if ($stmt->execute()) {
            header("Location: ../feed.php?success=commentadded");
            exit();
        } else {
            header("Location: ../feed.php?error=sqlerror");
            exit();
        }
    } else {
        header("Location: ../feed.php?error=stmtfailed");
        exit();
    }
} else {
    header("Location: ../feed.php");
    exit();
}