<?php
if(isset($_POST['submit_likes'])){
    require "db.inc.php";

// Input data
$user_id = $_GET['user']; // Assuming data is coming from a form
$post_id = $_GET['post'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Insert data into likes table
$sql = "INSERT INTO likes (like_user_id, like_post_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $post_id);

if ($stmt->execute()) {
    header('Location: ../feed.php?like sent');
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
}

?>