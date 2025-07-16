<?php
$conn = new mysqli("localhost", "root", "", "task");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $conn->query("INSERT INTO users (name, age, status) VALUES ('$name', '$age', 0)");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>User Form</h2>
    <form method="POST" class="form">
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="submit" value="Submit">
    </form>

    <table>
        <tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Toggle</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM users");
        while($row = $result->fetch_assoc()) {
            echo "<tr id='row-{$row['id']}'>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td class='status'>{$row['status']}</td>
                <td><button type='button' onclick='toggleStatus({$row['id']})'>Toggle</button></td>
            </tr>";
        }
        ?>
    </table>

    <script src="script.js"></script>
</body>
</html>
