<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "tED-8!MZ1BrtG*!e", "studentresultmanagementdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the HTML form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$subject = $_POST['subject'];
$score = $_POST['score'];

// Insert student information into the 'students' table
$sql = "INSERT INTO students (first_name, last_name, email, dob) VALUES ('$first_name', '$last_name', '$email', '$dob')";
if (mysqli_query($conn, $sql)) {
    $student_id = mysqli_insert_id($conn); // Get the auto-generated student_id
    // Insert student result into the 'results' table
    $result_sql = "INSERT INTO results (student_id, subject, score) VALUES ($student_id, '$subject', $score)";
    if (mysqli_query($conn, $result_sql)) {
        echo "Result added successfully.";
    } else {
        echo "Error adding result: " . mysqli_error($conn);
    }
} else {
    echo "Error adding student: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
