<?php
// Include the SQLite database connection file
include 'connectdatabase.php';

// SQL query to select all fields from the user table
$sql = "SELECT * FROM user";

// Execute the query
$result = $db->query($sql);

if ($result) {
    // Check if there are any rows returned
    if ($result->numColumns() > 0) {
        echo "<h2>User Table</h2>";
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr>";
        echo "<th>User ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
        echo "<th>Password</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Gender</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Profile Picture</th>";
        echo "<th>Role</th>";
        echo "</tr>";
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row["user_id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>" . $row["dob"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["phonenum"] . "</td>";
            echo "<td>" . $row["profile_picture"] . "</td>";
            echo "<td>" . $row["role"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Query to select student info
        $sql_student = "SELECT * FROM student";
        $result_student = $db->query($sql_student);

        if ($result_student) {
            // Start student table
            echo "<h2>Student Table</h2>";
            echo "<table border='1' style='border-collapse: collapse;'>";
            // Table header
            echo "<tr>";
            echo "<th>Student ID</th>";
            echo "<th>User ID</th>";
            echo "<th>Faculty</th>";
            echo "<th>Year</th>";
            echo "<th>GPA</th>";
            echo "<th>Total Credit</th>";
            echo "<th>Role</th>";
            echo "</tr>";
            // Output data of each row
            while ($row_student = $result_student->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row_student["student_id"] . "</td>";
                echo "<td>" . $row_student["user_id"] . "</td>";
                echo "<td>" . $row_student["faculty"] . "</td>";
                echo "<td>" . $row_student["year"] . "</td>";
                echo "<td>" . $row_student["gpa"] . "</td>";
                echo "<td>" . $row_student["total_credit"] . "</td>";
                echo "<td>" . $row_student["role"] . "</td>";
                echo "</tr>";
            }
            // End student table
            echo "</table>";
        } else {
            echo "0 results for student table";
        }

        // Query to select teacher info

        // SQL query to fetch data from the topic table
        $sql_topic = "SELECT * FROM topic";
        $result_topic = $db->query($sql_topic);

        if ($result_topic) {
            // Start topic table
            echo "<h2>Topic Table</h2>";
            echo "<table border='1' style='border-collapse: collapse;'>";
            // Table header
            echo "<tr>";
            echo "<th>Topic ID</th>";
            echo "<th>Topic Title</th>";
            echo "<th>Topic Description</th>";
            echo "<th>Material ID</th>";
            echo "<th>Date Upload</th>";
            echo "<th>Topic File</th>";
            echo "<th>User ID</th>";
            echo "</tr>";
            // Output data of each row
            while ($row_topic = $result_topic->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row_topic["topic_id"] . "</td>";
                echo "<td>" . $row_topic["topic_title"] . "</td>";
                echo "<td>" . $row_topic["topic_description"] . "</td>";
                echo "<td>" . $row_topic["material_id"] . "</td>";
                echo "<td>" . $row_topic["date_upload"] . "</td>";
                echo "<td>" . $row_topic["topic_file"] . "</td>";
                echo "<td>" . $row_topic["user_id"] . "</td>";
                echo "</tr>";
            }
            // End topic table
            echo "</table>";
        } else {
            echo "No topics found";
        }
    }
};



// Close the database connection
$db->close();
