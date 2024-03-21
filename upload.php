<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function to display notification and redirect
    function displayNotification($message) {
        echo "<script>alert('$message'); window.location.href = 'mycourses.html';</script>";
    }

    // Function to check if file is PDF
    function isPDF($file) {
        $allowed = array('pdf');
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        return in_array($ext, $allowed);
    }

    // Handle assignment 1 upload
    if (isset($_FILES['assignment1']) && $_FILES['assignment1']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['assignment1']['tmp_name'];
        $fileName = $_FILES['assignment1']['name'];

        // Validate file type
        if (!isPDF($fileName)) {
            displayNotification("Only PDF files are allowed for Assignment 1.");
            exit();
        }

        // Move uploaded file to desired directory
        move_uploaded_file($fileTmpPath, "uploads/" . $fileName);
        displayNotification("Assignment 1 uploaded successfully.");
    } else {
        displayNotification("Error uploading Assignment 1.");
    }

    // Handle assignment 2 upload (similar to assignment 1)
    // Add more assignment upload handling here if needed
}
?>
