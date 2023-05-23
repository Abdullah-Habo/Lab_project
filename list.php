<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            background-color: #fff;
            color: #333;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <h2>Registered Students</h2>
    <?php
    
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $db = "students_reg"; 

    
    $conn = new mysqli($localhost, $username, $password, $db);

    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Gender</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['full_name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No students registered yet.</p>";
    }


    mysqli_close($conn);
    ?>
</body>
</html>
