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
        // Start user table
        echo "<h2>User Table</h2>";
        echo "<table border='1' style='border-collapse: collapse;'>";
        // Table header
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
        // Output data of each row
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
        // End user table
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
        $sql_teacher = "SELECT * FROM teacher";
        $result_teacher = $db->query($sql_teacher);

        if ($result_teacher) {
            // Start teacher table
            echo "<h2>Teacher Table</h2>";
            echo "<table border='1' style='border-collapse: collapse;'>";
            // Table header
            echo "<tr>";
            echo "<th>Teacher ID</th>";
            echo "<th>User ID</th>";
            echo "<th>Faculty</th>";
            echo "<th>Role</th>";
            echo "</tr>";
            // Output data of each row
            while ($row_teacher = $result_teacher->fetchArray(SQLITE3_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row_teacher["teacher_id"] . "</td>";
                echo "<td>" . $row_teacher["user_id"] . "</td>";
                echo "<td>" . $row_teacher["faculty"] . "</td>";
                echo "<td>" . $row_teacher["role"] . "</td>";
                echo "</tr>";
            }
            // End teacher table
            echo "</table>";
        } else {
            echo "0 results for teacher table";
        }
    } else {
        echo "0 results for user table";
    }
} else {
    echo "Error executing query: " . $db->lastErrorMsg();
}

// Close the database connection
$db->close();
