<?php
// Database connection configuration
$servername = "sql310.infinityfree.com";
$username = "if0_37529224";
$password = "TNtpETTqBQSJj";
$dbname = "if0_37529224_timetable";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Query statement, including the "teacher" column
$sql = "SELECT id, subject, day, time, teacher FROM timetable";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roieee Timetable Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Roieee Timetable Data</h1>
    <?php
    if ($result->num_rows > 0) {
        // Output the table header
        echo "<table>";
        echo "<tr><th>ID</th><th>Subject</th><th>Day</th><th>Time</th><th>Teacher</th></tr>";
        // Loop through and output each row of data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["id"]. "</td>";
            echo "<td>". $row["subject"]. "</td>";
            echo "<td>". $row["day"]. "</td>";
            echo "<td>". $row["time"]. "</td>";
            echo "<td>". $row["teacher"]. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found in the timetable table.";
    }
    // Close the database connection
    $conn->close();
    ?>
</body>

</html>