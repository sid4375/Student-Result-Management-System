<!DOCTYPE html>
<html>
<head>
    <title>Student Result Management System</title>
</head>
<body>
    <h1>Add Student Result</h1>
    <form method="post" action="add_result.php">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required><br>

        <label for="subject">Subject:</label>
        <input type="text" name="subject" required><br>

        <label for="score">Score:</label>
        <input type="number" name="score" required><br>

        <input type="submit" value="Add Result">
    </form>
    
    <h1>Student Results</h1>
    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Subject</th>
            <th>Score</th>
        </tr>
        <?php
        // PHP code to retrieve and display student results
        $conn = mysqli_connect("localhost", "root", "tED-8!MZ1BrtG*!e", "studentresultmanagementdb");
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT students.student_id, students.first_name, students.last_name, students.email, students.dob, results.subject, results.score FROM students
                INNER JOIN results ON students.student_id = results.student_id";
        
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['score'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No results found.</td></tr>";
        }
        
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
