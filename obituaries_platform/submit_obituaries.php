<?php
$mysqli = new mysqli("localhost", "root", "", "obituaries_platform");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$name = $_POST['name'];
$dob = $_POST['date_of_birth'];
$dod = $_POST['date_of_death'];
$content = $_POST['content'];
$author = $_POST['author'];
$slug = strtolower(str_replace(" ", "-", $name . "-" . time()));

$stmt = $mysqli->prepare("INSERT INTO obituaries (name, date_of_birth, date_of_death, content, author, slug) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $dob, $dod, $content, $author, $slug);

if ($stmt->execute()) {
    echo "Obituary submitted successfully! <a href='view_obituaries.php'>View All</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
