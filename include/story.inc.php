<?php
session_start();
include 'db.inc.php';

if (isset($_REQUEST['btn-submt'])) {
    // Check session
    if (!isset($_SESSION['userid'])) {
        echo "User not logged in.";
        exit();
    }
     // Validate that an image is provided
     
     // Collect form data
     $statusCaption = mysqli_real_escape_string($conn, $_POST['caption']);
     $statusImage = $_FILES['story-image'];
     $id = $_SESSION['userid'];
     
     if (empty($statusImage['name'])) {
         header("location: ../feed.php?Error: No image file selected. Please choose an image.");
         exit();
     }
    // Check if file was uploaded
    if ($statusImage['error'] === UPLOAD_ERR_OK) {
        $imageName = $statusImage['name'];
        $imageTmpName = $statusImage['tmp_name'];
        $imageSize = $statusImage['size'];
        $fileExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        // Allowed file types
        $allowed = ['jpg', 'jpeg', 'png'];

        if (empty($statusImage['name'])) {
            echo "Error: No image file selected. Please choose an image.";
            exit();
        }

        if (in_array($fileExt, $allowed)) {
            if ($imageSize <= 10000000) { // 10MB limit
                // Ensure upload directory exists
                if (!is_dir('story-img')) {
                    mkdir('story-img', 0777, true);
                }

                // Generate a unique file name
                $uniqueImageName = 'image_'.$id.'_'.uniqid() . '.' . $fileExt;
                $uploadPath = 'story-img/' . $uniqueImageName;

                // Move file to upload directory
                if (move_uploaded_file($imageTmpName, $uploadPath)) {
                    // Insert data into the database
                    $stmt = $conn->prepare("INSERT INTO `status` (userId, image_path, caption) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $id, $uniqueImageName, $statusCaption);

                    if ($stmt->execute()) {
                        header('Location: ../feed.php?status=success');
                        exit();
                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    header("location: ../feed.php?Failed to upload the image.");

                }
            } else {
                header("location: ../feed.php?ile size exceeds the 10MB limit.");
                
            }
        } else {
            header("location: ../feed.php?Invalid file type. Only JPG, JPEG, and PNG are allowed.");
           
        }
    } else {

        header("location: ../feed.php?Invalid file type. Only JPG, JPEG, and PNG are allowed.");
    }
} else {
    header('Location: ../feed.php');
    exit();
}
?>
