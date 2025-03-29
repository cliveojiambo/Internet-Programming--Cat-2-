<?php
$conn = new mysqli("localhost", "root", "", "obituary_platform");
if ($conn->connect_error) die("Connection failed");

$result = $conn->query("SELECT * FROM obituaries ORDER BY submission_date DESC");
?>

<!DOCTYPE html>
<html>
<head> 
    <meta name="description" content="Latest obituary posts">
<meta name="keywords" content="obituary, memory, tribute">
<meta property="og:title" content="Obituaries">
<meta property="og:description" content="See recently submitted obituaries">
<meta property="og:type" content="website">
<title>Obituaries</title></head>
<body>
<h2>Obituaries</h2>
<table border="1">
<tr>
    <th>Name</th><th>Date of Birth</th><th>Date of Death</th><th>Content</th><th>Author</th><th>Submission Date</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= $row['date_of_birth'] ?></td>
    <td><?= $row['date_of_death'] ?></td>
    <td><?= nl2br(htmlspecialchars($row['content'])) ?></td>
    <td><?= htmlspecialchars($row['author']) ?></td>
    <td><?= $row['submission_date'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</body>
</html>
