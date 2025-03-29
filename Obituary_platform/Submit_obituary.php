<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "obituary_platform";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$dob = $_POST['dob'];
$dod = $_POST['dod'];
$content = $_POST['content'];
$author = $_POST['author'];
$slug = strtolower(str_replace(" ", "-", $name)) . "-" . time();

$sql = "INSERT INTO obituaries (name, date_of_birth, date_of_death, content, author, slug)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $dob, $dod, $content, $author, $slug);

if ($stmt->execute()) {
    echo "Obituary submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();
?>
