<?php

// Include database connection file
require_once 'db.inc.php'; // Update with your actual database connection script

if (isset($_POST['btn-comment'])) {
    // Retrieve the comment from the form
    $comment = trim($_POST['comment']); // Sanitizing input
    $user_id = $_SESSION['user_id']; // Assuming the user ID is stored in the session
    $post_id = $_POST['post_id']; // Assuming post ID is passed via POST or modify as needed

    echo $user_id;
    echo  $post_id;
}
