<?php
if(isset($_POST['image-submit'])) {



    // Check if the file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        
        // Validate file extension (optional)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExtensions)) {
            // Set the new file name and move the file to the server directory
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $uploadFileDir = './uploads/';
            $destFilePath = $uploadFileDir . $newFileName;

            // Move the file to the uploads directory
            if (move_uploaded_file($fileTmpPath, $destFilePath)) {
                // File is uploaded, now insert the file path into the database
                include 'include/db.inc.php';

                $userId = $_GET['id']; // Assuming you have the user ID in the URL
                $sql = "UPDATE users SET profile_picture = ? WHERE user_id = $id";
                
                // Prepare the SQL query
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Bind the parameters and execute the query
                    mysqli_stmt_bind_param($stmt, "si", $destFilePath, $userId);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "File is uploaded and data is inserted into the database.";
                    } else {
                        echo "Error: Unable to insert data into the database.";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error: Unable to prepare the query.";
                }
            } else {
                echo "Error: Unable to move the uploaded file.";
            }
        } else {
            echo "Error: Invalid file extension. Only jpg, jpeg, png, and gif are allowed.";
        }
    } else {
        echo "Error: No file uploaded or there was an error during the upload.";
    }
}
?>